<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:10',
            'products' => 'required|array',
            'total_price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле ФИО является обяззательным',
            'email.required' => 'Поле email является обяззательным',
            'address.required' => 'Поле адрес является обяззательным',
            'phone.required' => 'Поле телефон является обяззательным',
            'products.required' => 'Корзина не должна быть пустой',
            'total_price.required' => 'Корзина не должна быть пустой'
        ];
    }
}
