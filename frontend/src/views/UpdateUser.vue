<template>
    <div>
        <div class="modal-overlay" v-if="visible" @click="close">
            <div class="modal-container" @click.stop>
                <button class="modal-close" @click="close">X</button>
                <div class="modal-content">
                    <form @submit.prevent="submitForm(id)">
                        <div>
                            <label for="name">Username</label>
                            <input type="text" id="name" v-model="formValues.username">
                        </div>
                        <div>
                            <label for="role">Category</label>
                            <select name="role" v-model="formValues.role" >
                                <option v-for="(data,index) in user" :key="index" :value="data.id">
                                    {{ data.name}}
                                </option>
                            </select>
                        </div>
                        <div>
                            <button type="submit">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </template>

 <script>
 import axios from 'axios';
 export default{
     name : 'UpdateUser',
     props: {
        visible: {
            type: Boolean,
            required: true,
        },
    },
    data() {
        return{
            formValues: {
                username:'',
                role :'',
            },
            user :[],

        }
    },
    methods: {
        getData(){
            //this.formValues.user_id = window.localStorage.getItem('id'); 
            axios.get('http://127.0.0.1:8000/get-user')
            .then((response) => this.user=response.data)
            .catch((error) => console.log(error));
        },

        close() {
            this.$emit('close');
        },

        async submitForm(id){
            console.log(this.formValues + ' '+id);
        },
    },
    
 }
 </script>