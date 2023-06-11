<template>
    <div class="container">
        <div v-if="order_id != 0" class="text-center m-5 p-5">
            <h3>Заказ {{ order_id }} принят в работу!</h3>
            <h3>В ближайшее время с вами свяжутся по оставленному вами номеру</h3>
        </div>
        <div v-else-if="basket.length == 0" class="text-center m-5 p-5">
            <h1>КОРЗИНА ПУСТА</h1>
        </div>
        <div v-else class="row">
            <div class="col-12 col-lg-12">
                <div class="mx-3 mb-3 cart-title cart-title">
                    <h2>Введите ваши данные</h2>
                </div>
                <div v-if="err" class="alert-danger mb-2">
                    <div v-for="error in err" class="text-center p-1">
                        <span>{{ error[0] }}</span>
                    </div>
                </div>
                <form>
                    <div class="row">

                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" v-model="name" placeholder="ФИО" maxlength="100" value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="email" class="form-control" v-model="email" placeholder="Email" maxlength="50" value="">
                        </div>

                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" v-model="address" placeholder="Адрес" maxlength="100"
                                   value="">
                        </div>
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" v-model="phone" maxlength="10" placeholder="Номер телефона"
                                   value="">
                        </div>

                        <div class="col-12">
                            <div  class="text-center">
                                <h3>Итого: {{totalPrice}}</h3>
                                <input @click.prevent="createOrder" type="submit" class="btn btn-primary" value="Оформить">
                            </div>
                        </div>
                    </div>
                </form>
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
            basket: [],
            phone: '',
            name: '',
            email: '',
            address: '',
            err: [],
            order_id: 0
        }
    },
    computed: {

        totalPrice() {
            let total = 0;
            this.basket.forEach(product => {
                total += product.price * product.qty
            })
            return total
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

        createOrder(){
            this.err = []
            axios.post('/api/orders', {
                'products': this.basket,
                'email': this.email,
                'phone': this.phone,
                'name': this.name,
                'address': this.address,
                'total_price': this.totalPrice
            })
                .then(res =>{
                  if(res.status == 201){
                      localStorage.removeItem('basket')
                      console.log(res.data)
                      this.order_id = res.data.data.id
                  }
                }).catch(error => {
                    if (error.response) {
                        this.err = error.response.data.errors
                        console.log(this.err)
                    } else if (error.request) {
                       alert('Сервер оформление заказа не доступен. Повторите попыту позжу')
                    } else {
                        alert('Произошла непредвиденная ошибка')
                    }
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        }
    }


}
</script>

