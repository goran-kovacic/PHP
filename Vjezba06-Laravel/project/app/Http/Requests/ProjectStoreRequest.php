<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Rules\OibValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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

    // https://medium.com/@vannyvanngoggygogg/laravel-on-modals-2c41a98898e4
    // https://medium.com/@vannyvanngoggygogg/laravel-on-modals-validation-c4e7fbe2e256

    public function messages()
    {
        return [
            'price.min' => 'Price must be positive',
            'price.max' => 'Max price 99.999.999',
            'price.regex' => 'decimal separator must be .',
        ];
    }
}
