<?php

namespace App\Http\Controllers;

use Alert;
use Validator;
use App\Models\Comment;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JelajahCommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $posting = Posting::findOrFail($id);

		$validator = Validator::make($request->all(), [  
        'comment' => 'required|min:3'
        ]);
        
        if ($validator->fails()) {                 
   		 Alert::warning('Upss ada kesalahan di comment');  
   		 return redirect('/jelajah/'.$posting->slug)      
  	        ->withErrors($validator)            
            ->withInput();                      
		 }                                          

        $comment = Comment::create([
        'subject' =>  $request->comment,
        'posting_id' => $id,
        'user_id' => Auth::user()->id,
        ]);

        Alert::success('yeay comment berhasil');
        return redirect('/jelajah/'.$posting->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->user->id == Auth::user()->id){ 
        return view('jelajah-comment.edit',compact('comment'));
        } 
        return abort(404);
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
        'edit_comment' => 'required|min:5'
    ]);
        $comment = Comment::findOrFail($id);
        $comment->update([
            'subject' => $request->edit_comment
        ]);
        Alert::success('comment berhasil di edit');
        return redirect('/jelajah/'.$comment->posting->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        Alert::success('comment berhasil di hapus');
        return redirect('/jelajah/'.$comment->posting->slug);
    }
}
