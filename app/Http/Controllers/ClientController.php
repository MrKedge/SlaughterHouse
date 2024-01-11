<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Models\FormMaintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        // Retrieve all animals for the user
        $animals = $user->animals;

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
            'drawingData' => 'required_if:kindOfAnimal,cow,horse,carabao',
            'certOwnership' => '',
            'certTransfer' => '',
            'ageClassify' => '',
            'source' => 'required',
            'brgyClearance' => '',
        ]);
        $brgyClearanceName = null;

        // Handle 'brgyClearance' file upload if provided
        if ($request->hasFile('brgyClearance') && $request->file('brgyClearance')->isValid()) {
            $brgyClearanceName = time() . '_' . uniqid() . '.png';
            $request->file('brgyClearance')->storeAs('public/brgy-clearance', $brgyClearanceName);
        }

        // Initialize imageCertOwnershipName variable
        $imageCertOwnershipName = null;

        // Handle 'certOwnership' file upload if provided
        if ($request->hasFile('certOwnership') && $request->file('certOwnership')->isValid()) {
            $imageCertOwnershipName = time() . '_' . uniqid() . '.png';
            $request->file('certOwnership')->storeAs('public/cert-ownership', $imageCertOwnershipName);
        }

        // Initialize imageCertTransfer variable
        $imageCertTransferName = null;

        // Handle 'certTransfer' file upload if provided
        if ($request->hasFile('certTransfer') && $request->file('certTransfer')->isValid()) {
            $imageCertTransferName = time() . '_' . uniqid() . '.png';
            $request->file('certTransfer')->storeAs('public/cert-transfer', $imageCertTransferName);
        }

        // Check if 'kindOfAnimal' is in the allowed values before saving 'drawingData'
        if (in_array($request->input('kindOfAnimal'), ['cow', 'horse', 'carabao'])) {
            // Decode and save the marked animal image
            $imageData = base64_decode(substr($request->drawingData, strpos($request->drawingData, ',') + 1));
            $imageName = time() . '_' . uniqid() . '.png';
            Storage::put('public/marked-animal/' . $imageName, $imageData);
        }

        // Check if 'kindOfAnimal' is not 'swine' and unset 'ageClassify'
        if ($request->input('kindOfAnimal') !== 'swine') {
            $request->merge(['ageClassify' => null]);
        }

        $animal = new Animal();
        $animal->type = $request->kindOfAnimal;
        $animal->user_id = Auth::user()->id;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->ageClassify;
        $animal->destination = $request->destination;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->animal_mark = isset($imageName) ? $imageName : null; // Set to null if not in allowed values
        $animal->cert_ownership = $imageCertOwnershipName;
        $animal->cert_transfer = $imageCertTransferName;
        $animal->source = $request->source;
        $animal->brgy_clearance = $brgyClearanceName;

        $animal->save();
        if (auth()->check()) {
            if (auth()->user()->role === 'client') {
                return redirect()->route('client.animal.list.register');
            } elseif (auth()->user()->role === 'admin') {
                return redirect()->route('admin.view.animal.reg.list');
            } else {

                return redirect()->route('log-in');
            }
        } else {

            return redirect()->route('log-in');
        }
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

        $validator = Validator::make($request->all(), [
            'kindOfAnimal' => 'required',
            'butcher' => 'required',
            'destination' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'liveWeight' => 'required',
            'drawingData' => 'required_if:kindOfAnimal,cow,horse,carabao',
            'certOwnership' => '',
            'certTransfer' => '',
            'ageClassify' => '',
            'source' => 'required',
            'brgyClearance' => '',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $brgyClearanceName = null;

        // Handle 'brgyClearance' file upload if provided
        if ($request->hasFile('brgyClearance') && $request->file('brgyClearance')->isValid()) {
            $brgyClearanceName = time() . '_' . uniqid() . '.png';
            $request->file('brgyClearance')->storeAs('public/brgy-clearance', $brgyClearanceName);
        }

        // Initialize imageCertOwnershipName variable
        $imageCertOwnershipName = null;

        // Handle 'certOwnership' file upload if provided
        if ($request->hasFile('certOwnership') && $request->file('certOwnership')->isValid()) {
            $imageCertOwnershipName = time() . '_' . uniqid() . '.png';
            $request->file('certOwnership')->storeAs('public/cert-ownership', $imageCertOwnershipName);
        }

        // Initialize imageCertTransfer variable
        $imageCertTransferName = null;

        // Handle 'certTransfer' file upload if provided
        if ($request->hasFile('certTransfer') && $request->file('certTransfer')->isValid()) {
            $imageCertTransferName = time() . '_' . uniqid() . '.png';
            $request->file('certTransfer')->storeAs('public/cert-transfer', $imageCertTransferName);
        }

        // Check if 'kindOfAnimal' is in the allowed values before saving 'drawingData'
        if (in_array($request->input('kindOfAnimal'), ['cow', 'horse', 'carabao'])) {
            // Decode and save the marked animal image
            $imageData = base64_decode(substr($request->drawingData, strpos($request->drawingData, ',') + 1));
            $imageName = time() . '_' . uniqid() . '.png';
            Storage::put('public/marked-animal/' . $imageName, $imageData);
        }

        // Check if 'kindOfAnimal' is not 'swine' and unset 'ageClassify'
        if ($request->input('kindOfAnimal') !== 'swine') {
            $request->merge(['ageClassify' => null]);
        }

        $animal = new Animal();
        $animal->type = $request->kindOfAnimal;
        $animal->user_id = Auth::user()->id;
        $animal->butcher = $request->butcher;
        $animal->age_classify = $request->ageClassify;
        $animal->destination = $request->destination;
        $animal->gender = $request->gender;
        $animal->age = $request->age;
        $animal->live_weight = $request->liveWeight;
        $animal->animal_mark = isset($imageName) ? $imageName : null; // Set to null if not in allowed values
        $animal->cert_ownership = $imageCertOwnershipName;
        $animal->cert_transfer = $imageCertTransferName;
        $animal->source = $request->source;
        $animal->brgy_clearance = $brgyClearanceName;
        $animal->status = 'pending';

        $animal->save();
        if (auth()->check()) {
            if (auth()->user()->role === 'client') {
                return redirect()->route('client.animal.list.register');
            } elseif (auth()->user()->role === 'admin') {
                return redirect()->route('admin.view.animal.reg.list');
            } else {

                return redirect()->route('log-in');
            }
        } else {

            return redirect()->route('log-in');
        }
    }
}
