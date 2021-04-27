<?php

namespace App\Http\Controllers;

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
        $data['news'] = News::select(['id', 'created_at', 'title'])->orderBy('created_at', 'desc')->paginate();
        return view('admin.News_index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.News_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'ctx' => 'required'
        ]);
        $item = new News();
        $item->title = $request->input('title');
        $item->ctx = $request->input('ctx');
        $item->save();
        return response("200");
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
        $data['news'] = News::select(['id', 'title', 'ctx', 'created_at'])->where('id', $id)->get();
        if (count($data['news']) === 0) {
            return $this->index();
        }
        return view('admin.News_show')->with('data', $data);
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
        $data['news'] = News::select(['id', 'title', 'ctx', 'created_at'])->where('id', $id)->get();
        if (count($data['news']) === 0) {
            return $this->index();
        }
        return view('admin.News_edit')->with('data', $data);
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
        //
        $request->validate([
            'title' => 'required',
            'ctx' => 'required'
        ]);
        $item = News::find($id);
        $item->title = $request->input('title');
        $item->ctx = $request->input('ctx');
        $item->save();
        return response("Update OK.", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        return response("Remove ok");
    }
}
