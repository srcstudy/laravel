<template>
    <div>
        <el-steps finish-status="success" simple style="margin-top: 20px">
		 
		  
		    <el-step v-for="(value, name, index) in modules" v-bind:title="name">
			
		</el-step>
		
		
		</el-steps>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        props: ['modules'],

        methods:{
            process_click:function (name) {
                console.log(name);               
            }


        }

    }

</script>
