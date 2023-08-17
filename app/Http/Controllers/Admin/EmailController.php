<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:email-list');
    }

    public function index()
    {
        $emails = Email::orderBy('id', 'DESC')->paginate(5);
        if ($emails->isEmpty()) {
            return redirect('/')->with('status', 'No Emails yet!');
        }
        return view('emails.index', compact('emails'));
    }
}
