<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use App\Unverified;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        { 
            return view('results.create'); 
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
        $type = "results";
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
        $results = Results::find($id);
        return view('results.edit', compact('results'));
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

        $results = Results::find($id); 
        $results->comment = $request->get('comment'); 
        $results->first_name = $request->get('first_name'); 
        $results->last_name = $request->get('last_name'); 
        $results->email = $request->get('email');  
        $results->tone = $request->get('tone'); 
        $results->save(); 

        return redirect('/comments')->with('success', 'Comment updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Results::find($id); 
        $request->delete(); 
        return redirect('/verify')->with('success', 'Comment deleted!');
    }
}
