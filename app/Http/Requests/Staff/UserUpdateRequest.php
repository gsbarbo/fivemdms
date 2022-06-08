<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'badge_number' => ['string', 'nullable'],
            'display_name' => ['required'],
            'is_protected_user' => ['sometimes',],
            'is_super_user' => ['sometimes'],
        ];
    }
}
