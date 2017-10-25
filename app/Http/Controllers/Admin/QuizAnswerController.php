<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\QuizAnswer;
use Illuminate\Http\Request;
use Session;

class QuizAnswerController extends Controller
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
            $quiz_answer = QuizAnswer::with('quiz')->where('name', 'like', '%'.$keyword.'%')->paginate($perPage);
        } else {
            $quiz_answer = QuizAnswer::with('quiz')->paginate($perPage);
        }

        return view('admin.quiz_answer.index', compact('quiz_answer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quiz_answer.create');
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
        
        $requestData = $request->all();
        
        QuizAnswer::create($requestData);

        Session::flash('flash_message', 'QuizAnswer added!');

        return redirect('admin/quiz_answer');
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
        $quiz_answer = QuizAnswer::findOrFail($id);

        return view('admin.quiz_answer.show', compact('quiz_answer'));
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
        $quiz_answer = QuizAnswer::findOrFail($id);

        return view('admin.quiz_answer.edit', compact('quiz_answer'));
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
        
        $quiz_answer = QuizAnswer::findOrFail($id);
        $quiz_answer->update($requestData);

        Session::flash('flash_message', 'QuizAnswer updated!');

        return redirect('admin/quiz_answer');
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
        QuizAnswer::destroy($id);

        Session::flash('flash_message', 'QuizAnswer deleted!');

        return redirect('admin/quiz_answer');
    }
}
