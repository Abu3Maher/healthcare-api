<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return user()->where('role', 'admin')->exists();
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:65',
                'min:2',
            ],
            'services' => [
                'required',
                'array',
            ],
            'services.*' => [
                'required',
                'numeric',
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    if ($value % 15 !== 0) {
                        $fail($attribute . ' must be a multiple of 15.');
                    }
                },
            ],
            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
                function ($attribute, $value, $fail) {
                    if ($value % 15 !== 0) {
                        $fail($attribute . ' must be a multiple of 15.');
                    }
                },
            ],
            'days' => [
                'required',
                'array'
            ]
        ];
    }
}
