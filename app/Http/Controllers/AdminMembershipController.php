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

    public function redirectArchiveMember(){
        $inactiveMembers = Member::where('is_active', 0)->where('membership_status', 'Accepted')->get();
        return view('admin.archive.archive-member')->with('inactiveMembers', $inactiveMembers);
    }
    public function pendingMembership(){
        $search = request()->query('search');
        if($search){
            $pendingMembers = Member::where('membership_status', 'Pending')
                                    ->where('membership_name', 'like', '%'.$search.'%')->get();
            return view("admin.pending_request")->with('pendingMembers', $pendingMembers);

        }
        else{
            $pendingMembers = Member::where('membership_status', 'Pending')->get();
            return view("admin.pending_request")->with('pendingMembers', $pendingMembers);  
        }
        
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


    public function rejectmemberships(Request $request){
        $memberIds = $request->input('archiveIds');
        if ($memberIds) {
            $memberIdsArray = explode(',', $memberIds);
            foreach ($memberIdsArray as $memberId) {
                $member = Member::find($memberId);
                if ($member) {
                    $member->membership_status = "Rejected";
                    $member->save();
                }
            }
            return redirect()->back()->with('success', 'Members rejected successfully');
        } else {
            return redirect()->back()->with('error', 'No members selected');
        }
    }

    public function archiveMembers(Request $request) {
        // Get the memberIds from the request
        $memberIds = $request->input('archiveIds');
        
        // Check if memberIds is provided and not empty
        if ($memberIds) {
            // Convert the comma-separated string of member IDs into an array
            $memberIdsArray = explode(',', $memberIds);
    
            // Iterate through each member ID in the array
            foreach ($memberIdsArray as $memberId) {
                // Find the member by its ID
                $member = Member::find($memberId);
                
                // If the member is found, update its status to inactive
                if ($member) {
                    $member->is_active = 0;
                    $member->save();
                }   
            }
            
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Members archived successfully');
        } else {
            // If no member IDs are provided, redirect back with an error message
            return redirect()->back()->with('error', 'No members selected');
        }
    }

    public function unarchiveMembers(Request $request){
        $memberIds = $request->input('archiveIds');
        if ($memberIds) {
            $memberIdsArray = explode(',', $memberIds);
            foreach ($memberIdsArray as $memberId) {
                $member = Member::find($memberId);
                if ($member) {
                    $member->is_active = 1;
                    $member->save();
                }
            }
            return redirect()->back()->with('success', 'Members unarchived successfully');
        } else {
            return redirect()->back()->with('error', 'No members selected');
        }

    }

    public function archiveSingleMember($id){
        $member = Member::find($id);
        $member->is_active = 0;
        $member->save();
        return redirect()->back()->with('success', 'Member archived successfully');
    }

    public function unarchiveSingleMember($id){
        $member = Member::find($id);
        $member->is_active = 1;
        $member->save();
        return redirect()->back()->with('success', 'Member unarchived successfully');
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