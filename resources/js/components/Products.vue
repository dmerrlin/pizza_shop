<template>
    <div class="container">
        <div v-if="pizzas.length == 0" class="text-center m-5 p-5">
            <h1>Товары куда-то пропали. Мы их ищем!</h1>
        </div>
        <div v-else class="row data-price">
            <div class="col-12 mb-4 sort">
                <button @click.prevent="sortUp">Цена возрастание</button>
                <button @click.prevent="sortDown">Цена убывание</button>
            </div>
            <div v-for="pizza in pizzas" class="col-6 mb-3 row">
                <div class="thumb col-4">
                    <img style="max-width: 100%" :src="'/img/pizza/' + pizza.filename">
                </div>
                <div class="info col-8 row">
                    <h3 class="col-12">{{ pizza.name }}</h3>
                    <p class="col-12">{{ pizza.info }}</p>
                    <h4 class="col-4 text-center">{{ pizza.price }}</h4>
                    <button class="col-6 btn btn-primary" @click.prevent="addToBasket(pizza.id)">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getProducts()
    },
    data() {
      return {
          pizzas: []
      }
    },
    methods: {
        getProducts(){
            axios.get('/api/products')
                .then( res => {
                    this.pizzas = res.data.data;
                })
        },

        sortUp(){
            this.pizzas.sort((a, b) => a.price >= b.price ? 1 : -1)
        },

        sortDown(){
            this.pizzas.sort((a, b) => a.price <= b.price ? 1 : -1)
        },

        addToBasket(idPizza){

            let basket = localStorage.getItem('basket')

            let newProduct = [
                {
                    'id': idPizza,
                    'qty': 1
                }
            ]

            if(!basket){
                localStorage.setItem('basket', JSON.stringify(newProduct))
            } else {
                basket = JSON.parse(basket)
                basket.forEach(product => {
                    if (product.id === idPizza){
                        product.qty = Number(product.qty) + 1
                        newProduct = null
                    }
                })

                Array.prototype.push.apply(basket, newProduct)
                localStorage.setItem('basket', JSON.stringify(basket))
            }

        }
    }
}
</script>
