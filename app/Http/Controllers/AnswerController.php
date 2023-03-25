<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;


class AnswerController extends Controller
{

    public function store(Request $request, $id)
    {
        $data = request()->validate([
            'content' => 'required'
        ]);

        $connectedUser = auth()->user();

        if (!$connectedUser) {
            return redirect()->back()->withErrors("Veuillez-vous connecter d'abord");
        }

        $answerData = $request->all();
        $answerData['user_id'] = auth()->user()->id;
        $answerData['question_id'] = $id;

        $newAnswer = Answer::create($answerData);

        return redirect()->back();
   }


    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'));
    }

    public function update(Question $question, Answer $answer)
    {
        $data = request()->validate([
            'content' => 'required'
        ]);

        $answer->update($data);

        return redirect()->route('questions.show', $question);
    }

    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();

        return back();
    }

}
