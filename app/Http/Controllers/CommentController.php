<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Terminology;
use App\Unverified;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminologies = Terminology::all();
        $results = Results::all();

        return view('comments.index', compact('terminologies'), compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        { 
            return view('verify.create'); 
        }
    }

            /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if comment meets requirements 
        $request->validate([ 
            'comment'=>'required|max:250',
            'first_name'=>'required|max:50', 
            'last_name'=>'required|max:50',
            'email'=>'required|max:50'
        ]); 
        // If results comment then add to results table
        // Else if terminology comment then add to terminology table
        if($request->get('type') == "results") {
            $results = new Results([ 
                'comment' => $request->get('comment'),
                'first_name' => $request->get('first_name'), 
                'last_name' => $request->get('last_name'), 
                'email' => $request->get('email'), 
                'tone' => $request->get('tone')
            ]); 
            $id = Unverified::find($request->get('id')); 
            $this->destroy($id);   
            $results->save();
        } else if($request->get('type') == "terminology") {
            $terminologies = new Terminology([ 
                'comment' => $request->get('comment'),
                'first_name' => $request->get('first_name'), 
                'last_name' => $request->get('last_name'), 
                'email' => $request->get('email'), 
                'tone' => $request->get('tone')
            ]); 
            $id = Unverified::find($request->get('id')); 
            $this->destroy($id); 
            $terminologies->save();
        }
        $unverified = Unverified::all();
        $results = Results::all();
        $terminologies = Terminology::all();

        return view('verify.admin', compact('unverified', 'results', 'terminologies'));
    }

    /**
     * Display a specified resource.
     *
     * @param  /int  $id
     * @r     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() 
    { 
        $terminologies = Terminology::all();
        $results = Results::all();

        return view('comments.index', compact('terminologies'), compact('results'));        
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
        $request->each->delete(); 
        
        return redirect('/')->with('success', 'Comment removed from unverified!');
    }
}
