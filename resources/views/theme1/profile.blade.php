@extends('theme1.template')
@section('title','Profile')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" id="app">
            <div class="section-title">
                <h2>Profile</h2>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12 card p-3">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Mobile</label>
                            <input type="text" class="form-control" id="mobile" placeholder="mobile"  v-model="form.mobile">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Email (cannot be changed)</label>
                            <input type="text" class="form-control" id="email" placeholder="email" value="{{$profile->email}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Address</label>
                            <textarea class="form-control" rows="7" v-model="form.address"> </textarea>
                        </div>
                    </div>
                    <div class="row" v-if="response">
                        @{{response}}
                    </div>
                    <div class="row mt-3 text-center">
                        <div class="form-group col-md-12">
                          <button class="btn btn-primary" @click="updateProfile">Update Information</button>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Team Section -->

@endsection
@section('script')
<script>
    const { createApp } = Vue

    createApp({
        data() {
            return {
                message: '',
                loading:false,
                response:'',
                form:{name:'{{$profile->name}}',mobile:'{{$profile->mobile}}',address:'{{$profile->address}}' }
            }
        },
        methods:{
            updateProfile(){
                this.loading=true;
                this.message = null
                let url ="/profile/update"

                axios.post( url, this.form,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        this.loading=false;
                        this.response = response.data
                    })
                    .catch(error => {
                        this.loading=false;
                        this.response = error.data.message
                    })
            },
        }
    }).mount('#app')
</script>
@endsection
