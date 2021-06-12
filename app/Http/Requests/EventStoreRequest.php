<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'days' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'description.required' => 'Description is required!',
            'startTime.required' => 'Start time is required!',
            'endTime.required' => 'End time is required!',
            'days.required' => 'Day(s) of the week is required!'
        ];
    }

    public function filters()
    {
        return [
            'name' => 'trim|escape',
            'description' => 'trim'
        ];
    }
}
