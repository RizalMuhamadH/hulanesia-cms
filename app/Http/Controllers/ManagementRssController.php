<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ManagementRss;
use Illuminate\Http\Request;

class ManagementRssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management-rss.index');
    }

    /**
     * Show the form for adding a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $action = 'Add';

        $categories = Category::with('children')->where('parent_id', 0)->get();

        return view('management-rss.edit-add', ['action' => $action, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feed = ManagementRss::create([
            'name' => $request->name,
            'slug' => str($request->name)->slug('-'),
            'type' => $request->type,
            'category_id' => $request->category_id,
            'size' => $request->size,
            'status' => $request->status,
            'utm' => $request->utm,
            'format' => $request->format
        ]);

        activity()
            ->performedOn($feed)
            ->event('store')
            ->withProperties(['data' => $feed->with('category')])
            ->log('store feed');

        return redirect()->route('management-rss.index')->with('message', 'Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManagementRss  $managementRss
     * @return \Illuminate\Http\Response
     */
    public function show(ManagementRss $managementRss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManagementRss  $managementRss
     * @return \Illuminate\Http\Response
     */
    public function edit(ManagementRss $managementRss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManagementRss  $managementRss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagementRss $managementRss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManagementRss  $managementRss
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagementRss $managementRss)
    {
        //
    }
}
