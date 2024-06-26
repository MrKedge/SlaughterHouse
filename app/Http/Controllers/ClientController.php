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
use Illuminate\Support\Facades\Log;
use App\Notifications\AnimalNotification;
use Illuminate\Support\Facades\Notification;

class ClientController extends Controller
{


    public function showClientDashboardOverview()
    {
        $user_id = Auth::id();

        // Use eager loading if there are relationships
        $animals = Animal::where('user_id', $user_id)->with('user')->get();

        $eightHoursAgo = Carbon::now()->subHours(8);

        $recent = Animal::where('user_id', $user_id)
            ->whereNot('status', 'draft') // Use whereNot to exclude 'draft' status
            ->where('created_at', '>=', $eightHoursAgo)
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('client.client-overview', compact('recent', 'animals'));
    }




    public function ShowAnimalListReg(Request $request)
    {
        $user = User::with('animals')->find(Auth::id());


        $status = $request->input('status', 'all');


        $animalsQuery = $user->animals();

        if ($status !== 'all') {
            $animalsQuery->where('status', $status);
        } else {

            $animalsQuery->where('status', '!=', 'draft');
        }


        $animalsQuery->whereNotIn('id', function ($query) {
            $query->select('animal_id')
                ->from('archives');
        });


        $animal = $animalsQuery->latest('created_at')->paginate(10);

        return view('client.client-animal-list-registration', compact('user', 'animal', 'status'));
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




    public function showArchiveList()
    {
        $user = User::with('animals')->find(Auth::id());

        $animal = Animal::where('user_id', Auth::id())
            ->whereHas('archive')
            ->paginate(10);

        return view('client.client-animal-archive', compact('animal', 'user'));
    }



    public function PublishRegister($id)
    {
        $animal = Animal::findOrFail($id);

        $animal->status = 'pending';
        $animal->save();


        return redirect()->back()->with('success', 'Your registration is now published.');
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
        $status = $request->input('status');

        $adminUser = User::where('role', 'admin')->get();

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
        $animal->status = $status;

        $animal->save();

        Notification::send($adminUser, new AnimalNotification($animal));

        if (auth()->check()) {
            if (auth()->user()->role === 'client') {
                return redirect()->route('client.animal.list.register')->with('success', 'Thank you for registering');
            } elseif (auth()->user()->role === 'admin') {
                return redirect()->route('admin.view.animal.reg.list')->with('success', 'Thank you for registering');
            } else {
                return redirect()->route('log-in');
            }
        } else {
            return redirect()->route('log-in');
        }
    }



    public function ShowDrafts()
    {
        $animal = Animal::where('user_id', Auth::id())
            ->where('status', 'draft')
            ->paginate(10);
        return view('client.client-drafts', compact('animal'));
    }




    public function ShowEditFormClient($id)
    {
        $animal = FormMaintenance::all();
        $updateForm = Animal::with('user')->find($id);
        return view('client.client-edit-form', compact('updateForm', 'animal'));
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
