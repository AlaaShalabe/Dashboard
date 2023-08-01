<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $data =  $request->validate([
            'email' => 'required|email|unique:emails,email'
        ]);

        Email::create($data);
        return response()->json([
            'message' => 'successfully created'
        ]);
    }
}
