<template>
    <div>
        <el-row>

            <el-badge v-for="(value, name, index) in user_data" v-bind:value="value"  class="item">
                <el-button size="small">{{name}}</el-button>
            </el-badge>


        </el-row>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        props: ['user_data'],



    }

</script>

<style>
    .item {
        margin-top: 10px;
        margin-right: 40px;
    }
</style>



