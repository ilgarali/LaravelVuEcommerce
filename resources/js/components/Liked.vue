<template>
<div>
<Header></Header>

<div class="container">
<div class="card shopping-cart">
    <div class="card-header bg-dark text-light">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Shopping cart
        <router-link to="/" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</router-link>
        <div class="clearfix"></div>
    </div>
    <div class="card-body" v-for="(item) in liked" :key="item.id">
            <!-- PRODUCT -->
            <div class="row" >
                <div class="col-12 col-sm-12 col-md-2 text-center">
                <img class="img-responsive" :src="item.img" alt="prewiew" width="120" height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name"><strong>{{item.title}}</strong></h4>
                    <h4>
                        <small>{{item.content.slice(0,50)}}</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong>$ <span class="text-muted">{{item.price}}</span></strong></h6>
                    </div>
                   
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                         <button type="button" @click="addToCart(item.id)" class="btn  btn-outline-success btn-xs">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" @click="unlikeItem(item.id)" class="btn my-2 btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <!-- END PRODUCT -->
            
        
    </div>
 
</div>
</div>
</div>
</template>

<script>
import Header from './Header';
import {mapState,mapActions,mapGetters} from 'vuex';
export default {
components:{
Header
}

,
mounted() {
    
},

computed: {
    ...mapState(['liked']),
    
    
},
methods: {
    
    unlikeItem(id){
        this.getUnlikeItem(id)
    },
    addToCart(id) {
        this.addCart(id)
    }
    ,
    ...mapActions(['getUnlikeItem','addCart'])
},

}
</script>

<style scoped>



.quantity {
float: left;
margin-right: 15px;
background-color: #eee;
position: relative;
width: 80px;
overflow: hidden
}

.quantity input {
margin: 0;
text-align: center;
width: 15px;
height: 15px;
padding: 0;
float: right;
color: #000;
font-size: 20px;
border: 0;
outline: 0;
background-color: #F6F6F6
}

.quantity input.qty {
position: relative;
border: 0;
width: 100%;
height: 40px;
padding: 10px 25px 10px 10px;
text-align: center;
font-weight: 400;
font-size: 15px;
border-radius: 0;
background-clip: padding-box
}

.quantity .minus, .quantity .plus {
line-height: 0;
background-clip: padding-box;
-webkit-border-radius: 0;
-moz-border-radius: 0;
border-radius: 0;
-webkit-background-size: 6px 30px;
-moz-background-size: 6px 30px;
color: #bbb;
font-size: 20px;
position: absolute;
height: 50%;
border: 0;
right: 0;
padding: 0;
width: 25px;
z-index: 3
}

.quantity .minus:hover, .quantity .plus:hover {
background-color: #dad8da
}

.quantity .minus {
bottom: 0
}
.shopping-cart {
margin-top: 20px;
}



</style>