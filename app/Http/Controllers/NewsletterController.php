<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\EmailList;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Message;
use Swift_TransportException;


//use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\Part\TextPart;
//use Symfony\Component\Mime\Part\HtmlPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;





class NewsletterController extends Controller
{
    public function index(){
        $newsletters = Newsletter::all();
        return view('writer.template', compact('newsletters'));;
    }

    public function subscribe(Request $request){
        $request->validate([
            'email'=> 'required|unique:emaillists,email'
        ]);

        event(new UserSubscribed($request->input('email')));

        return back();
    }


    public function save(Request $request)
    {
        //dd($request);
        $userId = Auth::id();
        //dd($userId);

        // Validate the request data
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        // Create the newsletter in the database
         Newsletter::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            "user_id" => $userId,
        ]);

        // Redirect to a success page or return a response as needed
        return redirect()->route('template')->with('success', 'Newsletter created successfully');
    }


    public function edit($id)
    {
        // Retrieve the newsletter by its ID
        $newsletter = Newsletter::findOrFail($id);

        // Return the view for editing the newsletter with the retrieved data
        return view('newsletter.edit', compact('newsletter'));
    }


    public function send($id)
    {

        $newsletter = Newsletter::findOrFail($id);

        $subscribers = EmailList::all();

        foreach ($subscribers as $subscriber) {
            // Send the newsletter to the subscriber's email address
            $this->sendNewsletterToSubscriber($newsletter, $subscriber);
        }
         $newsletter->status ='sent';
        $newsletter->save();
        //dd($test);
        return redirect()->route('template')->with('success', 'Newsletter sent successfully.');
    }




    private function sendNewsletterToSubscriber($newsletter, $subscriber)
    {
        // Retrieve subscriber's email address
        $recipientEmail = $subscriber->email;

        $textContent = strip_tags($newsletter->contenu);

        $textPart = new TextPart($textContent, 'utf-8');

        try {
            Mail::html([], function(Message $message) use ($recipientEmail, $textPart) {
                $message->to($recipientEmail);
                $message->subject('Welcome to our website');
                $message->setBody($textPart, 'text/html');
            });

            // Email sent successfully
            // You may want to log this information or perform any other action
            Log::info('Newsletter sent successfully to: ' . $recipientEmail);
        } catch (\Exception $e) {
            // Handle email sending failure gracefully
            // Log the error or perform any necessary actions
            // You can also access the failed recipients using $recipientEmail
            Log::error('Failed to send newsletter to: ' . $recipientEmail . '. Error: ' . $e->getMessage());
        }
    }



}
