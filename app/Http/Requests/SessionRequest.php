<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLocalization;

class SessionRequest extends FormRequest
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
        if(request()->route()->id){

            $rule = [
                'total_price' => "nullable|string",
                'date' => "nullable|date",
                'paid_price' => "nullable|string",
                'status' => "nullable|string",
                'section_id' =>  'nullable|exists:sections,id',
            ];



        }else{

            $rule = [
                'total_price' => "required|string",
                'date' => "required|date",
                'paid_price' => "required|string",
                'status' => "required|string",
                'section_id' =>  'required|exists:sections,id',
            ];


        }//end else


        return $rule;

    }
}
