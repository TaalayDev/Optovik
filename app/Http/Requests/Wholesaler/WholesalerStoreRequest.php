<?php

namespace App\Http\Requests\Wholesaler;

use Illuminate\Foundation\Http\FormRequest;

class WholesalerStoreRequest extends FormRequest
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
            'name' => 'nullable|max:50',
            'store_base_name' => 'nullable|max:50',
            'state' => 'nullable|numeric',
        ];
    }
}
