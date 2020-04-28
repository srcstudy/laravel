<template>
    <div>
        <el-steps finish-status="success" simple style="margin-top: 20px">
		 
		    <el-row>
			<el-button v-for="(value, name, index) in modules" v-bind:value="name" @click="process_click(name)" type="success" plain>
				{{name}}{{value}}
			</el-button>
			</el-row>
		
		
		    <el-step v-for="(value, name, index) in modules" v-bind:title="test">
			
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
