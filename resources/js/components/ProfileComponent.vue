<style>
.widget-user-header{
    background-position: center center ;
    background-size: cover;
    height: 250px;
}
</style>


<template>
    <div>

        <div class="col-md-9">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                     style="background-image:url('./img/user-cover.jpg') ">
                    <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc text-right">Web Designer</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="activity">

                            <div class="post clearfix">

                            </div>

                            <div class="post">

                                <div class="row mb-3">

                                </div>


                                <p>

                                    <span class="float-right">

                        </span>
                                </p>


                            </div>
                            <!-- /.post -->
                        </div>


                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email"  v-model="form.name" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email"  v-model="form.email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="photo">File input</label>
                                    <input type="file" @change="updateProfile" name="photo" id="photo" class="form-input">

                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label for="photo" class="col-sm-2-->
<!--                                     control-label">profile Photo</label>-->
<!--                                    <div class="col-sm-12">-->
<!--                                        <input type="file" name="photo" class="form-input">-->
<!--                                    </div>-->
<!--                                </div>-->


                                <div class="form-group">
                                    <label for="passport" class="col-sm-2
                                     control-label">Passport (leave empty if not changing)
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"
                                        id="passport" placeholder="passport">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12" >
                                        <button @click.prevent="updateInfo" type="submit"
                                                class="btn btn-success">Update</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
</template>

<script>
export default {
    data(){
      return{
          form: new Form({
              id:'',
              name: '',
              email: '',
              password: '',
              type: '',
              bio: '',
              photo: ''

          })
      }
    },

    mounted(){
        console.log('Component mounted.')
    },

    methods:{
        updateInfo(){
            this.form.put('api/profile/')
            .then(()=>{

            })
            .catch(()=>{

            });
        },
        updateProfile(e){
        let file = e.target.files[0];
        let reader = new FileReader();
        reader.onloadend = (file) => {
            // console.log('RESULT', reader.result)
            this.form.photo = reader.result;
        }
        reader.readAsDataURL(file);
        }
    },
    created(){

        axios.get("api/profile")
            .then(({ data }) => (this.form.fill(data)));
    }
}
</script>
