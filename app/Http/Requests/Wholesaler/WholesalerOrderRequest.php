<?php

namespace App\Http\Requests\Wholesaler;

use Illuminate\Foundation\Http\FormRequest;

class WholesalerOrderRequest extends FormRequest
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
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'comment' => 'nullable|max:255',
            'state' => 'nullable|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'product_id' => 'Продукт',
            'comment' => 'Комментарий',
            'quantity' => 'Количество',
            'state' => 'Состояние'
        ];
    }
    
}
