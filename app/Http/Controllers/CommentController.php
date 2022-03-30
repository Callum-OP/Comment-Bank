<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminology;
use App\Results;

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

    public function verify()
    {
        $terminologies = Terminology::all();
        $results = Results::all();

        return view('comments.verify', compact('terminologies'), compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        { 
            return view('comments.create'); 
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

        return view('comments.show', compact('terminologies'), compact('results'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id) 
    { 

    }       

                /**
     * Update and add an already created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id); 
        $comment->delete(); 

        return redirect('/comments')->with('success', 'Comment deleted!');
    }
}
