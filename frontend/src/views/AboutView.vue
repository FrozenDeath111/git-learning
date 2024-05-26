<template>
  <div class="about">
    <h1>This is an about page</h1>
    
      <ShowNav v-if="role === 'super admin'" name="A"></ShowNav>
      <ShowNav v-if="role === 'super admin'" name="B"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin'" name="C"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin'" name="D"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin' || role === 'admin'" name="E"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin' || role === 'admin'" name="F"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin' || role === 'admin' || role === 'user'" name="G"></ShowNav>
      <ShowNav v-if="role === 'super admin' || role === 'sub admin' || role === 'admin' || role === 'user'" name="H"></ShowNav>
    
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
 }
 </script>
 