<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'heure_depart' => 'required|after:now',
            'date' => 'required',
            'passager' => 'required',
            'chauffeur' => 'required',
            'itineraire' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'heure_depart.required' => 'L\'heure de départ est requise',
            'heure_depart.after' => 'Heure incorrecte',
        ];
    }
}
