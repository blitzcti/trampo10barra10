<?php

namespace App\Http\Requests\Coordinator;

use App\Models\Internship;
use App\Rules\Active;
use App\Rules\Integer;
use App\Rules\InternshipIsOpen;
use Illuminate\Foundation\Http\FormRequest;

class StoreBimestralReport extends FormRequest
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
            'internship' => ['required', 'integer', 'min:1', 'exists:internships,id', new InternshipIsOpen, new Active(Internship::class)],
            'date' => ['required', 'date'],
            'protocol' => ['required', new Integer, 'digits:7'],
        ];
    }
}
