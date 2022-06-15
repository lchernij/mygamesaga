<?php

namespace App\Http\Requests\Admin\GameTag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameTagStoreRequest extends FormRequest
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
            'pt_br_name' => 'required|max:255|unique:game_tags',

            'en_us_name' => 'nullable|max:255|unique:game_tags',

            'is_active' => 'nullable|string|' . Rule::in(['on']),

        ];
    }
}
