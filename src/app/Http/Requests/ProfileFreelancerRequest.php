<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfileFreelancerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'competences' => 'nullable|array',
            'technologies' => 'nullable|array',
            'tarif' => 'nullable|numeric',
            'portfolio' => 'nullable|string',
            'disponibilite' => 'nullable|string',
            'evaluations' => 'nullable|numeric',
            'experience' => 'nullable|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
           response()->json([
            'status' => false,
            'message' => $validator->errors(),
           ],422)
        );
    }


}
