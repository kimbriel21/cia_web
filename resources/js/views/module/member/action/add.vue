<template>
    <div>
        <el-button type="primary" @click="dialogVisible = true" icon="el-icon-circle-plus-outline">Create New Member</el-button>
        <el-dialog
                title="Create New Member"
                :visible.sync="dialogVisible"
                width="30%"
                :before-close="handleClose"
                @close="closeDialog"
                >
            <div class="alert alert-danger errors" role="alert" v-if="Object.keys(errorFeedback).length">
                <ul>
                    <li v-for="error in errorFeedback">{{error[0]}}</li>
                </ul>

            </div>
            <el-form ref="form"
                     :model="formData"
                     :rules="rules"
                     label-width="120px" >

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


            </el-form>
            <span slot="footer" class="dialog-footer">
                    <el-button @click="dialogVisible = false">Cancel</el-button>
                    <el-button type="primary" @click="onSubmit">Create</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script>
    export default {
        name: "add-member-dialog",
        props : {

        },
        data : function() {
            return {
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
                dialogVisible: false,
                errorFeedback : {},

            }
        },

        methods: {
            handleClose(done) {
                this.$confirm('Are you sure to close this dialog?')
                    .then(_ => {
                        done();
                    })
                    .catch(_ => {});
            },
            swalNotification : function(title, text, icon, button_text) {
                swal({
                    title: title,
                    text: text,
                    icon: icon,
                    button: button_text,
                });
            },
            resetAndClosedDialog : function()  {
                this.dialogVisible = false;
                this.formData.first_name = '';
                this.formData.middle_name = '';
                this.formData.last_name = '';
                this.formData.birthday = '';
                this.formData.number = '';
                this.formData.address = '';
            },
            onSubmit(){
                axios
                    .post('/member', {
                        "first_name" : this.formData.first_name,
                        "middle_name" : this.formData.middle_name,
                        "last_name" : this.formData.last_name,
                        "birthday" : this.formData.birthday,
                        "number" : this.formData.number,
                        "address" : this.formData.address,
                    })
                    .then((response) => {
                        this.swalNotification('New Member Created', '', 'success', 'OK');
                        this.resetAndClosedDialog();
                        EventBus.$emit('reloadTableData');
                    })
                    .catch((error) => {
                        this.errorFeedback = error.response.data;
                        console.log(error.response.data);
                    });
            },
            closeDialog(){
                this.resetAndClosedDialog();
            },

        },
        created(){

        },
        mounted(){

        },
        destroyed(){

        },
    }
</script>

<style scoped>

</style>