<template>
    <div>
        <el-row>

        <el-button v-for="(value, name, index) in my_data" v-bind:value="name" @click="process_click(name),click_notice()" type="success" plain>{{name}}{{value}}</el-button>
        </el-row>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        props: ['my_data', 'article_id'],

        methods:{
            process_click:function (name) {
                console.log(name);
                //axios.get('http://36.110.202.64:8080/get_me/'+name+'/'+this.article_id).then(response => console.log(response.data));
                //页面重新加载
                //axios.get('http://10.90.106.159/get_me/'+name+'/'+this.article_id).then(() => window.location.reload());
                axios.get('http://123.103.93.74//get_me/'+name+'/'+this.article_id).then(() => window.location.reload());
            },
            click_notice:function () {
                //console.log('fffffffffffffffffffffff');
                this.$message({
                    message: '标注成功',
                    type: 'success',
                    duration:3000,
                    center:true

                });
            }


        }

    }

</script>
