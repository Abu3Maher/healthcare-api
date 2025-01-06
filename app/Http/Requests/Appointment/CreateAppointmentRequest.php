<?php

namespace App\Http\Requests\Appointment;

use App\Models\Service\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'doctor_id' => [
                'required',
                Rule::exists('users', 'id')
                    ->where('role', 'doctor'),
            ],
            'service_id' => [
                'required',
                Rule::exists('services', 'id'),
                function ($attribute, $value, $fail) {
                    $service = Service::query()
                        ->where('id', $value)
                        ->first();

                    $serviceHasDoctor = $service->doctors()->where('doctor_id', $this->input('doctor_id'))->exists();
                    if (!$serviceHasDoctor) {
                        $fail('Service is not available for this doctor.');
                    }
                }
            ],
            'description' => [
                'nullable',
                'max:255',
            ],
            'booked_at' => [
                'required',
                'date_format:Y-m-d h:i',
            ],
            'price' => [
                'required'
            ],
            'duration' => [
                'required'
            ],
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $service = Service::query()
            ->where('id', $data['service_id'])
            ->first();

        $data['price'] = $service->price;
        $data['duration'] = $service->duration;

        return $data;
    }
}
