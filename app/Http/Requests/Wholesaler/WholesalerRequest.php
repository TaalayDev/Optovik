<?php

namespace App\Http\Requests\Wholesaler;

use Illuminate\Foundation\Http\FormRequest;

class WholesalerRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:wholesalers',
            'info' => 'nullable|max:255',
            'phone' => 'required|min:9|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'info' => 'Описание',
            'phone' => 'Тел.номер'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'поле имя является обязательным',
            'phone.required' => 'поле описание является обязательным'
        ];
    }

}
