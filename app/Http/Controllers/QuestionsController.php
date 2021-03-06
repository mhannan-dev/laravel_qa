<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // \DB::enableQueryLog();
        // $data['questions'] = Question::latest()->paginate(5);
        // //dd($data['questions']);
        // //return view('frontend.pages.question.index', $data);
        // view('frontend.pages.question.index', $data)->render();
        // dd(\DB::getQueryLog());

        $data['questions'] = Question::with('user')->latest()->paginate(5);
        //dd($data['questions']);

        //dd($data['questions']);
        return view('frontend.pages.question.index', $data);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $question = new Question();
        //$data['question'] = new Question();
        return view('frontend.pages.question.create', compact('question'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {

        //dd($request->all());

        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been submitted!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

        $question->increment('views');
        //dd($question);
        return view('frontend.pages.question.show', compact('question'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        $data['page_title'] = "Edit Question";
        // if (\Gate::denies('update-question', $question)) {
        //     abort(403, "Access Denied");
        // }
        $this->authorize("update", $question);


        return view('frontend.pages.question.edit', $data, compact('question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        // if (\Gate::denies('update-question', $question)) {
        //     abort(403, "Access Denied");

        // }
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        // if (\Gate::denies('delete-question', $question)) {
        //     abort(403, "Access Denied");
        // }
        $this->authorize("delete", $question);


        $question->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'message' => "Your question has been deleted.",
            ]);
        }

        return redirect('/questions')->with('success', "Your question has been deleted.");

    }
}
