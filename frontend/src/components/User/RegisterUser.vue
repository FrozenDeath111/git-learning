<template>
  <div>
    <form @submit.prevent="handleSubmit">
      <h3>Register Form</h3>
      <input type="text" v-model="formData.name" placeholder="Name" required />
      <input
        :type="passwordType"
        v-model="formData.password"
        placeholder="Password"
        required
      />
      <button
        v-if="passwordType == 'password'"
        type="button"
        @click="passwordType = 'text'"
      >
        (-)
      </button>
      <button
        v-if="passwordType == 'text'"
        type="button"
        @click="passwordType = 'password'"
      >
        (o)
      </button>
      <select v-model="formData.role">
        <option value="" selected disabled>Select Role</option>
        <option v-for="role in roles" :key="role" :value="role">
          {{ role }}
        </option>
      </select>
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "RegisterUser",
  data() {
    return {
      passwordType: "password",
      formData: {
        name: "",
        password: "",
        role: "",
      },
      roles: ["Super Admin", "Sub Admin", "Admin", "User"],
    };
  },
  methods: {
    handleSubmit() {
      axios
        .post("http://127.0.0.1:8000/register", {
          name: this.formData.name,
          password: this.formData.password,
          role: this.formData.role,
        })
        .then((res) => {
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped></style>
