<template>
  <div>
    <Header></Header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center pt-5 mt-5">
            <h5 class="text-muted">ULTIMATE COLLECTION</h5>
            <h1 class="font-weight-bold">Complete Women</h1>
            <h1 class="font-weight-bold">Fashion Here</h1>
            <button class="btn shop py-3 px-5 m-auto">Shop Now</button>
          </div>
          <div class="col-md-6">
            <img src="../assets/ban-1.png" class="img-fluid" alt />
          </div>
        </div>
      </div>
    </section>
    <section id="featured"  >
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center my-4">
            <h1>FEATURED PRODUCT</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4" v-for="(featured) in featured" :key="featured.id">
            <div class="image">
              <img :src="featured.img" class="img-fluid" :alt="featured.title" />
              <div class="icons d-flex">
                  <router-link :to="{name:'Detail',params:{slug:featured.slug}}">
                <div class="icon1 icon rounded-circle">
                
                    <i class="far fa-eye"></i>
               
                </div>
                   </router-link>
                <div class="icon2 icon mx-3 rounded-circle" @click="addCart(featured.id)">
                  <i class="fas fa-shopping-cart" ></i>
                </div>
                <div class="icon2 icon rounded-circle" @click="addHeart(featured.id)">
                
                  <i class="far fa-heart"></i>

                </div>
              </div>
            </div>
            <router-link :to="{name:'Detail',params:{slug:featured.slug}}">
            <h5 class="text-center my-2 text-muted">{{featured.title}}</h5>
            </router-link>
            <div class="starts text-center">
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <h6 class="text-center font-weight-bolder my-2">${{featured.price}}</h6>
          </div>
       
        </div>
      </div>
    </section>



    <section id="off" class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center pt-5">
            <h2 class="my-3 font-weight-bolder">50% OFF</h2>
            <h3 class="my-4">ALL WOMEN’S COLLECTION</h3>
            <button class="btn shop mt-3 py-2 px-4">Shop Now</button>
          </div>
          <div class="col-md-6">
            <img src="../assets/ban-2.png" class="img-fluid" alt />
          </div>
        </div>
      </div>
    </section>

    <section id="featured">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center my-4">
            <h1>MOST POPULAR</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3" v-for="(post) in posts.data" :key="post.id">
            <div class="image text-center">
              <img :src="post.img" class="img-fluid" :alt="post.title" />
              <div class="icons d-flex">
                 <router-link :to="{name:'Detail',params:{slug:post.slug}}">
                <div class="icon1 icon rounded-circle">
                
                    <i class="far fa-eye"></i>
               
                </div>
                   </router-link>
                <div class="icon2 icon mx-3 rounded-circle"  @click="addCart(post.id)">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="icon2 icon rounded-circle" @click="addHeart(post.id)">
                  <i class="far fa-heart"></i>
                </div>
              </div>
            </div>
              <router-link :to="{name:'Detail',params:{slug:post.slug}}">
            <h5 class="text-center my-2 text-muted">{{post.title}}</h5>
            </router-link>
            <div class="starts text-center">
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>

            <h6 class="text-center font-weight-bolder my-2">${{post.price}}</h6>
          </div>
    
        

        </div>

        <div class="row ">
          <div class="offset-4 mt-5 col-md-6 ">


<pagination :data="posts" @pagination-change-page="paginate"></pagination>

          </div>
        </div>
      </div>
    </section>
    <section id="services " class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 text-center">
            <div class="border">
              <i class="fas fa-dollar-sign color fa-2x my-3"></i>
              <h5>MONEY BACK GURANTEE</h5>
              <h6>Lorem ipsum dolor sit amet</h6>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <div class="border">
                <i class="fas fa-truck  color fa-2x my-3"></i>
              <h5>FREE DELIVERY</h5>
              <h6>Lorem ipsum dolor sit amet </h6>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <div class="border">
            <i class="fas fa-phone-alt  color fa-2x my-3"></i>
              <h5>ALWAYS SUPPORT</h5>
              <h6>Lorem ipsum dolor sit amet </h6>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <div class="border">
         <i class="fas fa-shield-alt  color fa-2x my-3"></i>
              <h5>SECURE PAYMENT</h5>
              <h6>Lorem ipsum dolor sit amet </h6>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Header from "./Header";
import {mapState,mapActions,mapGetters} from 'vuex'
export default {

  components: {
    Header
  },


  mounted() {
    this.getFeatured();
    this.paginate();
      
    
    
  },
  computed: {
    ...mapState(['featured','posts']),
    

  },
  methods: {
    addCart(id){
      
      this.addToCart(id)
    },
    addHeart(id){
      this.addToHeart(id)
    },
    handleScroll() {
       let getHeight = window.scrollY
       let nav = document.getElementById('mainNav')
       if (getHeight > 150) {
         nav.classList.add('fixed-top')
         nav.classList.add('bg-secondary')
       }
       else {
         nav.classList.remove('fixed-top')
         nav.classList.remove('bg-secondary')
       }
       
   },
    ...mapActions(['getFeatured','paginate','addToCart','addToHeart']),
    	
  },
  created() {
      window.addEventListener('scroll', this.handleScroll);
},
};
</script>

<style>
#main {
  background-image: url("../assets/bg-1.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  width: 100%;
}

#main h1 {
  font-size: 50px;
}
.shop {
  background-color: #ff5353;
  color: #fff;
  font-size: 15px;
  text-transform: uppercase;
}

#featured .image {
  position: relative;
}

#featured .image:hover .icons .icon {
  visibility: visible;
  opacity: 1;
}

#featured .image .icons {
  position: absolute;
  bottom: 10%;
  left: 23%;
}

#featured .image .icons .icon {
  height: 45px;
  width: 45px;
  background-color: #fff;
  text-align: center;
  line-height: 45px;
  transition: ease-in-out 0.6s;
  opacity: 0;
  visibility: hidden;
}

#featured .image .icons .icon:hover {
  background-color: #ff5353;
  cursor: pointer;
}
#off {
  background-color: #eae2d8;
}
#off h2 {
  font-size: 45px;
}

.color {
  color: #ff5353;
}

.bgcolor {
  background-color: #ff5353;
}
</style>