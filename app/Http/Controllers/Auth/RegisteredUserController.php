<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $search = request()->query('search');
        if ($search) {
            $users = User::where('type', 2)->where('is_active', 1)->where('user_id', 'like', '%' . $search . '%')->get();
            return view('admin.employee')->with('users', $users);
        } else {
            $users = User::where('type', 2)->where('is_active', 1)->get();
            return view('admin.employee')->with('users', $users);
        }

    }


    public function redirectArchiveEmployee()
    {
        $search = request()->query('search');
        if ($search) {
            $users = User::where('type', 2)->where('is_active', 0)->where('user_id', 'like', '%' . $search . '%')->get();
            return view('admin.archive.archive-employee')->with('users', $users);
        } else {
            $users = User::where('type', 2)->where('is_active', 0)->get();
            return view('admin.archive.archive-employee')->with('users', $users);
        }
        ;
    }


    public function getUser($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'type' => 'required', // 'required|in:admin,employee
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => 'required',
        ]);
        do {
            $user_id = rand(10000, 99999);
        } while (User::where('user_id', $user_id)->exists());

        $user = User::create([
            'user_id' => $user_id,
            'type' => $request->type,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact' => $request->contact ?? '',
        ]);

        event(new Registered($user));

        // Auth::login($user);

        if ($request->type == 1) {
            return redirect()->back()->with('success', 'Admin created successfully');
        } else {
            return redirect()->back()->with('success', 'Employee created successfully');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required', // 'required|in:admin,employee
            'update-name' => 'required',
            'update-username' => 'required',
            'update-email' => 'required',
        ]);

        $user = User::findOrFail($id);
        // Update the user data
        $user->type = $request->input('type');
        $user->name = $request->input('update-name');
        $user->username = $request->input('update-username');
        $user->email = $request->input('update-email');
        $user->contact = $request->input('update-contact');

        // Save the updated  user
        $user->save();

        if ($request->type == 1) {
            return redirect()->back()->with('success', 'Admin updated successfully');
        } else {
            return redirect()->back()->with('success', 'Employee updated successfully');
        }
    }
    public function archive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        if ($user->type == 1) {
            return redirect()->back()->with('success', 'Admin archived successfully');
        } else {
            return redirect()->back()->with('success', 'Employee archived successfully');
        }

    }
    public function unarchive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();
        if ($user->type == 1) {
            return redirect()->back()->with('success', 'Admin unarchived successfully');
        } else {
            return redirect()->back()->with('success', 'Employee unarchived successfully');
        }
    }
    public function archiveGroup(Request $request)
    {
        $userIds = $request->input('archiveIds');
        if ($userIds) {
            $userIdsArray = explode(',', $userIds);
            foreach ($userIdsArray as $userId) {
                $user = User::find($userId);
                if ($user) {
                    $user->is_active = false;
                    $user->save();
                }
            }
            if (isset($user) && $user->type == 1) {
                return redirect()->back()->with('success', 'Admin archived successfully');
            } else {
                return redirect()->back()->with('success', 'Employee archived successfully');
            }
        } else {
            return redirect()->back()->with('error', 'No users selected');
        }
    }

    public function unarchiveGroup(Request $request)
    {
        $userIds = $request->input('archiveIds');

        if ($userIds) {
            $userArray = explode(',' ,$userIds);
            foreach ($userArray as $userId) {
                $user = User::find($userId);
                $user->is_active = true;
                $user->save();
            }
            if ($user->type == 1) {
                return redirect()->back()->with('success', 'Admin unarchived successfully');
            } else {
                return redirect()->back()->with('success', 'Employee unarchived successfully');
            }
        } else {
            return redirect()->back()->with('error', 'No users selected');
        }
    }


}
