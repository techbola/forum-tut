<?php

namespace App\Http\Controllers;

use Session;

use Auth;

use App\Reply;

use App\Like;

use Illuminate\Http\Request;

class RepliesController extends Controller
{
    
	public function like($id)
	{
		$reply = Reply::find($id);

		Like::create([

			'reply_id' => $id,
			'user_id' => Auth::id()

		]);

		Session::flash('success', 'You Liked the reply');

		return redirect()->back();

	}

	public function unlike($id)
	{
		$like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

		$like->delete();

		Session::flash('success', 'You unliked the reply');

		return redirect()->back();

	}

	public function best_answer($id)
	{

		$reply = Reply::find($id);

		$reply->best_answer = 1;

		$reply->save();

		$reply->user->points += 100;
		$reply->user->save();

		Session::flash('success', 'Reply has been marked as the best answer');

		return redirect()->back();

	}

	public function edit($id){

        return view('replies.edit', ['reply' => Reply::find($id)]);
    }

    public function update($id){

        $this->validate(request(), [

            'content' => 'required'

        ]);

        $r = Reply::find($id);

        $r->content = request()->content;

        $r->save();

        Session::flash('success', 'Reply updated');

        return redirect()->route('discussion', ['slug' => $r->discussion->slug]);
    }

}
