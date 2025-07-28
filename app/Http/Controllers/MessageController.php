<?php

namespace App\Http\Controllers;

use App\Mail\AdminNotifyMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserReplyMail;



class MessageController extends Controller
{     public  function saveUserMessage(Request $req){
    // validate the request form

    $req->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',

    ]);

    // create a new message instance
    $message = new Message();
    $message->name = $req->name;
    $message->email = $req->email;
    $message->subject = $req->subject;
    $message->message = $req->message;
    $message->save();


    // send email to admin
    Mail::to('himanshugondane554@gmail.com')->send(new AdminNotifyMail(($message)));
    return redirect()->back()->with('success', 'Message sent successfully');
    // redirect back with success message

}

public function showReplyForm($id)
{
    $message = Message::findOrFail($id);
             $headerMessages = Message::latest()->take(5)->get(); // Add this line

                $message->save(); // Save the updated status

    return view('admin2.layout.emailreply.show', compact('message','headerMessages',));
}

    public function viewMessages()
    {
        $messages = Message::all();
         $headerMessages = Message::latest()->take(5)->get(); // Add this line
        return view('admin2.layout.messages.index', compact('messages','headerMessages'));
    }

    public function sendReply(Request $request, $id)
{
    $request->validate([
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    $message = Message::findOrFail($id);

    $replyData = [
        'name' => $message->name,
        'email' => $message->email,
        'subject' => $request->subject,
        'message' => $request->message,
    ];

    // Send email
    Mail::to($message->email)->send(new UserReplyMail($replyData));

    return redirect()->back()->with('success', 'Reply sent successfully to user!');
}

public function showmessage($id)
{
    $message = Message::findorfail($id);
    $message->is_read = 1;
    $message->update();
     $headerMessages = Message::latest()->take(5)->get(); // Add this line
    return view('admin2.layout.messages.showMsg', compact('message', 'headerMessages'));
}

   public function destroy($id)
   {
         $message  = Message::findorfail($id);
         $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully');
   }




    //
}
