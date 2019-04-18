<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form @submit.prevent="createProduct">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model="product.name" type="text" class="form-control" id="name"  placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input v-model="product.year" type="number"  class="form-control" id="year" placeholder="Year">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input v-model="product.price" type="number" class="form-control" id="price" placeholder="Price">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){

            return {

                product:{}
            }
        },

        mounted() {
            console.log('Product Example Component mounted.')
        },
        methods:{

            createProduct(){

                let uri ='http://127.0.0.1:8000/products';
                axios.post(uri,this.product).then((response)=>{

                    window.location.reload();

                });
                // console.log(this.product);
            }

        }
    }
</script>
