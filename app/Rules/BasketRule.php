<?php

namespace App\Rules;

use App\menu;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class BasketRule implements Rule
{
    public $total_price; //Итоговая сумма заказа, полученная от пользователя
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->total_price = $param;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product_ids = []; //id продуктов, находящиеся в корзине
        $basket = []; //массив-связка id продукта и его количества
        $total_price = 0; //итоговая стоимость корзины

        foreach ($value as $product){
            //Если не существует какого-то параметра, то возвращаем ошибку
           if(!isset($product['id'], $product['qty'])){
                return false;
           }
            //Если какого-то товара меньше 1, то в корзину вносились изменения
            if($product['qty'] <= 0){
                return false;
            }
            //Если id заказа или количество не число, то возвращаем ошибку
            if(is_int($product['id']) && is_int($product['qty'])){
                $product_ids[] = $product['id'];
                $basket[$product['id']] = $product['qty'];
            }else{
                return false;
            }
        }

        //Берем из БД заказы, которые есть в корзине
        $products = menu::all();
        $products_data = $products->whereIn('id',  $product_ids);

        //Считаем итоговую стоимость
        foreach ($products_data as $data){
            $total_price += $basket[$data->id]*$data->price;
        }

        //Если полученная стоимость совпадет с пришедшей от клиента, то данный корректны
        if($total_price == $this->total_price)
            return true;
        else
            return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'В корзину были внесены неизвестные продукты';
    }
}
