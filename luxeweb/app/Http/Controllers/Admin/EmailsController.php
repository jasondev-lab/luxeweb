<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerEmail;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $menu='Send Emails';
        $submenu='';
        return view('pages.admin.emails', compact('menu', 'submenu'));
    }

    public function saveEmail(Request $request){
        $request->validate([
            'customer_email' => 'required|unique:customer_emails,email'
        ]);

        $exist = CustomerEmail::find($request->id);
        if(empty($exist)) {
            $new = new CustomerEmail();
            $new['email'] = $request->customer_email;
            $new->save();
        } else {
            $exist['email'] = $request->customer_email;
            $exist->save();
        }       

        return response()->json(['state'=>1]);
    }

    public function getEmails() {
        $emails=CustomerEmail::all();
        $result['data']=$emails;
        return json_encode($result);
    }

    public function getEmail(Request $request) {
        $email = CustomerEmail::find($request->id);
        return response()->json($email);
    }

    public function deleteEmail(Request $request) {
        CustomerEmail::where('id', $request->delete_id)->delete();
        return response()->json(['state'=>1]);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'title' => 'required',
            'message' => 'required'
        ]);

        $emails = json_decode($request->emails, true);
        $data['subject'] = $request->subject;
        $data['title'] = $request->title;
        $data['message'] = $request->message;

        $images = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $key => $image) {
                $imageName = time().rand(1,99).'.'.$image->extension();  
                $image->move(public_path('uploads/attachments'), $imageName);
                array_push($images, public_path('uploads/attachments/' . $imageName));
            }
        }

        foreach($emails as $email) {
            Mail::send('pages.admin.email-updates', compact('data'), function($message) use ($data, $email, $images) {
                $message->from('facets@post.com');
                $message->to( $email, 'Facets' )->subject( $data['subject'] );
                // $message->from( $data['email'], $data['name']);
                foreach ($images as $image){
                    $message->attach($image);
                }
            });
        }

        return response()->json(['state'=>1]);
    }
}
