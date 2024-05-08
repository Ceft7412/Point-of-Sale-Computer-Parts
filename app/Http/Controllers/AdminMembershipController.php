<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AdminMembershipController extends Controller
{
    public function redirectMembership(){
        $activeMembers = Member::where('membership_status', 'Accepted')->get();
        return view("admin.membership")->with('activeMembers', $activeMembers);    
    }
    public function pendingMembership(){
        $pendingMembers = Member::where('membership_status', 'Pending')->get();
        return view("admin.pending_request")->with('pendingMembers', $pendingMembers);
    }
    public function acceptedMembership($id){
        
        $applicant = Member::findOrfail($id);
        $applicant->membership_id = $this->generateMembershipId();
        $applicant->membership_card_number = $this->generateMembershipCard();
        $applicant->membership_status = "Accepted";
        $applicant->save();
        return redirect()->back()->with('success', 'Membership request has been accepted');
    }
    public function rejectedMembership($id){
        
        $applicant = Member::findOrfail($id);
        $applicant->membership_status = "Rejected";
        $applicant->save();
        return redirect()->back()->with('success', 'Membership request has been rejected');
    }
    public function generateMembershipId(){
        do{
             $membership_id = rand(100000, 999999);
        }while(Member::where('membership_id', $membership_id)->exists());
       
        return $membership_id;
    }
    public function generateMembershipCard(){
        do{
            $membership_card = rand(10000000, 99999999);
        }while(Member::where('membership_card_number', $membership_card)->exists());
        return $membership_card;    
    }


}