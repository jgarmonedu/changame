<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_number' => ['nullable','regex:/^(\+\d{1,3}[- ]?)?\d{9}$/'],   // phone:ZZ
            'postal_code' => ['nullable','regex:/^(?:0?[1-9]|[1-4]\d|5[0-2])\d{3}$/'],
            'photo' => ['mimes:jpg,png,jpeg'],
        ];
    }
}
