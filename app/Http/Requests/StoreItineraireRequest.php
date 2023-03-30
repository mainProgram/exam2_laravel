<?php

namespace App\Http\Requests;
use App\Models\Itineraire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreItineraireRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'depart' => ['required',
                function ($attribute, $value, $fail) {
                    $inverse = Itineraire::where('depart', '=', $this->arrivee)
                                ->where('arrivee', '=', $value)
                                ->exists();
                    if ($inverse) {
                        $fail("Un itinéraire avec l'inverse de ces endroits existe déjà.");
                    }
                },],
            'arrivee' => 'required|different:depart',
            'tarif' => 'required|numeric|min:500',
        ];
    }

    public function messages()
    {
        return [
            'arrivee.different' => 'L\'arrivée doit être différente',
            'tarif.required' => 'Le tarif est requis',
            'tarif.min' => 'Minimum de 500 francs',
        ];
    }
}
