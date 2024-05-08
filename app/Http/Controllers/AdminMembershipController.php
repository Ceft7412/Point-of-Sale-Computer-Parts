<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AdminMembershipController extends Controller
{
    public function redirectMembership(){

        $search = request()->query('search');
        if ($search) {
            $activeMembers = Member::where('membership_status', 'Accepted')
                                    ->where('is_active', 1)
                                    ->where('membership_id', 'like', '%'.$search.'%')->get();
            return view("admin.membership")->with('activeMembers', $activeMembers);    
        } else {
            $activeMembers = Member::where('membership_status', 'Accepted')->where('is_active', 1)->get();
            return view("admin.membership")->with('activeMembers', $activeMembers); 
        }
           
    }
    public function pendingMembership(){
        $pendingMembers = Member::where('membership_status', 'Pending')->get();
        return view("admin.pending_request")->with('pendingMembers', $pendingMembers);
    }

    public function addMember(Request $request){
        $request->validate([
            'membership_name' => 'required',
            'membership_email' => 'required',
            'membership_phone' => 'required',
        ]);
        $member = new Member();
        $member->membership_name = $request->membership_name;
        $member->membership_id = $this->generateMembershipId();
        $member->membership_card_number = $this->generateMembershipCard();
        $member->membership_status = "Accepted";
        $member->membership_email = $request->membership_email;
        $member->membership_phone = $request->membership_phone;
        $member->save();
        return redirect()->back()->with('success', 'Member has been added successfully');
        
    }

    public function updateMember(Request $request, $id){
        $request->validate([
            'update_membership_name' => 'required',
            'update_membership_email' => 'required',
            'update_membership_phone' => 'required',
        ]);
        $member = Member::findOrfail($id);
        $member->membership_name = $request->update_membership_name;
        $member->membership_email = $request->update_membership_email;
        $member->membership_phone = $request->update_membership_phone;
        $member->save();
        return redirect()->back()->with('success', 'Member has been updated successfully');
    }
    public function getMember($id){
        $member = Member::findOrfail($id);
        return response()->json($member);
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


    public function archiveMembers(Request $request){
        $memberIds = $request->input('memberIds');
        if($memberIds){
            foreach($memberIds as $memberId){
                $member = Member::find($memberId);
                $member->is_active = 0;
                $member->save();
            }
            return redirect()->back()->with('success', 'Members archived successfully');
        }else {
            return redirect()->back()->with('error', 'No members selected');
        }
    }

    public function archiveSingleMember($id){
        $member = Member::find($id);
        $member->is_active = 0;
        $member->save();
        return redirect()->back()->with('success', 'Member archived successfully');
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