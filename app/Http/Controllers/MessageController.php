<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function contact_us_form(){
        return view('contact_us');
    }

    public function create(Request $request){
        // echo "sdfgh";
        $formFields = $request->validate([
            'sender_email' => 'email|required',
            'message' => 'required',
        ]);
        $message = Message::create($formFields);
        // Check if the message was successfully sent
        if ($message) {
            // You can add a success flash message or redirect the user to a thank you page
            return back()->with('message', 'Message submitted successfully!');
        } else {
            // Handle the case where the review creation failed
            return back()->with('error', 'Failed to submit message. Please try again.');
        }
    }

    public function view_messages(){
        $messages = Message::all();
        return view('view_messages', compact('messages'));
    }
}
