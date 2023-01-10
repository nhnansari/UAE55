@extends('admin.layout')
@section('title','Upload File')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Format Files

                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                         License Plate Files
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <button class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">View All</button>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12">
                        <div class="card-body">
                            <h3>License Plate Images</h3>
                            <div class="form-row">
                                <form style="width:100%">
                                    <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Plate Title"  v-model="plate.title">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="image">Image File <br><br>
                                                <i class="icon pe-7s-cloud-upload" style="font-size:38px; cursor: pointer"></i>
                                            </label>
                                            <input style="display: none" type="file" class="form-control" id="image" name="image" placeholder="Plate Title"  ref="file" @change="checkFile()">
                                        </div>
                                    </div>
                                        <div class="form-row " v-if="message">
                                            <h2> @{{ message}} </h2>
                                        </div>
                                        <div class="row mb-4">
                                            <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg"  @click.prevent="uploadFile()" v-if="plate.image">
                                                    <span class="mr-2 opacity-7">
                                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                                    </span>
                                                <span class="mr-1">Upload</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6 platebox" v-for="image in images">
                                                <h3>@{{ image }}</h3>
                                               <img :src="'/admin/images/preview/' + image" style="width:400px; height:150px">

                                                <br>
                                                <button @click.prevent="deleteFile(image)" class="btn btn-primary btn-icon btn btn-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                            </div>
                                        </div>
                                     <div class="form-row imageholder mt-5 border" v-html="response">

                                    </div>
                                    </div>

                                    <br>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg"  @click.prevent="uploadFile()" v-if="plate.image">
                            <span class="mr-2 opacity-7">
                                <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                            </span>
                        <span class="mr-1">Upload</span>
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
                     plate:{image:'',title:''},
                    images:[]
                }
            },
            mounted(){
                this.getImages()
            },
            watch:{
            },
            methods:{
                checkFile(){
                    this.plate.image = this.$refs.file.files[0];

                },
                uploadFile(){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/formats/upload"

                    axios.post( url, this.plate,{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            this.response = response.data
                            this.getImages()

                        })
                        .catch(error => {
                            this.loading=false;
                            this.response = error.data
                        })
                },
                deleteFile(file){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/images/delete/" + file

                    axios.post( url, this.plate,{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            this.getImages()
                            alert(response.data)
                        })
                        .catch(error => {
                            this.loading=false;
                            alert( error.data)
                        })
                },
                 async getImages(){
                    this.loading=true;
                    var formData = new FormData();

                    let url ="/admin/images"
                    await  axios.get( url, formData )
                        .then(response => {
                            this.images = response.data
                            this.loading=false;
                        })
                        .catch(error => {
                            this.loading=false;
                            this.message = error.data
                        })
                },

            }
        }).mount('#app')
    </script>
    <style>
        .platebox{
            border: solid 1px gray;
            padding: 5px;
            border-radius: 8px;
            text-align: center;
        }
    </style>
@endsection
