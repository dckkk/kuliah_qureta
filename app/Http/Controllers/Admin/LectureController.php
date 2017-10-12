<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lectures;
use Illuminate\Http\Request;
use Session;

class LectureController extends Controller
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
            $lecture = Lectures::with('chapters', 'course')->where('name','like', '%'.$keyword.'%')->paginate($perPage);
        } else {
            $lecture = Lectures::paginate($perPage);
        }

        return view('admin.lecture.index', compact('lecture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.lecture.create');
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
        
        $requestData = $request->all();
        
        Lectures::create($requestData);

        Session::flash('flash_message', 'Lectures added!');

        return redirect('admin/lecture');
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
        $lecture = Lectures::with('chapters', 'course')->findOrFail($id);

        return view('admin.lecture.show', compact('lecture'));
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
        $lecture = Lectures::findOrFail($id);

        return view('admin.lecture.edit', compact('lecture'));
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
        $request['slug'] = strtolower(preg_replace("/ /", "-", $request['name']));
        
        $requestData = $request->all();
        
        $lecture = Lectures::findOrFail($id);
        $lecture->update($requestData);

        Session::flash('flash_message', 'Lectures updated!');

        return redirect('admin/lecture');
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
        Lectures::destroy($id);

        Session::flash('flash_message', 'Lectures deleted!');

        return redirect('admin/lecture');
    }
}
