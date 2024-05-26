<template>
  <div>
    <form @submit.prevent="submitForm">
      <div>
        <label for="username">Username</label>
        <input type="text" id="username" v-model="formValues.username" />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" v-model="formValues.password" />
      </div>
      <div>
        <button type="submit">Sign In</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "SignIn",
  data() {
    return {
      formValues: {
        username: "",
        password: "",
      },
    };
  },

  methods: {
    submitForm() {
      axios
        .post("http://127.0.0.1:8000/login", this.formValues)
        .then((response) => {
          console.log(response.data);
          if (response.status === 200) {
            localStorage.setItem("role", response.data.role);
            localStorage.setItem("username", this.formValues.username);
            this.$router.push("/about");
          } else {
            alert("Error!");
          }
        })
        .catch((error) => console.log(error));
      },
  },
};
</script>
