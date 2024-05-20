<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Rules\OibValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'price' => [
                'nullable',
                'numeric',
                'min:0',
                'max:99999999',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'oib' => [
                'nullable',
                new OibValidationRule,
                function ($attribute, $value, $fail) {
                    if (Project::whereNotNull('oib')->where('oib', $value)->exists()) {
                        $fail(strtoupper($attribute).' exists.');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'price.min' => 'the price must be positive',
            'price.max' => 'Max price 99.999.999',
        ];
    }
}
