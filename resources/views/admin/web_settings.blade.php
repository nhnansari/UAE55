@extends('admin.layout')
@section('title','Web Settings')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Web Settings

                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                     </div>
                    <div class="btn-actions-pane-right text-capitalize">
                     </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12">
                        <div class="card-body">
                            <h3>Web Settings</h3>
                            <div class="form-row">
                                <form style="width:100%">
                                    <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="title">Website Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Website Title"  v-model="form.title">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Website URL</label>
                                            <input type="text" class="form-control" id="url" placeholder="https://"  v-model="form.web_url">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Admin Contact</label>
                                            <input type="text" class="form-control" id="title" placeholder="Admin Contact"  v-model="form.contact">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Admin Email</label>
                                            <input type="text" class="form-control" id="title" placeholder="Admin email"  v-model="form.admin_email">
                                        </div>
                                    </div>
                                        <div class="form-row">
                                            <label for="banner_ad">Website Description (for SEO)</label>
                                            <textarea class="form-control" name="web_description" v-model="form.description"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <label for="banner_ad">Banner Ad Code</label>
                                            <textarea class="form-control" name="banner_ad"  v-model="form.banner_ad"></textarea>
                                        </div>

                                    </div>
                                    <div class="form-row " v-if="message">
                                        <div class="alert alert-danger" role="alert">
                                           @{{ message}}
                                        </div>
                                    </div>
                                    <br>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg"  @click.prevent="saveSettings()">
                        <span class="mr-2 opacity-7">
                            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                        </span>
                        <span class="mr-1">Save</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <script>
        const { createApp } = Vue

        createApp({
            data() {
                return {
                    message: '',
                    response:'',
                    loading:false,
                    form:{contact:'{{$contact}}',title:'{{$title}}',description:'{{$description}}',banner_ad:'{!! $banner_ad !!}',admin_email:'{{$admin_email}}',web_url:'{{$web_url}}'}
                 }
            },
            methods:{
                saveSettings(){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/settings/save"

                    axios.post( url, this.form,{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            alert( response.data.message)
                        })
                        .catch(error => {
                            this.loading=false;
                            alert( error.data)
                        })
                },
            }
        }).mount('#app')
    </script>
@endsection
