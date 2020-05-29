<template>
  <nav class="navbar navbar-container navbar-expand-lg navbar-dark" id="mainNav">
    <div class="container my-2">
      <a class="navbar-brand" href="/">
        <img src="../assets/logo.png" />
      </a>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase m-auto">
          <li class="nav-item">
            <router-link class="nav-link text-dark font-weight-bolder" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-bolder" href="/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-bolder" href="/">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-bolder" href="/">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-bolder" href="/">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark font-weight-bolder" href="/">Contact</a>
          </li>
        </ul>
      </div>
    
      <div class="icons d-flex">
          
        <a class="icon1">
          <i class="fas fa-search" @click="searchInput()"></i>
        </a>
        <router-link to="/cart" class="icon2 mx-3">
          <i class="fas fa-shopping-cart"></i>
          <span class="rounded-circle">{{countItem}}</span>
        </router-link>
        <router-link to="/liked" class="icon2">
          <i class="far fa-heart"></i>
          <span class="rounded-circle">{{countHeart}}</span>
        </router-link>
      </div>
        <button
        class="navbar-toggler navbar-togler-right bgcolor"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Tooglenavigation"
      >
        
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      search: false,
      searchData: ""
    };
  },
  computed: {
    ...mapGetters(["countItem", "countHeart"])
  },
  methods: {
    searchInput() {
      this.search ? (this.search = false) : (this.search = true);
    },
    find() {
      this.findItem(this.searchData);
    },
    ...mapActions(["findItem", "getSearch"])
  }
};
</script>

<style scoped>
.icons a {
  color: inherit;
}

.icon2 {
  position: relative;
  text-align: center;
}

.icon2 span {
  position: absolute;
  bottom: 15px;
  background-color: #ff5353;
  width: 16px;
  height: 16px;
  line-height: 16px;
  font-size: 10px;
  color: #fff;
}
</style>