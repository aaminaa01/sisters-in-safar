<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantReview;
use Illuminate\Support\Facades\DB;
use App\Models\UncheckedRestaurantReview;

class UncheckedRestaurantReviewController extends Controller
{
    public function addReview(Request $request){

        // Validate the request data
        // dd($request->restaurant_id);
        $validatedData = $request->validate([
            'comments' => 'nullable|string',
            'safety' => 'required|numeric|min:0|max:5',
            'hygiene' => 'required|numeric|min:0|max:5',
            'ambiance' => 'required|numeric|min:0|max:5',
            'staff_behaviour' => 'required|numeric|min:0|max:5',
            'restaurant_id' => 'required|exists:restaurants,id', 
            'user_id' =>'required|exists:users,id',
        ]);

        // Create a new unchecked restaurant review
        $review = UncheckedRestaurantReview::create($validatedData);
    
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
            $uncheckedRestaurantReviews = DB::table('unchecked_restaurant_reviews')->get();
            return view('unchecked_restaurant_reviews', compact('uncheckedRestaurantReviews'));
        }
        else{
            $uncheckedRestaurantReviews = DB::table('unchecked_restaurant_reviews')->where('restaurant_id',$id)->get();
            return view('unchecked_restaurant_reviews', compact('uncheckedRestaurantReviews'));
        }
    }


    // Approve a review
    public function approveReview($id)
    {
        $uncheckedReview = UncheckedRestaurantReview::find($id);

        // Create a new restaurant review based on the unchecked review data
        $approvedReview = new RestaurantReview([
            'user_id' => $uncheckedReview->user_id,
            'restaurant_id' => $uncheckedReview->restaurant_id,
            'comments' => $uncheckedReview->comments,
            'safety' => $uncheckedReview->safety,
            'hygiene' => $uncheckedReview->hygiene,
            'ambiance' => $uncheckedReview->ambiance,
            'staff_behaviour' => $uncheckedReview->staff_behaviour,
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
        $uncheckedReview = UncheckedRestaurantReview::find($id);

        // Delete the unchecked review
        $uncheckedReview->delete();

        return redirect()->back()->with('message', 'Review discarded successfully!');
    }
}
