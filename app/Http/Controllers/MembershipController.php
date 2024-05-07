<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MembershipController extends Controller
{
    public function membership()
    {   
        $user = Auth::user();
        if ($user && $user->type == 2) {
            $employee = $user;
        } else {
            $employee = null;
        }
        return view('employee.create_membership')-> with('employee', $employee);
    }

    public function storeMembership(Request $request){
        $employee = Auth::user();
        if (!Hash::check($request->employee_password, $employee->password)) {
            return back()->withErrors(['employee_password_err' => 'Incorrect password']);
        }
        $member = new Member();
        $member->membership_name = $request->name;
        $member->membership_email = $request->email;
        $member->membership_phone = $request->phone;
       
        $member->save();
        
        return redirect()->route('membership')->with('success', 'Membership request sent successfully');

    }
    public function generateMembershipID(){
        $membership_id = rand(100000, 999999);
        return $membership_id;
    }
}
