<div id="app">
    <div class="row  text-center">
        <div class="row" v-if="showform">

            <div class="col-lg-3  pt-3  col-xs-12">
                <div class="form-group">
                    <label for="amount">Emirates</label>
                    <select class="form-control" id="letter" v-model="form.emirates" ref="letter">
                        <option value="Abu Dhabi">Abu Dhabi</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Sharjah">Sharjah</option>
                        <option value="Ajman">Ajman</option>
                        <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                        <option value="Fujairah">Fujairah</option>
                        <option value="Umm Al Quawain">Umm Al Quawain</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class="form-group">
                    <label for="amount">Choose Format</label>
                    <select class="form-control" id="emirates"  v-model="form.format"  ref="emirate">
                        <option v-for="plate in plates" :value="plate.id"  >@{{plate.title}}</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 pt-3 col-xs-12" v-if="supports_letter">
                <div class="form-group">
                    <label for="amount">Letter</label>
                    <select class="form-control" id="letter" v-model="form.letter" ref="letter">
                        <option value="A">A</option>
                        <option value="AA">AA</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="Q">Q</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>

                    </select>
                </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class="row">
                    <div class=" form-group">
                        <label for="amount">Number</label>
                        <input type="number" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Number" v-model="form.number">
                     </div>
                </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class=" form-group">
                    <label for="amount">Description</label>
                    <textarea type="text" class="form-control" aria-describedby="emailHelp" placeholder="contact" v-model="form.description"></textarea>
                </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class=" form-group">
                    <label for="amount">Title</label>
                    <textarea type="text" class="form-control" aria-describedby="emailHelp" placeholder="title" v-model="form.title"></textarea>
                </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class=" form-group">
                    <label for="amount">Contact</label>
                    <input type="text" class="form-control"   aria-describedby="emailHelp" placeholder="contact" v-model="form.contact">
                 </div>
            </div>
            <div class="col-lg-3  pt-3  col-xs-12">
                <div class=" form-group">
                    <label for="amount">Price</label>
                    <input type="number" class="form-control"   aria-describedby="emailHelp" placeholder="0.00" v-model="form.price">
                 </div>
            </div>
            <div class="col-lg-6  pt-3  col-xs-12 col-sm-12">
                <div class="row pt-3 text-center">
                    <div class="col-lg-6 col-xs-12 col-sm-12">
                        <input class="form-check-input" type="radio" name="stamp" id="english_stamp" value="english" v-model="form.stamp">
                        <label class="form-check-label" for="inlineRadio1"> Sold stamp (English)</label>
                    </div>
                    <div class="col-lg-6 col-xs-12 col-sm-12">
                        <input class="form-check-input" type="radio" name="stamp" id="arabic_stamp" value="arabic"  v-model="form.stamp">
                        <label class="form-check-label" for="inlineRadio2"> Sold Stamp (Arabic)</label>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="col-12">
                <button class="btn btn-primary" @click="renderPlate" v-if="showform">Preview </button>
                <button class="btn btn-primary" @click="renderAd" v-if="success & showform">Post Ad </button>
            </div>
         </div>
    </div>
    <div class="row align-items-center text-align-center" v-if="loading">
        <img style='width:100px;height:100px' src='/images/loading.gif' id="loadingimg">
    </div>
    <div class="row" v-if="message">
        <h1>  @{{ message }} </h1>
    </div>
    <div class="row align-items-center text-align-center" id="plate" style="margin-top: 20px;text-align: center;align-content: center;color:red" v-html="response">
    </div>

</div>
<style>
    #plate img{
        width:100%;
        height:auto
    }
</style>
<script>
    const { createApp } = Vue

    createApp({
        data() {
            return {
                message: '',
                loading:false,
                response:'',
                plates:[],
                plate:null,
                success:false,
                showform:true,
                supports_letter:false,
                form:{title:'',stamp:'',letter:'',number:'',emirates:'',format:'',contact:'',description:''}
            }
        },
        mounted(){
            this.getImages()
          //  setTimeout(this.timer, 500);
        },
        watch:{
            'plate.image'(){
                let img = new Image();
                img.src = this.image_url + this.plate.image;
                img.onload = () => {
                    this.image_width = img.width
                    this.image_height = img.height
                    this.$refs.margin_left.max = img.width
                    //  this.$refs.margin_top.max = img.height
                }
            },
            'form.emirates'(){
                console.log("Emirates Changed")
            },
            'form.format'(){
                console.log("Format Changed")
                this.lettercheck()
            }
        },
        methods:{
            timer(){
                let selectedEmirate = this.$refs.emirate
                if(this.$refs.letter){
                    let selectedLetter = this.$refs.letter
                    this.form.letter=selectedLetter.value

                }
                let sval = selectedEmirate.value
                this.lettercheck()
                this.form.format=sval
                setTimeout(this.timer, 500);

            },
            lettercheck(){
                this.plates.forEach((val,key)=>{

                    if (val.id===this.form.format){
                        console.log(val)
                        if(val.supports_letter==="1" || val.supports_letter===1){
                            this.supports_letter = true
                        }
                        else{
                            this.supports_letter = false
                        }
                    }
                })
             },
            renderPlate(){
                this.loading=true;
                this.message = null
                let url ="/render"

                axios.post( url, this.form,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        this.loading=false;
                        this.response = response.data
                        this.success=true
                        this.message  = ""
                        this.showform=true
                    })
                    .catch(error => {
                        this.loading=false;
                        this.response = error.data.message
                    })
            },
            renderAd(){
                this.loading=true;
                this.message = null
                let url ="/render_ad"

                let frm = this.form

                axios.post( url, frm,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        this.loading=false;
                        this.response = response.data.image
                        this.success=response.data.success
                        this.message  = response.data.message
                        this.showform=false
                    })
                    .catch(error => {
                        this.loading=false;
                        this.response = error.data.message
                    })
            },
            async getImages(){
                this.loading=true;
                var formData = new FormData();

                let url ="/api/plate_formats"

                await  axios.get( url, formData )
                    .then(response => {
                        this.plates = response.data
                        this.loading=false;

                    })
                    .catch(error => {
                        this.loading=false;
                        this.response = error.data
                    })
            },
        }
    }).mount('#app')
</script>
