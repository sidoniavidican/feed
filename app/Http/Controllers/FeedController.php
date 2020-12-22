<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $feeds = Feed::where('user_id', Auth::user()['id'])->get();
        return view('feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        try {      
            $request['user_id'] = Auth::user()['id'];
            $feed = Feed::create($request->all());
            return redirect()->route('feeds.edit', $feed->id)->with('success', 'Feed created successfully!');
        } catch (Exception $e) {
            return redirect()->route('feeds.index')->with('error', 'Feed url invalid!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        $this->authorize('update', $feed);
        return view('feeds.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        return view('feeds.edit', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        $this->authorize('update', $feed);
        $feed->update($request->all());
        return redirect()->route('feeds.edit', $feed->id)->with('success', 'Feed updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        //
    }

    public function upload(Request $request)
    {
        try {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            return response()->json(['url' => 'public/uploads/'. $filenametostore]);
        }
        catch (Exception $e) {
            return response()->json(['error' => 'error']);
        }
    }
}
