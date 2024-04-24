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
        $users = User::where('type', 2)->where('is_active', 1)->get();
        return view('admin.employee')->with('users', $users);
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
            'password' => Hash::make('$request->password'),
            'contact' => $request->contact ?? '',
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($request->type == 1) {
            return redirect(route('admin', absolute: false));
        } else {
            return redirect(route('employee', absolute: false));
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
        if ($user === null) {
            return redirect()->back()->withErrors(['user' => 'User not found']);
        }


        return redirect()->back()->with('success', 'User updated successfully');
    }
    public function archive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return redirect()->back();
        
    }
    public function unarchive($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();
        return redirect()->back();
    }
    public function archiveGroup(Request $request)
    {
        $userIds = $request->input('userIds');

        if ($userIds) {
            foreach ($userIds as $userId) {
                $user = User::find($userId);
                $user->is_active = false;
                $user->save();
            }
            return redirect()->back()->with('success', 'Users set inactive to successfully');
        } else {
            return redirect()->back()->with('error', 'No users selected');
        }
    }

    public function unarchiveGroup(Request $request)
    {
        $userIds = $request->input('userIds');

        if ($userIds) {
            foreach ($userIds as $userId) {
                $user = User::find($userId);
                $user->is_active = true;
                $user->save();
            }
            return redirect()->back()->with('success', 'Users set to active successfully');
        } else {
            return redirect()->back()->with('error', 'No users selected');
        }
    }

    
}
