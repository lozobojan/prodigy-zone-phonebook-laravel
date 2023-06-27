<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email:rfc,dns'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            // 'avatarPhoto' => ['optional', 'image']
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Molimo Vas da unesete ime',
            'first_name.min' => 'Ime mora sadrzati najmanje :min karaktera',
            'last_name.required' => 'Molimo Vas da unesete prezime',
            'last_name.min' => 'Prezime mora sadrzati najmanje :min karaktera',
            'email.required' => 'Molimo Vas da unesete email adresu',
            'email.email' => 'Molimo Vas da unesete ispravnu email adresu',
            'city_id.required' => 'Molimo Vas da odaberete grad',
            'city_id.integer' => 'Molimo Vas da odaberete ispravan grad',
            'city_id.exists' => 'Molimo Vas da odaberete ispravan grad',
            // 'avatarPhoto.image' => 'Molimo Vas da odaberete validnu fotografiju',
        ];
    }
}
