<?php

namespace App\Http\Requests;

use App\Rules\BasketRule;
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
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|min:5|max:50',
            'address' => 'required|string|min:5|max:100',
            'phone' => 'required|string|min:7|max:10',
            'total_price' => 'required|integer|min:100|max:100000'
        ];
    }

    public function attributes()
    {
        return [
            'name'  =>  'ФИО',
            'address'  =>  'Адрес',
            'phone'  =>  'Номер телефона',
            'products'  =>  'Корзина',
            'total_price'  =>  'Итоговая стоимость',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" является обяззательным',
            'products.required' => 'Корзина не должна быть пустой',
            'total_price.required' => 'Корзина не должна быть пустой',
            'min' => 'Поле :attribute должно состоять минимум из :min символов',
            'max' => 'Поле :attribute должно состоять максимум из :max символов',
            'total_price.max' => 'Стоимость товаров должна быть макимум :max ',
            'total_price.min' => 'Стоимость товаров должна быть минимум :min ',
            'email.email' => 'Должен быть введен корректный адрес электронной почты'
        ];
    }
}
