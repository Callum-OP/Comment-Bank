<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Terminology;
use App\Unverified;

class TerminologyController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
        return view('welcome');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        { 
            return view('terminologies.create'); 
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
        // Change type to terminology
        $type = "terminology";
        $request->validate([ 
            'comment'=>'required|max:250',
            'first_name'=>'required|max:50', 
            'last_name'=>'required|max:50',
            'email'=>'required|max:50'
        ]); 
        // Add comment to unverified table
        {
            $unverified = new Unverified([ 
                'comment' => $request->get('comment'),
                'first_name' => $request->get('first_name'), 
                'last_name' => $request->get('last_name'), 
                'email' => $request->get('email'), 
                'tone' => $request->get('tone'),
                'type' => $type
            ]); 
            $unverified->save(); 
        }
        return redirect('/')->with('success', 'Comment saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terminologies = Terminology::find($id);
        return view('terminologies.edit', compact('terminologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check if comment meets requirements 
        $request->validate([ 
            'comment'=>'required|max:250',
            'first_name'=>'required|max:50', 
            'last_name'=>'required|max:50',
            'email'=>'required|max:50'
        ]); 
        // Find comment in terminology table and update it to new comment
        $terminologies = Terminology::find($id); 
        $terminologies->comment = $request->get('comment'); 
        $terminologies->first_name = $request->get('first_name'); 
        $terminologies->last_name = $request->get('last_name'); 
        $terminologies->email = $request->get('email');  
        $terminologies->tone = $request->get('tone'); 
        $terminologies->save(); 

        $unverified = Unverified::all();
        $results = Results::all();
        $terminologies = Terminology::all();

        return view('verify.admin', compact('unverified', 'results', 'terminologies'));
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Terminology::find($id); 
        $request->delete(); 

        $unverified = Unverified::all();
        $results = Results::all();
        $terminologies = Terminology::all();

        return view('verify.admin', compact('unverified', 'results', 'terminologies'));
    }
}
