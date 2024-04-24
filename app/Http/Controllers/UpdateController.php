<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function updateCategory(Request $request, $id)
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
}
