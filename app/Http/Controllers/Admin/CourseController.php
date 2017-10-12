<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\Topics;
use App\Teacher;

use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
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
            $course = Course::with('topics', 'teachers')->where('name','like', '%'.$keyword.'%')->paginate($perPage);
        } else {
            $course = Course::with('topics', 'teachers')->paginate($perPage);
        }

        return view('admin.course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.course.create');
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
        if ($request['image']->isValid()) {
            $destinationPath = public_path('uploads/course/');
            $extension = $request['image']->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            $request['image']->move($destinationPath, $fileName);
        }
        $request['url_foto'] = $fileName;

        $requestData = $request->all();
        
        Course::create($requestData);

        Session::flash('flash_message', 'Course added!');

        return redirect('admin/course');
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
        $course = Course::with('topics', 'teachers')->findOrFail($id);

        return view('admin.course.show', compact('course'));
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
        $course = Course::findOrFail($id);

        return view('admin.course.edit', compact('course'));
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
        if($request['image'] !== NULL) {
            if ($request['image']->isValid()) {
                $destinationPath = public_path('uploads/course/');
                $extension = $request['image']->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                $request['image']->move($destinationPath, $fileName);
            }
            $request['url_foto'] = $fileName;
        }

        $requestData = $request->all();
        
        $course = Course::findOrFail($id);
        $course->update($requestData);

        Session::flash('flash_message', 'Course updated!');

        return redirect('admin/course');
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
        Course::destroy($id);

        Session::flash('flash_message', 'Course deleted!');

        return redirect('admin/course');
    }
}
