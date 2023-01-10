<div id="app">
    <div class="row  text-center">
        <div class="row">
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

            <div class="col-lg-4  col-xs-12">
                <div class="row">
                    <div class=" form-group">
                        <label for="amount">Number</label>
                        <input type="number" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Number" v-model="form.number">
                        <small id="emailHelp" class="form-text text-muted">We can add support for multiple languages but this is just demo</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="english_stamp" value="english" v-model="form.stamp">
                            <label class="form-check-label" for="inlineRadio1">Sold stamp (English)</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="arabic_stamp" value="arabic"  v-model="form.stamp">
                            <label class="form-check-label" for="inlineRadio2">Sold Stamp (Arabic)</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <button class="btn btn-primary" @click="renderPlate">Create</button>
        </div>
    </div>
    <div class="row align-items-center text-align-center" v-if="loading">
        <img style='width:100px;height:100px' src='https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif?20170503175831' id="loadingimg">
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
                supports_letter:false,
                form:{stamp:'',letter:'',number:'',format:''}
            }
        },
        mounted(){
            this.getImages()
            setTimeout(this.timer, 500);
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
            'form.format'(){
                this.lettercheck()
            }
        },
        methods:{
            timer(){
                let selectedEmirate = this.$refs.format
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
                         this.supports_letter = val.supports_letter === "1" || val.supports_letter === 1;
                    }
                })
            },
            renderPlate(){
                this.loading=true;
                this.message = null
                let url ="/render"

                let selectedEmirate = this.$refs.format
                let selectedLetter = this.$refs.letter
                let sval = selectedEmirate.value
                let letter = selectedLetter.value
                this.form.format=sval
                this.form.letter=letter
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
