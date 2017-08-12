<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Emails extends Controller
{
    public function index()
    {
        $messages = Email::orderBy('id', 'desc')->paginate(10);

        return view('admin.emails.index', compact('messages'));
    }

    public function create(SendMailRequest $request) {

        //return $request->all();

        $data = $request->all();

        Email::create($data);

        session()->flash('message_sent', 'Your message has been sent');

        return redirect('/contact');

    }

    public function deleteEmails(Request $request)
    {
        if(isset($request->delete_selected)) {

            if($request->checkBoxArray == null) {
                return redirect()->back();
            }

            $emails = Email::findOrFail($request->checkBoxArray);

            foreach($emails as $email) {
                $email->delete();
            }

            session()->flash('emails_deleted', 'Selected emails/messages have been deleted');

            return redirect('/admin/emails');
        }

        if(isset($request->delete_single)) {

            $email = Email::findOrFail($request->delete_single);

            $email->delete();

            session()->flash('email_deleted', 'Email/message has been deleted');

            return redirect('/admin/emails');
        }
    }
}