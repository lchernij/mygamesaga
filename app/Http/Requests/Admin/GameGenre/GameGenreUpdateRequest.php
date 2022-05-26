<?php

namespace App\Http\Requests\Admin\GameGenre;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameGenreUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|' . Rule::unique('game_genres')->ignore($this->game_genre->id),
            'acronym' => 'nullable|max:10|' . Rule::unique('game_genres')->ignore($this->game_genre->id),
            'description' => 'nullable|max:1000',
            'is_active' => 'nullable|string|' . Rule::in(['on']),

            'pt_br_name' => 'nullable|max:255|' . Rule::unique('game_genres')->ignore($this->game_genre->id),
            'pt_br_description' => 'nullable|max:1000',
        ];
    }
}
