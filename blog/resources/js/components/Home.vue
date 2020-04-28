<template>
    <div>
		<el-row>		
			<el-button v-for="(value, name, index) in modules" v-bind:value="value" @click="process_click(value)" type="success" plain>
				{{value}}
			</el-button>		
		</el-row>
		
        <el-steps :active="1" finish-status="success" simple style="margin-top: 20px">
		    <el-step v-for="(value, name, index) in modules" v-bind:value="value" v-bind:title="value">
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
            process_click:function (value) {
                console.log(value);               
            }


        }

    }

</script>
