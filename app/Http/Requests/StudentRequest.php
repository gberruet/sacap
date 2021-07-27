<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StudentRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'first_name'        => 'required|max:50',
            'last_name'         => 'required|max:50',
            'student_type_id'   => 'required',
            'nationality_id'    => 'required',
            'document_type_id'  => 'required',
            'document_number'   => 'required',
            'file_number'       => 'required|unique:students,file_number,'.$request->id,
            'phone_number'      => 'required',
            'email'             => 'required|unique:students,email,'.$request->id,
        ];
    }
}
