<template>
  <div class="home">
    <RegisterUser></RegisterUser>
  </div>
</template>

<script>
import RegisterUser from "../components/User/RegisterUser.vue";
// @ is an alias to /src

export default {
  name: "HomeView",
  components: {
    RegisterUser,
  },
};
</script>
