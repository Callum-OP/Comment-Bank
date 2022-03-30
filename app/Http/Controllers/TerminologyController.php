<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminology;
use App\Unverified;

class TerminologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $type = "terminology";
        $request->validate([ 
            'comment'=>'required', 
            'first_name'=>'required', 
            'last_name'=>'required', 
            'email'=>'required'
        ]); 
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([ 
            'first_name'=>'required', 
            'last_name'=>'required', 
            'email'=>'required' 
        ]); 

        $terminologies = Terminology::find($id); 
        $terminologies->comment = $request->get('comment'); 
        $terminologies->first_name = $request->get('first_name'); 
        $terminologies->last_name = $request->get('last_name'); 
        $terminologies->email = $request->get('email');  
        $terminologies->tone = $request->get('tone'); 
        $terminologies->save(); 

        return redirect('/comments')->with('success', 'Comment updated!'); 
    }

    public function destroy($id)
    {
        $request = Terminology::find($id); 
        $request->delete(); 
        return redirect('/verify')->with('success', 'Comment deleted!');
    }
}
