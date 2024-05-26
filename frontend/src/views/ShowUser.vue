<template>
    <div>
        <div>
            <table>
                <tr>
                    <th >Id</th>
                    <th >Username</th>
                    <th >Role Total</th>
                    <th >Update</th>
                </tr>
                <tr v-for="(data,index) in user" :key="index" class="table-rows">
                    <td>{{ data.id	 }}</td>
                    <td>{{ data.name }}</td>
                    <td>{{ data.role }}</td>
                    <td><button @click="openModal(data.id)">Update</button></td>
                </tr>
            </table>
            <UpdateUser :visible="showModal" :id="username" @close="showModal = false"></UpdateUser>
        </div>
    </div>
 </template>

 <script>
 import UpdateUser from './UpdateUser.vue';
 import axios from 'axios';

 export default{
    name : 'ShowUser',
    components :{
        UpdateUser,
    },
    created(){
        this.getUser();
    },
    data() {
        return{
            user :[],
            username : ''
        }
    },
    methods :{
        async getUser(){

            try{
          
            const name = window.localStorage.getItem('username');
            let response = await axios.get('http://127.0.0.1:8000/get-user');

            if(response.status === 200){
                this.username = name;
                this.user =response.data;
            }else {
                alert("Error!");
            }
        }catch (error) {
            console.error('Error fetching budgets:', error);
        }

        }
    }
    
 }
 </script>