<template>
    <div class="container">
        <div class="col-12 m-4">
            <div class="sort_class">
                <button @click.prevent="sortUp">Цена возрастание</button>
                <button @click.prevent="sortDown">Цена убывание</button>
            </div>
        </div>
        <div class="row data-price">
            <div v-for="pizza in pizzas" class="col-4 mb-3 row">
                <div class="thumb col-4">
                    <img style="max-width: 100px" :src="'/img/pizza/' + pizza.filename">
                </div>
                <div class="info col-8">
                    <h3>{{ pizza.name }}</h3>
                    <p>{{ pizza.info }}</p>
                    <span>{{ pizza.price }}</span>
                    <button @click.prevent="addToBasket(pizza.id)">В корзину</button>
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
            axios.get('http://127.0.0.1:8000/api/products')
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
