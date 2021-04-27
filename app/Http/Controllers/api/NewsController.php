<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = News::select(['id', 'created_at', 'title'])->orderBy('created_at', 'desc')->paginate(12);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'title' => 'required',
    //         'ctx' => 'required'
    //     ]);
    //     $item = new News();
    //     $item->title = $request->input('title');
    //     $item->ctx = $request->input('ctx');
    //     $item->save();
    //     return response('Store OK');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = News::select(['id', 'title', 'ctx', 'created_at'])->where('id', $id)->get();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $request->validate([
    //         'title' => 'required',
    //         'ctx' => 'required'
    //     ]);
    //     $item = News::findOrFail($id);
    //     $item->title = $request->input('title');
    //     $item->ctx = $request->input('ctx');
    //     $item->save();
    //     return response('Update OK.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     News::destroy($id);
    //     return response('Remove OK.');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    //     return view('admin.News_edit');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('admin.News_create');
    // }

    // public function admin()
    // {
    //     //
    //     return view('admin.News_index');
    // }
}
