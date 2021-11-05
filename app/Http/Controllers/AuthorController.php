<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Resources\AuthorResource;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Author::get();
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
            'name'=>'min:3|max:10',
            'age'=>'min:1|max:10',
            'province'=>'nullable'
        ]);
        $author = new Author();
        $author->name = $request->name;
        $author->age = $request->age;
        $author->province = $request->province;
        $author->save();
        return response()->json(['message' => 'Author Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Author::findOrFail($id);
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
            'name'=>'min:3|max:10',
            'age'=>'min:1|max:10',
            'province'=>'nullable'
        ]);
        $author = Author::FindOrFail($id);
        $author->name = $request->name;
        $author->age = $request->age;
        $author->province = $request->province;
        $author->save();
        return response()->json(['message' => 'Author Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Author::destroy($id);
        if($isDelete == 1)
            return response()->json(['message'=> 'Author delete successfully'],200);
            return response()->json(['message'=> 'ID Not Esist'],404);
        
    }
}