<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //{"company_id":1,"leaveType":0,"startLeave":"2024-2-5","endLeave":"2024-2-20","reason":"aaa"}
            'company_id'=>'required',
            'startLeave'=>'required',
            'endLeave'=>'required',
            'leaveType'=>'required',
            'reason'=>'required',
        ];
    }
}
