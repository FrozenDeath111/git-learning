<template>
  <div class="login">
    <SignIn></SignIn>
  </div>
</template>

<script>
import SignIn from "../components/User/SignIn.vue";
export default {
  name: "LoginView",
  components: {
    SignIn,
  },
};
</script>

<style lang="scss" scoped></style>
