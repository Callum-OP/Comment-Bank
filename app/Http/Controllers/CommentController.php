<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all(); 

        return view('comments.index', compact('comments'));
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
        $request->validate([ 
            'comment'=>'required', 
            'first_name'=>'required', 
            'last_name'=>'required', 
            'email'=>'required'
        ]); 

        $comment = new Comment([ 
            'comment' => $request->get('comment'),
            'first_name' => $request->get('first_name'), 
            'last_name' => $request->get('last_name'), 
            'email' => $request->get('email'), 
            'tone' => $request->get('tone')
        ]); 
        $comment->save(); 
        return redirect('/comments')->with('success', 'Comment saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    { 
        return view('comments.show', compact('id'));         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    { 
        $comment = Comment::find($id); 
        return view('comments.edit', compact('comment'));         
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

        $comment = Comment::find($id); 
        $comment->comment = $request->get('comment'); 
        $comment->first_name = $request->get('first_name'); 
        $comment->last_name = $request->get('last_name'); 
        $comment->email = $request->get('email');  
        $comment->tone = $request->get('tone'); 
        $comment->save(); 

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
        $comment = Comment::find($id); 
        $comment->delete(); 

        return redirect('/comments')->with('success', 'Comment deleted!');
    }
}
