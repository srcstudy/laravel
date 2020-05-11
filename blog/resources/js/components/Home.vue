<template>
    <div>
		<el-menu
		  :default-active="1"
		  class="el-menu-nav"
		  mode="horizontal"
		  @select="handleSelect"
		  background-color="#545c64"
		  text-color="#fff"
		  active-text-color="#ffd04b">
				<el-menu-item index="1"><a href="http://remote.elesos.com/remote/" target="_blank">远程工作机会</a></el-menu-item>
				<el-menu-item index="2"><a href="http://remote.elesos.com/remote/" target="_blank">远程视频面试</a></el-menu-item>
			    <el-menu-item index="3"><a href="http://remote.elesos.com/remote/" target="_blank">远程办公</a></el-menu-item>

		</el-menu>
		
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
            },
			handleSelect(key, keyPath) {
				console.log(key, keyPath);
			}


        }

    }

</script>
