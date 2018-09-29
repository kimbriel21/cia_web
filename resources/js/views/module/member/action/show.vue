<template>
    <div>
        <el-card shadow="always">
            Member ID {{$route.params.id}}

        </el-card>
        <el-card shadow="always" style="margin-top: 10px; height: 100vh;">
            <el-row>
                <el-col :span="12" :offset="6">
                    <el-form ref="form" :model="formData" label-width="120px">

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
                                <el-date-picker type="date"  v-model="formData.birthday"></el-date-picker>
                            </el-form-item>

                            <el-form-item label="Number" prop="number">
                                <el-input type="number" v-model="formData.number"></el-input>
                            </el-form-item>

                            <el-form-item label="Address" prop="address">
                                <el-input type="textarea" v-model="formData.address"></el-input>
                            </el-form-item>

                        </el-form>
                </el-col>
            </el-row>

        </el-card>

    </div>
</template>

<script>
    export default {
        name: "show-member-dialog",
        data: function(){
            return{
                formData : {},

            }
        },
        methods : {

        checkValue(){
            console.log(this.values);
        },
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
          }
        },
        created() {

        },
        mounted(){
            this.getMemberById();
        },
        destroyed(){

        }
    }
</script>

<style scoped>

</style>