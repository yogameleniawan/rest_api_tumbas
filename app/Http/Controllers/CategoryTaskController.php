<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryTaskResource;
use App\Models\CategoryTask;
use Illuminate\Http\Request;

class CategoryTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryTask::all();
        return CategoryTaskResource::collection($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CategoryTask();
        $category->id = $request->id;
        $category->name = $request->name;
        $category->icon = $request->icon;
        if ($category->save()) {
            return new CategoryTaskResource($category);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoryTask::find($id);
        return new CategoryTaskResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $category = CategoryTask::find($id);
        $category->id = $request->id;
        $category->name = $request->name;
        $category->icon = $request->icon;
        if ($category->save()) {
            return new CategoryTaskResource($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryTask::find($id);
        if ($category->delete()) {
            return new CategoryTaskResource($category);
        }
    }
}
