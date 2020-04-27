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
                //提交，并重新加载页面
                axios.get('http://laravel.elesos.com/update_post/'+name+'/'+this.article_id).then(() => window.location.reload());
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
