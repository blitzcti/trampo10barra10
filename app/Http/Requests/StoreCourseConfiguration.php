<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseConfiguration extends FormRequest
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
            'minYear' => 'required|numeric|min:1|max:3',
            'minSemester' => 'required|numeric|min:1|max:2',
            'minHour' => 'required|numeric|min:1',
            'minMonth' => 'required|numeric|min:1',
            'minMonthCTPS' => 'required|numeric|min:1',
            'minMark' => 'required|numeric|min:0|max:10',
        ];
    }
}