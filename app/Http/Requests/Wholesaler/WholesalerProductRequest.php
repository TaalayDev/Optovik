<?php

namespace App\Http\Requests\Wholesaler;

use Illuminate\Foundation\Http\FormRequest;

class WholesalerProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unit' => 'required|min:2|max:5',
            'description' => 'nullable|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'description' => 'Описание',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'unit' => 'Единица измерения'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'поле имя является обязательным',
            'price.required' => 'поле цена является обязательным'
        ];
    }

}
