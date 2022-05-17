<?php

namespace App\Http\Requests\Admin\GamePlataform;

use Illuminate\Foundation\Http\FormRequest;

class GamePlataformUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:gameplataforms',
            'acronym' => 'nullable|max:10|unique:gameplataforms,' . $this->gamePlataform->id,
            'company' => 'nullable|max:255',
            'is_active' => 'nullable|boolean'
        ];
    }
}
