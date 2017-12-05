<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Course;
use App\CourseUser;
use App\Topics;
use App\Teacher;

use Illuminate\Http\Request;
use Session;
use Datatables;

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

        $request['slug'] = strtolower(preg_replace("/ /", "-", preg_replace("/[$-\/:-?{-~!\"^_`\[\]]/", "", $request['name'])));

        if($request['image']) {
            if ($request['image']->isValid()) {
                $destinationPath = public_path('uploads/course/');
                $extension = $request['image']->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                $request['image']->move($destinationPath, $fileName);
            }
            $request['url_foto'] = $fileName;
        } else {
            Session::flash('flash_message', 'Error! Gambar harus diisi !');
            return  redirect()->back();
            die();
        }

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
        $request['slug'] = strtolower(preg_replace("/ /", "-", preg_replace("/[$-\/:-?{-~!\"^_`\[\]]/", "", $request['name'])));
        if($request['image']) {
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

   public function enrollees($courseid)
   {
       $course = Course::where('id',$courseid)->first();
       return view('admin.course.enrollee_dt',compact('course'));
   }
   public function enrolleesData($courseid)
    {
        //return Datatables::of(User::query())->make(true);
        $courseuser = CourseUser::select('email')->where('course_id',$courseid)->get();
        return Datatables::of(User::select('users.id', 'name', 'meta_value')->join('user_meta', function ($join) {
            $join->on('users.id', '=', 'user_id');
            $join->where('meta_name','=','profesi');
        })->whereIn('email',$courseuser))->addColumn('action', function ($user) {
                return '<a href="https://www.qureta.com/profile/edit/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>';
            })->make(true);
    }
}
