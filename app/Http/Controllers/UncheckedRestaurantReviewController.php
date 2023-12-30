<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UncheckedRestaurantReview;

class UncheckedRestaurantReviewController extends Controller
{
    public function addReview(Request $request){

        // Validate the request data
        $validatedData = $request->validate([
            'comments' => 'nullable|string',
            'safety' => 'required|numeric|min:0|max:5',
            'hygiene' => 'required|numeric|min:0|max:5',
            'ambiance' => 'required|numeric|min:0|max:5',
            'staff_behaviour' => 'required|numeric|min:0|max:5',
            'restaurant_id' => 'required|exists:restaurants,id', 
            'user_id' =>'required|exists:users,id'
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
}
