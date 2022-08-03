<template>
    <div class="grid grid-cols-1 text-center">
        <h2>Question Number 1?</h2>
        <li v-for="questions in question">
            {{question}}
        </li>

    </div>    
    <div class="flex justify-between">
        <div>
            Yes
            <br>
            <span class="text-gray-700 text-sm">20</span> 
        </div> 
        <div>
            No
            <br>
            <span class="text-gray-700 text-sm">20</span> 
        </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        mounted() {
            console.log('Component mounted. ready')

            
        },
        data(){
            return {
                questions:[]
            }
        },
        created(){
            axios.get('questions').then(response=>(this.questions = response.data))
            console.log("created")
        }
    }
</script>
