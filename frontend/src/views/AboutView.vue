<template>
  <div class="about">
    <h1>This is an about page</h1>
    
      <ShowNav v-if="showNav" name="A"></ShowNav>
      <ShowNav name="B"></ShowNav>
      <ShowNav name="C"></ShowNav>
      <ShowNav name="D"></ShowNav>
      <ShowNav name="E"></ShowNav>
      <ShowNav name="F"></ShowNav>
      <ShowNav name="G"></ShowNav>
    
    <p>{{ role }}</p>
  </div>
</template>

<script>
import ShowNav from './ShowNav.vue'
 //import axios from 'axios';
 export default{
  name : 'AboutView',
  components : {
    ShowNav
  },
    data() {
      return{
        role : window.localStorage.getItem('role'),
        visible : false
    }
  },
  methods :{
    showNav(){
      if(this.role === "super"){
        return true;
      }
    }
  }
 }
 </script>
 