<template>
    <div class="container">
        <div class="row data-price">
            <div v-for="pizza in basket" class="col-12 row m-2">
                <div class="thumb col-2">
                    <img style="max-width: 100px" :src="'/img/pizza/' + pizza.filename">
                </div>
                <div class="col-4">
                    <h3>{{ pizza.name }}</h3>
                </div>
                <div class="col-2">
                    <span>{{ pizza.price * pizza.qty }}</span>
                </div>
                <div class="col-4 row">
                    <div class="col-2">
                        <button @click.prevent="addToBasket(pizza.id)">+</button>
                    </div>
                    <div class="col-4 text-center">
                        <span>{{ pizza.qty }}</span>
                    </div>
                    <div class="col-2">
                        <button @click.prevent="removeToBasket(pizza.id)">-</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
export default {
    mounted() {
        this.getBasket()
    },
    data() {
        return {
            basket: []
        }
    },
    methods: {
        getBasket(){
            let basket = localStorage.getItem('basket')

            if(basket){
                basket = JSON.parse(basket)

                axios.get('http://127.0.0.1:8000/api/products')
                    .then( res => {
                        let pizzas = res.data.data;
                        basket.forEach(product => {
                            let pizza = pizzas.find(pizza => pizza.id == product.id)
                            Object.assign(product, pizza)
                        })

                        this.basket = basket
                    })
            }
        },

        addToBasket(idPizza){

            let basket = localStorage.getItem('basket')

            if(basket){
                basket = JSON.parse(basket)
                basket.forEach(product => {
                    if (product.id === idPizza){
                        product.qty = Number(product.qty) + 1
                        this.basket.find(pizza => pizza.id == product.id).qty = Number(product.qty)

                    }
                })

                localStorage.setItem('basket', JSON.stringify(basket))
            }
        },

        removeToBasket(idPizza){

            let basket = localStorage.getItem('basket')

            if(basket){
                basket = JSON.parse(basket)
                basket.forEach(product => {
                    if (product.id === idPizza){
                        product.qty = Number(product.qty) - 1
                        if(product.qty <= 0){
                            this.basket.splice( this.basket.findIndex(pizza => pizza.id == product.id), 1)
                            basket.splice(basket.findIndex(pizza => pizza.id == product.id), 1)
                        }else{
                            this.basket.find(pizza => pizza.id == product.id).qty = Number(product.qty)
                        }
                    }
                })

                localStorage.setItem('basket', JSON.stringify(basket))
            }

        }
    }


}
</script>

