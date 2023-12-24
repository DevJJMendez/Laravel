<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'title' => 'required|max:100|min:3',
            'description' => 'required|max:100|min:3'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Debe ingresar el titulo',
            'title.min' => 'Debe tener al menos 3 caracteres',
            'description.required' => 'Debe ingresar la descripcion',
            'description.min' => 'Debe tener al menos 3 caracteres'
        ];
    }
}
