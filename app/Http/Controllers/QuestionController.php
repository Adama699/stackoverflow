<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', [
            'questions' => $questions
        ]);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'nullable',
        ]);

        $questionData = $request->all();
        $questionData['user_id'] = auth()->user()->id;;

        $newQuestion = Question::create($questionData);

        return redirect()->route('questions.show', ['id' => $newQuestion->id]);
    }

   /* public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }
    */

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'nullable',
        ]);

        $question->update($validatedData);
        $question->retag($validatedData['tags'] ?? '');

        return redirect()->route('questions.show', $question);
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', ['question' => $question]);
    }


    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
