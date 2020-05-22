<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaper extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'categorie_id' => ['required'],
            'description' => ['required', 'string'],
            'revision_date' => ['required'],
            'state' => ['required'],
            'pdf_url' => ['required','mimes:pdf'],
        ];
    }
}
