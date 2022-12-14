<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'          => ['numeric'],
            'category'    => ['required', 'string'],
            'title'       => ['required', 'string'],
            'link'        => ['nullable', 'string', 'active_url'],
            'status'      => ['required', 'string'],
            'complete_at' => ['nullable', 'string'],
            'comment'     => ['nullable', 'string'],
        ];
    }
}
