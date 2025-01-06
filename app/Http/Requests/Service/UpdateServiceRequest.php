<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return user()->where('role', 'admin')->exists();
    }

    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'max:65',
                'min:2',
            ],
            'description' => [
                'nullable',
                'max:255',
            ],
            'price' => [
                'sometimes',
                'numeric',
                'min:1',
            ],
            'duration' => [
                'sometimes',
                'integer',
                function ($attribute, $value, $fail) {
                    if ($value % 15 !== 0) {
                        $fail($attribute . ' must be a multiple of 15.');
                    }
                },
            ],
        ];
    }
}
