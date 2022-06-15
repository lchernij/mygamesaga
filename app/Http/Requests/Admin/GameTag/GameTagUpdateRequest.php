<?php

namespace App\Http\Requests\Admin\GameTag;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameTagUpdateRequest extends FormRequest
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
            'pt_br_name' => 'required|max:255|' . Rule::unique('game_tags')->ignore($this->game_tag->id),

            'en_us_name' => 'nullable|max:255|' . Rule::unique('game_tags')->ignore($this->game_tag->id),

            'is_active' => 'nullable|string|' . Rule::in(['on']),
        ];
    }
}
