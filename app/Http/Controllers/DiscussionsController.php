<?php

namespace App\Http\Controllers;
use Auth;
use App\Discussion;
use Session;
use App\Reply;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');

    }
    public function store()

    {
        $r= request();
        $this->validate($r,[
            'title'=>'required',
            'channel_id'=>'required',
            'content'=>'required',
        ]);

        $discussion=Discussion::create(
            [
                'title'=>$r->title,
                'content'=>$r->content,
                'channel_id'=>$r->channel_id,
                'user_id'=>Auth::id(),
                'slug'=>str_slug($r->title)
            ]);

            Session::flash('success','Discussion added');

            return redirect()->route('discussion', ['slug'=>$discussion->slug]);


    }

    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies->where('best_answer',1)->first();
        
        return view('Discussion.show')->with('d',$discussion)->with('best_answer',$best_answer);
    }

    public function reply($id)
    {
        $d = Discussion::find($id);
        $reply = Reply::create([
                                    'user_id'=>Auth::id(),
                                    'discussion_id'=>$id,
                                    'content'=>request()->reply
                                ]);
        Session::flash('success','Replies to discussion');
        return redirect()->back();
    }
}
