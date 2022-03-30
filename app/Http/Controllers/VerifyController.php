<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Terminology;
use App\Unverified;

class VerifyController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $unverified = Unverified::all();
        $results = Results::all();
        $terminologies = Terminology::all();

        $request->validate([ 
            'uname'=>'required', 
            'psw'=>'required', 
        ]); 
        if($request->get('uname') == "admin"){
            if($request->get('psw') == "password"){
                return view('verify.admin', compact('unverified', 'results', 'terminologies'));
            } else {
                return redirect('/')->with('failed', 'Incorrect details');
            }
        } else {
            return redirect('/')->with('failed', 'Incorrect details');
        }
        return redirect('/')->with('failed', 'no details');
    }

    public function destroy($id)
    {
        $request = Unverified::find($id); 
        $request->delete(); 
        return redirect('/')->with('success', 'Comment discarded!');
    }
}
