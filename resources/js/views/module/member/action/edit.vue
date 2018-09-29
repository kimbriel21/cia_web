<template>
    <div>
        <el-card shadow="always">
            Member ID {{$route.params.id}}
        </el-card>
        <el-card shadow="always" style="margin-top: 10px; height: 100vh;">
            <el-row>
                <el-col :span="12" :offset="6">
                    <div class="alert alert-danger errors" role="alert" v-if="Object.keys(errorFeedback).length">
                        <ul>
                            <li v-for="error in errorFeedback">{{error[0]}}</li>
                        </ul>
                    </div>
                </el-col>
            </el-row>
            <el-row>

                <el-col :span="12" :offset="6">
                    <el-form ref="form" :model="formData" :rules="rules" label-width="120px">

                        <el-form-item label="First Name" prop="first_name">
                            <el-input v-model="formData.first_name"></el-input>
                        </el-form-item>

                        <el-form-item label="Middle Name" prop="middle_name">
                            <el-input v-model="formData.middle_name"></el-input>
                        </el-form-item>

                        <el-form-item label="Last Name" prop="last_name">
                            <el-input v-model="formData.last_name"></el-input>
                        </el-form-item>

                        <el-form-item label="Birth Day" prop="birthday">
                            <el-date-picker type="date"  v-model="formData.birthday" value-format="yyyy-MM-dd"></el-date-picker>
                        </el-form-item>

                        <el-form-item label="Number" prop="number">
                            <el-input type="number" v-model="formData.number"></el-input>
                        </el-form-item>

                        <el-form-item label="Address" prop="address">
                            <el-input type="textarea" v-model="formData.address"></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit">Edit</el-button>
                            <el-button @click="back">Back</el-button>
                        </el-form-item>
                    </el-form>
                </el-col>
            </el-row>

        </el-card>
    </div>
</template>

<script>
    export default {
        name: "edit-member",
        data: function(){
            return{
                formData : {
                    first_name : '',
                    middle_name : '',
                    last_name : '',
                    birthday : '',
                    number : '',
                    address : '',
                },
                rules: {
                    first_name: [
                        {required: true, message: 'Please input first name', trigger: 'blur'},
                        {min: 3, message: 'Length should be 3 and up', trigger: 'blur'}
                    ],
                    middle_name: [
                        {required: true, message: 'Please input middle name', trigger: 'blur'},
                        {min: 3, message: 'Length should be 3 and up', trigger: 'blur'}
                    ],
                    last_name: [
                        {required: true, message: 'Please input last name', trigger: 'blur'},
                        {min: 3, message: 'Length should be 3 and up', trigger: 'blur'}
                    ],
                    birthday: [
                        {required: true, message: 'Please select birthday', trigger: 'blur'},
                    ],
                    number: [
                        {required: true, message: 'Please input number', trigger: 'blur'},
                        {min: 11, max: 11, message: 'Length should be 11', trigger: 'blur'}
                    ],
                    address: [
                        {required: true, message: 'Please input address', trigger: 'blur'},
                    ],
                },
                errorFeedback : {},
            }
        },
        methods : {
            getMemberById(){
                axios
                    .get('/member/'+this.$route.params.id)
                    .then(response =>
                    {
                        this.formData =  response.data.data;


                    })
                    .catch(error => {
                        console.log(error.response)
                    })
                    .finally();
            },
            onSubmit(){

                axios.patch(`member/${this.$route.params.id}`,{
                        "first_name" : this.formData.first_name,
                        "middle_name" : this.formData.middle_name,
                        "last_name" : this.formData.last_name,
                        "birthday" : this.formData.birthday,
                        "number" : this.formData.number,
                        "address" : this.formData.address,
                    })
                    .then(response =>
                    {
                        router.push({ path: `/member` });
                    })
                    .catch(error => {
                        this.errorFeedback = error.response.data;
                    });

            },
            back(){
                router.push({ path: `/member` });
            }

        },
        created(){

        },
        mounted(){
            this.getMemberById();
        },
        destroyed(){

        },
    }
</script>

<style scoped>

</style>