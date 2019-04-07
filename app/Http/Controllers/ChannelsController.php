<?php

namespace App\Http\Controllers;

use Session;
use App\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index()
    {
        return view('Channels.index')->with('channels',Channel::all());
    }

    public function create()
    {
        return view('Channels.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['channel'=>'required']);
        Channel::create(['title'=>$request->channel,
                            'slug'=>str_slug($request->channel)
                        ]);
        Session::flash('Success','channel created.');
        return redirect()->route('channels.index');
    }

    public function edit($id)
    {
        return view('channels.edit')->with('channel',Channel::find($id));
    }

    public function update(Request $request,$id)
    {
        $channel = Channel::find($id);
        $channel->title= $request->channel;
        $channel->slug = str_slug($request->channel);
        $channel->save();

        Session::flash('Success','Channel edited successfuly.');
        return redirect()->route('channels.index');
    }

    public function destroy($id)
    {
        Channel::destroy($id);
        Session::flash('Success','Channel deleted Successfully');

        return redirect()->route('channels.index');
    }
}
