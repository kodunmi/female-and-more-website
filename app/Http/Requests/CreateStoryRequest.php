<?php

namespace App\Http\Requests;
use App\Story;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class CreateStoryRequest extends FormRequest
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
            'level' => 'required',
            'story_number' => ['required', 'numeric'],
            'week_no' => ['required', 'numeric'],
            'name' => 'required',
            'career' =>'required',
            'profile' => 'required',
            'experience' => 'required',
            'quote' => 'required',
            'glory' => 'required',
            'image' => ['required','image','mimes:png,jpg,jpeg']
        ];
    }

    public function storeStoryImage(){
        $uploadedFile = $this->image;
        $this->fileName =  str_slug($this->name).'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->storePubliclyAs('public/story',$this->fileName);
        return $this;
    }

    public function storeStory(){
        $story = new Story;
        $story->level_id = $this->level;
        $story->story_number = $this->story_number;
        $story->story_week_number = $this->week_no;
        $story->icon_name = $this->name;
        $story->icon_career_path = $this->career;
        $story->icon_profile = $this->profile;
        $story->icon_quote = $this->quote;
        $story->icon_experience = $this->experience;
        $story->icon_step_to_glory = $this->glory;
        $story->icon_image = $this->fileName;
        $story->save();
    }
}
