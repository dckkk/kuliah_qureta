<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Chapters;
use Illuminate\Http\Request;
use Session;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $chapter = Chapters::with('course')->where('name','like', '%'.$keyword.'%')->paginate($perPage);;
        } else {
            $chapter = Chapters::paginate($perPage);
        }

        return view('admin.chapter.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request['slug'] = strtolower(preg_replace("/ /", "-", $request['name']));
        $request['duration'] = (empty($request['duration']))?0:$request['duration'];
        $request['url_video'] = (empty($request['url_video']))?"null":$request['url_video'];

        $requestData = $request->all();
        
        Chapters::create($requestData);

        Session::flash('flash_message', 'Chapters added!');

        return redirect('admin/chapter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $chapter = Chapters::with('course')->findOrFail($id);

        return view('admin.chapter.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $chapter = Chapters::findOrFail($id);

        return view('admin.chapter.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $chapter = Chapters::findOrFail($id);
        $chapter->update($requestData);

        Session::flash('flash_message', 'Chapters updated!');

        return redirect('admin/chapter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Chapters::destroy($id);

        Session::flash('flash_message', 'Chapters deleted!');

        return redirect('admin/chapter');
    }
}
