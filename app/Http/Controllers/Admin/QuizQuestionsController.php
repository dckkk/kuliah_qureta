<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\QuizQuestions;
use Illuminate\Http\Request;
use Session;

class QuizQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quiz_questions = QuizQuestions::paginate($perPage);
        } else {
            $quiz_questions = QuizQuestions::paginate($perPage);
        }

        return view('admin.quiz_questions.index', compact('quiz_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quiz_questions.create');
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
        
        QuizQuestions::create($requestData);

        Session::flash('flash_message', 'QuizQuestions added!');

        return redirect('admin/quiz_questions');
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
        $quiz_question = QuizQuestions::findOrFail($id);

        return view('admin.quiz_questions.show', compact('quiz_question'));
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
        $quiz_question = QuizQuestions::findOrFail($id);

        return view('admin.quiz_questions.edit', compact('quiz_question'));
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
        
        $quiz_question = QuizQuestions::findOrFail($id);
        $quiz_question->update($requestData);

        Session::flash('flash_message', 'QuizQuestions updated!');

        return redirect('admin/quiz_questions');
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
        QuizQuestions::destroy($id);

        Session::flash('flash_message', 'QuizQuestions deleted!');

        return redirect('admin/quiz_questions');
    }
}
