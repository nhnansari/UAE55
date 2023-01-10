@extends('admin.layout')
@section('title','Add new format')
@section('content')
    <div class="app-main__inner" id ="app">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Add format

                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                         Add
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <button class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">View All</button>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="card col-sm-12" v-if="adding">
                        <div class="card-body">
                            <h3>Add new Plate</h3>
                            <div class="form-row">
                                <form style="width:100%">
                                    <div class="col-sm-12">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Plate Title"  v-model="plate.title">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="supports_letter">Print Letter</label>
                                            <select class="form-control" v-model="plate.print_letter">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="supports_letter">Print Contact Number</label>
                                            <select class="form-control"  v-model="plate.print_contact">
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="supports_letter">Image</label>
                                            <select class="form-control"  v-model="plate.image"   @change="renderPreview()">
                                                <option v-for="image in images" :value="image">@{{image}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="supports_letter">Font</label>
                                            <select class="form-control"  v-model="plate.font"   @change="renderPreview()">
                                                <option v-for="image in fonts" :value="image">@{{image}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="title">Plate Font size</label>
                                            <input type="range"  @change="renderPreview()" class="form-control" min="1" max="300" id="font_size" placeholder=""  v-model="plate.font_size">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="supports_letter">Stamp Preview</label>
                                            <select class="form-control" v-model="plate.stamp">
                                                <option value="">None</option>
                                                <option value="english">English</option>
                                                <option value="arabic">Arabic</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-4 card " v-if="plate.image">
                                            <h5>License Number</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Margin left</label>
                                                    <input type="range"  @change="renderPreview()" class="form-control" :max="image_width" id="margin_left" placeholder=""  v-model="plate.license_x" ref="margin_left">
                                                    <input type="number"  @change="renderPreview()" class="form-control" :max="image_width" id="margin_left" placeholder=""  v-model="plate.license_x" ref="margin_left">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="supports_letter">Margin Top</label>
                                                    <input type="range"  @change="renderPreview()" min="1" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.license_y" ref="margin_top">
                                                    <input type="number"  @change="renderPreview()" min="1" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.license_y" ref="margin_top">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title"> Font size</label>
                                                    <input type="number" @change="renderPreview()"   class="form-control" id="margin_left" placeholder=""  v-model="plate.font_size">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 card"  v-if="plate.print_letter==='yes'">
                                            <h5>Letter</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Margin left</label>
                                                    <input @change="renderPreview()" type="range" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.letter_x"  ref="margin_left_letter">
                                                    <input @change="renderPreview()" type="number" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.letter_x"  ref="margin_left_letter">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="supports_letter">Margin Top</label>
                                                    <input @change="renderPreview()" type="range" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.letter_y"  ref="margin_top_letter">
                                                    <input type="number" v-model="plate.letter_y">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title"> Font size</label>
                                                    <input type="number" @change="renderPreview()"   class="form-control" id="margin_left" placeholder=""  v-model="plate.letter_font_size">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 card" v-if="plate.print_contact==='yes'">
                                            <h5>Contact Number</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Margin left</label>
                                                    <input type="range" min="1"  @change="renderPreview()" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.contact_x">
                                                    <input type="number" min="1"  @change="renderPreview()" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.contact_x">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="supports_letter">Margin Top</label>
                                                    <input type="range" min="1"  @change="renderPreview()" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.contact_y">
                                                    <input type="number" min="1"  @change="renderPreview()" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.contact_y">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Contact Font size</label>
                                                    <input type="number"  @change="renderPreview()" class="form-control" id="margin_left" placeholder=""  v-model="plate.contact_font_size">

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="supports_letter">Contact Font</label>
                                                    <select class="form-control"  v-model="plate.contact_font_file"   @change="renderPreview()">
                                                        <option v-for="font in fonts" :value="font">@{{font}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 card" v-if="plate.stamp==='arabic' || plate.stamp==='english'">
                                            <h5>Stamp</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Margin left</label>
                                                    <input type="range" min="1"  @change="renderPreview()" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.stamp_x">
                                                    <input type="number" min="1"  @change="renderPreview()" :max="image_width" class="form-control" id="margin_left" placeholder=""  v-model="plate.stamp_x">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="supports_letter">Margin Top</label>
                                                    <input type="range" min="1"  @change="renderPreview()" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.stamp_y">
                                                    <input type="number" min="1"  @change="renderPreview()" :max="image_height" class="form-control" id="margin_top" placeholder=""  v-model="plate.stamp_y">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row imageholder mt-5 border" v-html="response">

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
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg"  @click.prevent="addPlate" v-if="plate.image && plate.font">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                        <span class="mr-1">Create</span>
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
                    adding:true,
                     plates:[],
                    images:[],
                    fonts:[],
                    image_height:0,
                     required_fields:["font"],
                    missing_fields:[],
                    contact_number:'{{ $contact_number }}',
                    image_width:0,
                     plate:{image:'',font:'',title:'',font_size:120,print_letter:'no',print_contact:'no',letter_x:0,letter_y:0,contact_x:0,contact_y:0,license_x:0,license_y:0,contact_font:'',contact_font_size:50,letter_font_size:120,contact_font_file:'',stamp_x:0,stamp_y:0}
                }
            },
            mounted(){
                this.getPlates()
                this.getImages()
                this.getFonts()
            },
            watch:{
                'plate.image'(){
                    this.getImageDimensions()
                }
            },
            methods:{

                renderPreview(){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/render"

                    axios.post( url, this.plate,{
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
                            this.response = error.data
                        })
                },
                saveContact(){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/save_contact"

                    axios.post( url, {contact:this.contact_number},{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            alert( response.data)
                        })
                        .catch(error => {
                            this.loading=false;
                            alert( error.data)
                        })
                },
                addPlate(){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/save_plate"

                    axios.post( url, this.plate,{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            if(response.data.success){
                                this.adding=false
                            }
                            alert(response.data.message)

                        })
                        .catch(error => {
                            this.loading=false;
                            this.response = error.data
                        })
                },
                deletePlate(id){
                    this.loading=true;
                    this.message = null
                    let url ="/admin/delete_plate"

                    axios.post( url, {id:id},{
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                        .then(response => {
                            this.loading=false;
                            this.getPlates()
                        })
                        .catch(error => {
                            this.loading=false;
                            this.response = error.data
                        })
                },
                async getPlates(){
                    this.loading=true;
                    var formData = new FormData();
                    var tarrifFile = document.querySelector('#charges_sheet');

                    let url ="/admin/list_plates"

                    await  axios.get( url, formData )
                        .then(response => {
                            this.plates = response.data
                            this.loading=false;

                        })
                        .catch(error => {
                            this.loading=false;
                            this.message = error.data
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
                async getFonts(){
                    this.loading=true;
                    var formData = new FormData();

                    let url ="/admin/fonts"

                    await  axios.get( url, formData )
                        .then(response => {
                            this.fonts = response.data
                            this.loading=false;

                        })
                        .catch(error => {
                            this.loading=false;
                            this.message = error.data
                        })
                },
                async getImageDimensions(){
                    this.loading=true;
                    var formData = new FormData();

                    let url ="/admin/image_dimensions"
                    formData.append("image",this.plate.image)
                    await  axios.post( url, formData )
                        .then(response => {
                            let dimensions = response.data
                            this.image_width = dimensions.width
                            this.image_height = dimensions.height
                            this.$refs.margin_left.max = dimensions.width
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
@endsection
