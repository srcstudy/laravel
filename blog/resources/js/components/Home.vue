<template>
    <div>
        <el-steps :active="1" finish-status="success" simple style="margin-top: 20px">
		  <el-step title="步骤 1" ></el-step>
		  <el-step title="步骤 2" ></el-step>
		  <el-step title="步骤 3" ></el-step>
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
