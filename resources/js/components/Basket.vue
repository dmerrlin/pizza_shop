<template>
    <div class="container">
        <div v-if="basket.length == 0" class="text-center m-5 p-5">
            <h1>КОРЗИНА ПУСТА</h1>
        </div>
        <div v-else class="row data-price">
            <div v-for="pizza in basket" class="col-12 row m-2">
                <div class="thumb col-2">
                    <img style="max-width: 100px" :src="'/img/pizza/' + pizza.filename">
                </div>
                <div class="col-4">
                    <h3>{{ pizza.name }}</h3>
                </div>
                <div class="col-2">
                    <h4>{{ pizza.price * pizza.qty }}</h4>
                </div>
                <div class="col-4">
                    <div class="quantity_inner">
                        <button @click.prevent="removeToBasket(pizza.id)" class="bt_minus">
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                        <input type="text" :value="pizza.qty" size="2" class="quantity" data-max-count="20" />
                        <button  @click.prevent="addToBasket(pizza.id)" class="bt_plus">
                            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center p-4">
                <a href="/order" class="btn btn-primary">Перейти к оформлению</a>
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

                axios.get('/api/products')
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

