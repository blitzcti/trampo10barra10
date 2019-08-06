<?php

namespace App\Http\Requests;

use App\Rules\CNPJ;
use App\Rules\CPF;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pj' => 'required|boolean',

            'cpfCnpj' => ['required', 'numeric', ($this->get('pj')) ? new CNPJ : new CPF],
            'active' => 'required|boolean',
            'name' => 'required|max:100',
            'fantasyName' => 'max:100',
            'email' => 'required|max:100',
            'phone' => 'required|numeric|digits_between:10,11',
            'representativeName' => 'required|max:50',
            'representativeRole' => 'required|max:50',

            'cep' => 'required|max:9',
            'uf' => 'required|max:2',
            'city' => 'required|max:30',
            'street' => 'required|max:50',
            'complement' => 'max:50',
            'number' => 'required|max:6',
            'district' => 'required|max:50',

            'sectors' => 'required|array|min:1',

            'courses' => 'required|array|min:1',
        ];
    }
}
