<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCourseRequest extends Request
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
            'input_category'    =>  'required',
            'input_course_name' =>  'required',
            'input_subject'     =>  'required',
            'input_description' =>  'required',
            'input_start_date'  =>  'required',
            'input_end_date'    =>  'required',
            'input_number_of_student' =>  'required'
        ];
    }
}
