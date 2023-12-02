<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\FormMaintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{


    public function ShowClientDashboardOverview()
    {
        $animals = Animal::where('user_id', Auth::id())->get();

        $recent = Animal::where('user_id', Auth::id())
            ->where('status', '!=', 'archived')
            ->where('created_at', '>=', Carbon::now()->subHours(8))
            ->latest('created_at')
            ->limit(5)
            ->get();
        return view('client.client-overview', compact('recent', 'animals'));
    }




    public function ShowAnimalListReg()
    {
        $user = User::with('animals')->find(Auth::id());

        // Retrieve only non-archived animals
        $animals = $user->animals->where('status', '=', 'pending');

        return view('client.client-animal-list-registration', compact('user', 'animals'));
    }




    public function ShowAnimalRegForm()
    {
        $animal = FormMaintenance::all();
        return view('client.client-animal-register', compact('animal'));
    }





    public function ShowRegistrationFormClient($id)
    {
        $animal = Animal::with('user')->find($id);
        $user = User::findOrFail($animal->user_id);
        return view('client.client-view-animal-form', compact('animal', 'user'));
    }




    public function ShowArchiveList()
    {
        $user = User::with('animals')->find(Auth::id());
        $animal = $user->animals->where('status', 'archived');
        return view('client.client-animal-archive', compact('animal', 'user'));
    }


    public function ShowClientApprove()
    {
        $user = User::with('animals')->find(Auth::id());
        $animal = $user->animals->where('status', 'approved');
        return view('client.client-approve-list', compact('animal'));
    }

    public function ShowClientSchedule()
    {
        $user = User::with('animals')->find(Auth::id());
        $animal = $user->animals->wherenotnull('scheduled_at');
        return view('client.client-schedule-list', compact('animal'));
    }

    public function ShowClientSlaughter()
    {
        $user = User::with('animals')->find(Auth::id());
        $animal = $user->animals->where('status', 'slaughtered');
        return view('client.client-slaughter-list', compact('animal'));
    }


    public function ArchiveForm($id)
    {
        $animal = Animal::where('status', 'pending')->find($id);
        // Update the status to 'archive' or perform any other necessary actions
        $animal->status = 'archived';
        $animal->save();
        return redirect()->route('client.archive.list', ['id' => $id]);
    }



    public function SaveAsDraft(Request $request)
    {
        $request->validate([


            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required'
        ]);

        $animal = new Animal();

        $animal->type = $request->kindOfAnimal;
        $animal->user_id = Auth::user()->id;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->ageClassify;
        $animal->destination = $request->destination;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->status = 'draft';
        $animal->save();

        return redirect()->route('client.animal.list.register');
    }




    public function Register(Request $request)
    {
        $request->validate([
            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required',
            'drawingData' => 'required',
            'certOwnership' => 'required',
            'certTransfer'  => '',
        ]);

        $imageCertOwnershipName = time() . '_' . uniqid() . '.png';
        $request->file('certOwnership')->storeAs('public/cert-ownership', $imageCertOwnershipName);

        // Initialize certTransfer variable
        $imageCertTransferName = null;

        // Handle 'certTransfer' file upload if provided
        if ($request->has('certTransfer') && $request->file('certTransfer') != null) {
            $imageCertTransferName = time() . '_' . uniqid() . '.png';
            $request->file('certTransfer')->storeAs('public/cert-transfer', $imageCertTransferName);
        }

        // Decode and save the marked animal image
        $imageData = base64_decode(substr($request->drawingData, strpos($request->drawingData, ',') + 1));
        $imageName = time() . '_' . uniqid() . '.png';
        Storage::put('public/marked-animal/' . $imageName, $imageData);

        // Create a new Animal instance and fill its attributes
        $animal = new Animal();
        $animal->type = $request->kindOfAnimal;
        $animal->user_id = Auth::user()->id;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->ageClassify;
        $animal->destination = $request->destination;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->animal_mark = $imageName;
        $animal->cert_ownership = $imageCertOwnershipName;
        $animal->cert_transfer = $imageCertTransferName;
        // Save the Animal instance to the database
        $animal->save();

        // Redirect to the specified route
        return redirect()->route('client.animal.list.register');
    }


    public function ShowDrafts()
    {
        $animal = Animal::where('user_id', Auth::id())->get();
        return view('client.client-drafts', compact('animal'));
    }




    public function ShowEditFormClient($id)
    {
        $formValue = FormMaintenance::all();
        $animal = Animal::with('user')->find($id);
        return view('client.client-edit-form', compact('animal', 'formValue'));
    }




    public function updateAnimalForm(Request $request, $id)
    {


        $request->validate([
            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required',

        ]);

        $animal = Animal::findOrFail($id);

        $animal->type = $request->kindOfAnimal;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->age_classify;
        $animal->status = 'pending';
        $animal->save();

        return redirect()->route('client.animal.list.register');
    }
}
