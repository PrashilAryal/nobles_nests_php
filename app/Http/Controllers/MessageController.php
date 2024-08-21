<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Session as Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Session\Store;

class MessageController extends Controller
{
    //
    public function send_message(Request $req)
    {
        $req->validate([
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_email' => 'required',
            'user_message' => 'required'
        ]);
        Message::Create([
            'user_firstname' => $req->user_firstname,
            'user_lastname' => $req->user_lastname,
            'user_email' => $req->user_email,
            'user_subject' => $req->user_subject,
            'user_message' => $req->user_message
        ]);
        return back()->with('success', 'Message sent successfully.');
    }
    public function view_message()
    {
        $messages = Message::all();
        $data = User::find(Auth::user()->id);
        // $adminCheck = Session::get('adminid');
        // $data = Chef::find($adminCheck);
        // return view('message',compact('data', 'messages'));
        return view('admin.adminMessage', compact('data', 'messages'));
    }
    public function delete_message($id)
    {
        $delobj = Message::find($id);
        $delobj->delete();
        $messages = Message::all();
        $data = User::find(Auth::user()->id);
        // $adminCheck = Session::get('adminid');
        // $data = Chef::find($adminCheck);
        return view('admin.adminMessage', compact('data', 'messages'));
        // return view('admin.adminMessage', compact('messages'));
    }
}
