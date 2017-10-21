<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teachers;
use Illuminate\Http\Request;
use Session;

class TeacherController extends Controller
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
            $teacher = Teachers::where('name','like', '%'.$keyword.'%')->paginate($perPage);
        } else {
            $teacher = Teachers::paginate($perPage);
        }

        return view('admin.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.teacher.create');
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
        if ($request['image']->isValid()) {
            $destinationPath = public_path('uploads/teacher/');
            $extension = $request['image']->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            $request['image']->move($destinationPath, $fileName);
        }
        $request['url_foto'] = $fileName;

        $requestData = $request->all();
        
        Teachers::create($requestData);

        Session::flash('flash_message', 'Teachers added!');

        return redirect('admin/teacher');
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
        $teacher = Teachers::findOrFail($id);

        return view('admin.teacher.show', compact('teacher'));
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

        $teacher = Teachers::findOrFail($id);

        return view('admin.teacher.edit', compact('teacher'));
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
        if($request['image']) {            
            if ($request['image']->isValid()) {
                $destinationPath = public_path('uploads/teacher/');
                $extension = $request['image']->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                $request['image']->move($destinationPath, $fileName);
            }
        $request['url_foto'] = $fileName;
        }

        $requestData = $request->all();
        
        $teacher = Teachers::findOrFail($id);
        $teacher->update($requestData);

        Session::flash('flash_message', 'Teachers updated!');

        return redirect('admin/teacher');
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
        Teachers::destroy($id);

        Session::flash('flash_message', 'Teachers deleted!');

        return redirect('admin/teacher');
    }
}
