<?php

namespace App\Http\Controllers;

use App\Models\ParkReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UncheckedParkReview;

class UncheckedParkReviewController extends Controller
{
    public function addReview(Request $request){

        // Validate the request data
        $validatedData = $request->validate([
            'comments' => 'nullable|string',
            'safety' => 'required|numeric|min:0|max:5',
            'maintenance' => 'required|numeric|min:0|max:5',
            'family_friendliness' => 'required|numeric|min:0|max:5',
            'park_id' => 'required|exists:parks,id', 
            'user_id' =>'required|exists:users,id',
        ]);

        // Create a new unchecked restaurant review
        $review = UncheckedParkReview::create($validatedData);
    
        // Check if the review was successfully created
        if ($review) {
            // You can add a success flash message or redirect the user to a thank you page
            return redirect()->route('home')->with('success', 'Review submitted successfully!');
        } else {
            // Handle the case where the review creation failed
            return back()->with('error', 'Failed to submit review. Please try again.');
        }
        
    }

    public function check_reviews(Request $request, $id=null){
        if ($id==null) {
            $uncheckedParkReviews = DB::table('unchecked_park_reviews')->get();
            return view('unchecked_park_reviews', compact('uncheckedParkReviews'));
        }
        else{
            $uncheckedParkReviews = DB::table('unchecked_park_reviews')->where('park_id',$id)->get();
            return view('unchecked_park_reviews', compact('uncheckedParkReviews'));
        }
    }


    // Approve a review
    public function approveReview($id)
    {
        $uncheckedReview = UncheckedParkReview::find($id);

        // Create a new restaurant review based on the unchecked review data
        $approvedReview = new ParkReview([
            'user_id' => $uncheckedReview->user_id,
            'park_id' => $uncheckedReview->park_id,
            'comments' => $uncheckedReview->comments,
            'safety' => $uncheckedReview->safety,
            'maintenance' => $uncheckedReview->maintenance,
            'family_friendliness' => $uncheckedReview->family_friendliness,
        ]);

        // Save the approved review
        $approvedReview->save();

        // Delete the unchecked review
        $uncheckedReview->delete();

        return redirect()->back()->with('message', 'Review approved successfully!');
    }

    // Discard a review
    public function discardReview($id)
    {
        $uncheckedReview = UncheckedParkReview::find($id);

        // Delete the unchecked review
        $uncheckedReview->delete();

        return redirect()->back()->with('message', 'Review discarded successfully!');
    }
}
