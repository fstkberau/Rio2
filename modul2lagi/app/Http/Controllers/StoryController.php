<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $story = Story::all();
        return view('stories', compact('story'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'story' => 'required|max:255',
            'points' => 'required|numeric',
            'actual_point' => 'required|numeric',
            'remaining_point' => 'required|numeric',
            'status' => 'required|in:progress,done_dev,to_test,to_review,done,incomplete,rejected,cancelled',
            'test_date' => 'required|date',
            'note' => 'required|max:255',
            //'editor' => 'required|max:255',
        ]);
        
        $storeData['editor'] = Auth::user()->id;
        $story = Story::create($storeData);

        return redirect('/stories')->with('completed', 'Story has been saved!');
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
        $story = Story::findOrFail($id);
        return view('edit', compact('story'));
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
        $updateData = $request->validate([
            'story' => 'required|max:255',
            'points' => 'required|numeric',
            'actual_point' => 'required|numeric',
            'remaining_point' => 'required|numeric',
            'status' => 'required|in:progress,done_dev,to_test,to_review,done,incomplete,rejected,cancelled',
            'test_date' => 'required|date',
            'note' => 'required|max:255',
            //'editor' => 'required|max:255',
        ]);
        $updateData['editor'] = Auth::user()->id;
        Story::whereId($id)->update($updateData);
        return redirect('/stories')->with('completed', 'Story has been updated');
    }

    public function update_status(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $affected = Story::where('id', $id)
              ->update(['status' => $status]);
        return response()->json(array('success'=> true), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return redirect('/stories')->with('completed', 'Story has been deleted');
    }
}
