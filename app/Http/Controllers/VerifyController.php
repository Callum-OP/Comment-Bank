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

        // Check if user has entered details
        $request->validate([ 
            'uname'=>'required', 
            'psw'=>'required', 
        ]); 
        // If details are correct enter admin page
        // Or else redirect to main menu
        if($request->get('uname') == "admin"){
            if($request->get('psw') == "password"){
                return view('verify.admin', compact('unverified', 'results', 'terminologies'));
            } else {
                return redirect('/')->with('failed', 'Incorrect details');
            }
        } else {
            return redirect('/')->with('failed', 'Incorrect details');
        }
    }

        /**
     * Remove the specified resource from unverified storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Unverified::find($id); 
        $request->delete(); 
        
        $unverified = Unverified::all();
        $results = Results::all();
        $terminologies = Terminology::all();

        return view('verify.admin', compact('unverified', 'results', 'terminologies'))->with('success', 'Comment deleted!'); 
    }
}
