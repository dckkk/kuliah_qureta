<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pages;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller
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
            $pages = Pages::where('name','like', '%'.$keyword.'%')->paginate($perPage);
        } else {
            $pages = Pages::paginate($perPage);
        }

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
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
        $request['slug'] = strtolower(preg_replace("/ /", "-", preg_replace("/[$-\/:-?{-~!\"^_`\[\]]/", "", $request['title'])));
        $requestData = $request->all();
        
        Pages::create($requestData);

        Session::flash('flash_message', 'Pages added!');

        return redirect('admin/pages');
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
        $page = Pages::findOrFail($id);

        return view('admin.pages.show', compact('page'));
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
        $page = Pages::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
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
        $request['slug'] = strtolower(preg_replace("/ /", "-", preg_replace("/[$-\/:-?{-~!\"^_`\[\]]/", "", $request['title'])));
        $requestData = $request->all();
        
        $page = Pages::findOrFail($id);
        $page->update($requestData);

        Session::flash('flash_message', 'Pages updated!');

        return redirect('admin/pages');
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
        Pages::destroy($id);

        Session::flash('flash_message', 'Pages deleted!');

        return redirect('admin/pages');
    }
}
