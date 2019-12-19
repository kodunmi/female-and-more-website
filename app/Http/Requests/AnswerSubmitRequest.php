<?php

namespace App\Http\Requests;

use App\Response;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class AnswerSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_one' => ['required', 'string'],
            'question_two' => ['required', 'string'],
            'question_four' => ['required', 'string'],
            'question_five' => ['required', 'string'],
            'question_six' => ['required', 'string']
        ];
    }

    public function increaseUserScore()
    {
        User::find(auth()->id())->first()->increment('story_score',10);
        User::find(auth()->id())->first()->increment('total_score',10);

        return $this;
    }

    public function storeResponse($story_number)
    {
        $data = json_encode($this->except('_token'));
        Response::create([
            'user_id' => auth()->id(),
            'season_number' => auth()->user()->season_number,
            'level_number' => auth()->user()->level_number,
            'response' => $data,
            'story_number' => $story_number
        ]);
    }
}
