<?php

namespace App\Http\Controllers;
use App\Models\Categorie;

use App\Models\Question;
use App\Models\Answer;

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
        /*$request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'nullable',
        ]);
           */
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

    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        /* $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'nullable',
        ]);*/

        $question = Question::find($id);
        $question->update($request->all());
//        $question->retag($validatedData['tags'] ?? '');

        return redirect()->route('questions.show', $question);
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', ['question' => $question]);
    }


    public function destroy($id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->back()->withErrors('La question n\'existe pas.');
        }
        $question->delete();

        return redirect()->route('questions.index');
    }
}
