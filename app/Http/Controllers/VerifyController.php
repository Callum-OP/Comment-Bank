<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminology;
use App\Results;

class VerifyController extends Controller
{
    public function index()
    {
        $terminologies = Terminology::all();
        $results = Results::all();

        return view('welcome', compact('terminologies'), compact('results'));
    }

    public function show()
    {
        $terminologies = Terminology::all();
        $results = Results::all();

        return view('welcome', compact('terminologies'), compact('results'));
    }

    public function store(Request $request)
    {
        $terminologies = Terminology::all();
        $results = Results::all();

        $request->validate([ 
            'uname'=>'required', 
            'psw'=>'required', 
        ]); 
        if($request->get('uname') == "admin"){
            if($request->get('psw') == "password"){
                return view('verify.admin', compact('terminologies'), compact('results'));
            } else {
                return redirect('/')->with('failed', 'Incorrect details');
            }
        } else {
            return redirect('/')->with('failed', 'Incorrect details');
        }
        return redirect('/')->with('failed', 'no details');
    }
}
