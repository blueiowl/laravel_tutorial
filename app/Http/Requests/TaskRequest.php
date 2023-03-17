<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは省略できません',
            'title.unique' => 'タイトルが重複しています',
            'content.required' => 'タスク内容は省略できません',
        ];
    }

    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('tasks')->ignore($this->id)],
            'content' => ['required'],
        ];
    }
}
