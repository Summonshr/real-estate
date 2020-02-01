<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class CreateProperty extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->balance >= 100 || true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->method('GET') ? [] : [
            'name'=>'required|unique:properties',
            'purpose'=>'required|in:sale,rent',
            'price'=>'required|integer',
            'unit'=>'required',
            'type'=>'in:'.\App\Type::pluck('key')->join(','),
        ];
    }
}
