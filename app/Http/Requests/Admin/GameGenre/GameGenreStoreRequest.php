<?php

namespace App\Http\Requests\Admin\GameGenre;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameGenreStoreRequest extends FormRequest
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
            'name' => 'required|max:255|unique:game_genres',
            'acronym' => 'nullable|max:10|unique:game_genres',
            'description' => 'nullable|max:1000',
            'is_active' => 'nullable|string|' . Rule::in(['on']),

            'pt_br_name' => 'nullable|max:255|unique:game_genres',
            'pt_br_description' => 'nullable|max:1000',
        ];
    }
}
