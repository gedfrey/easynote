<template>
    <div class="card" v-if="form.status">
        <h1 class="card-header">{{update}} {{title}}</h1>
        <div class="card-body">
            <form v-on:submit.prevent="onSubmitText" v-if="(form.value === 'title' || form.value === 'text') && !form.update">
                <div class="form-group" v-if="form.value === 'title'">
                    <label for="inputTitle">{{title}}</label>
                    <input type="text" class="form-control" v-model="content.value">
                </div>
                <div class="form-group" v-if="form.value === 'text'">
                    <label for="inputTitle">{{title}}</label>
                    <textarea name="" id="" type="text" class="form-control" v-model="content.value" cols="30" rows="10"></textarea>
                </div>
                <div class="form group" v-if="form.value === 'title'">
                    <label for="size">Tamaño</label>
                    <select name="" id="" class="form-control" v-model="property.size">
                        <option v-for="(size, index) in sizes" :key="index" :value="size.value">{{sizef(size.value)}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="align">Posición</label>
                    <select name="" id="" class="form-control" v-model="property.align">
                        <option v-for="(align,index) in aligns" :key="index" :value="align.value">{{alignf(align.value)}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <select name="" id="" class="form-control" v-model="property.color">
                        <option v-for="(color, index) in colors" :key="index" :value="color.value">{{colorf(color.value)}}</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <form v-on:submit.prevent="onSubmitUpdateText" v-if="(form.value === 'title' || form.value === 'text') && form.update">
                <div class="form-group" v-if="form.value === 'title'">
                    <label for="inputTitle">{{title}}</label>
                    <input type="text" class="form-control" v-model="content.value">
                </div>
                <div class="form-group" v-if="form.value === 'text'">
                    <label for="inputTitle">{{title}}</label>
                    <textarea name="" id="" type="text" class="form-control" v-model="content.value" cols="30" rows="10"></textarea>
                </div>
                <div class="form group" v-if="form.value === 'title'">
                    <label for="size">Tamaño</label>
                    <select name="" id="" class="form-control" v-model="property.size">
                        <option v-for="(size, index) in sizes" :key="index" :value="size.value">{{sizef(size.value)}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="align">Posición</label>
                    <select name="" id="" class="form-control" v-model="property.align">
                        <option v-for="(align,index) in aligns" :key="index" :value="align.value">{{alignf(align.value)}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <select name="" id="" class="form-control" v-model="property.color">
                        <option v-for="(color, index) in colors" :key="index" :value="color.value">{{colorf(color.value)}}</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>

            <form v-on:submit.prevent="submitFormImage" v-if="form.value  === 'images' && !form.update">
                <div class="form-group">
                    <label for="align">Posición</label>
                    <select name="" id="" class="form-control" v-model="property.align">
                        <option v-for="(align,index) in aligns" :key="index" :value="align.value">{{alignf(align.value)}}</option>
                    </select>
                </div>
                <div class="custom-file mb-2">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" v-on:change="onChangeFileUpload()" required>
                    <label class="custom-file-label" for="validatedCustomFile">{{file_name}}</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <form v-on:submit.prevent="onSubmitImageUpdate" v-if="form.value  === 'images' && form.update">
                <div class="form-group">
                    <label for="align">Posición</label>
                    <select name="" id="" class="form-control" v-model="property.align">
                        <option v-for="(align,index) in aligns" :key="index" :value="align.value">{{alignf(align.value)}}</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>

        </div>
    </div>
</template>
<script>
import { mapMutations } from 'vuex'
import axios from 'axios'
export default {
    props: ['form'],
    data(){
        return {
            content: {
                value: '',
            },
            property: {
              size: 'normal',
              align: 'left',
              color: 'black'
            },
            types:[],
            colors: [],
            sizes: [],
            aligns: [],
            errors: [],
            file_name: 'Escoge un Archivo..',
            file: ''
        }
    },
    computed: {
        title: function(){
            if(this.form.value === 'title'){
              return 'Titulo'
            }else if(this.form.value === 'text'){
              return 'Texto'
            }else if(this.form.value === 'image'){
              return 'Imagen'
            }
        },
        update: function(){
            if(this.form.update){
                return 'Actualizar'
            }
            return 'Agregar'
        }

    },
    watch:{
        form: {
            handler(value){
                if(value.update){
                    this.updateData()
                }
            },
            deep: true
        },
    },
    methods: {
        ...mapMutations([
            'addContent',
            'updateContent'

        ]),
        onChangeFileUpload(){

            let fileInput = document.querySelector( '#validatedCustomFile' )
            this.file = fileInput.files[0];
            this.file_name = this.file.name

        },
        updateData(){
            if(this.form.update){
                let content = this.$store.getters.getContent
                this.content.value = content.value
                this.property.align = this.aligns.find( element => element.id === content.property.align_id).value
                this.property.size = this.sizes.find( element => element.id === content.property.size_id).value
                this.property.color = this.colors.find( element => element.id === content.property.color_id).value
            }
        },
        getTypes(){
            axios('/types').then( (element) => {
                this.types = element.data
            })
        },
        async getSizes(){
            let data = await axios('/sizes')
            this.sizes = data.data
        },
        async getAligns(){
            let data = await axios('/aligns')
            this.aligns = data.data
        },
        async getColors(){
            let data = await axios('/colors')
            this.colors = data.data
        },
        async getColors(){
            let data = await axios('/colors')
            this.colors = data.data
        },
        sizef: function(value){
            if(value === 'normal'){
                return value
            }else if(value === 'big'){
                return 'Grande'
            }else if(value === 'very_big'){
                return 'Muy Grande'
            }
        },
        alignf: function(value){
            if(value === 'center'){
                return 'centrado';
            }else if(value === 'left'){
                return 'izquierda'
            }else if(value === 'right'){
                return 'derecha'
            }else if(value === 'justify'){
                return 'justificado'
            }
        },
        colorf: function(value){
            if(value === 'black'){
                return 'negro'
            }else if(value === 'blue'){
                return 'azul'
            }else if(value === 'red'){
                return 'rojo'
            }
        },
        disableForm(){
            this.$emit('disableForm',false);
        },
        cleanForm(){
            this.content.value = ''
            this.property.size = 'normal'
            this.property.align = 'left'
            this.property.color = 'black'
            this.errors = []
            this.file_name = 'Escoge un Archivo..',
            this.file = ''

        },
        valideText(){
            if(this.content.value.length <= 4 || this.content.value.length >= 1000){
                this.errors.push({
                    type: 'value',
                    message: 'Se exedio el tamaño maximo'
                })
            }else{
                let index = this.errors.findIndex( function(element){
                    return element.type === 'value'
                })
                this.errors.splice(index,1)

            }
        },
        async submitFormImage(){
            let formData = new FormData();
            formData.append('image', this.file);
            try{
                let res = await axios.post('/content/image/upload',
                    formData,
                    {

                        headers: {

                            'Content-Type': 'multipart/form-data'

                        }
                    }
                )
                let value = this.form.value
                this.addContent({
                    value: res.data,
                    order: 0,
                    type_id: this.types.find( function(element){
                        return element.name === value
                    }).id,
                    url_temporal: true,
                    property: {
                        align_id: this.aligns.find(element => element.value === this.property.align).id,
                        color_id: this.colors.find(element => element.value === this.property.color).id,
                        size_id: this.sizes.find( element => element.value === this.property.size).id
                    }
                })
                this.$emit('alert','agregado con exito','alert-success')
                this.cleanForm()
                this.disableForm()

            }catch (e) {
                this.$emit('alert','Error al subir '+e.response,'alert-success')
            }

        },
        onSubmitText(){
            this.valideText()
            let count = this.errors.length
            if(count <= 0){
                let tipos = this.types
                let value = this.form.value
                this.addContent({
                    value: this.content.value,
                    order: 0,
                    type_id: this.types.find( function(element){
                        return element.name === value
                    }).id,
                    property: {
                        align_id: this.aligns.find(element => element.value === this.property.align).id,
                        color_id: this.colors.find(element => element.value === this.property.color).id,
                        size_id: this.sizes.find( element => element.value === this.property.size).id
                    }
                })
                this.$emit('alert','agregado con exito','alert-success')
                this.cleanForm()
                this.disableForm()
            }else{
                this.$emit('alert','revisa los campos','alert-danger')
            }
        },
        onSubmitUpdateText(){
            this.valideText()
            if(this.errors.length === 0){
                let value = this.form.value
                this.updateContent({
                    value: this.content.value,
                    order: this.$store.getters.getOrder,
                    type_id: this.types.find( function(element){
                        return element.name === value
                    }).id,
                    property: {
                        align_id: this.aligns.find(element => element.value === this.property.align).id,
                        color_id: this.colors.find(element => element.value === this.property.color).id,
                        size_id: this.sizes.find( element => element.value === this.property.size).id
                    }
                })
                this.$emit('alert','actualizado con exito','alert-success')
                this.cleanForm()
                this.disableForm()
            }else{
                this.$emit('alert','Revisa los campos','alert-danger')
            }
        },
        onSubmitImageUpdate(){
            let value = this.form.value
            this.updateContent({
                value: this.content.value,
                order: 0,
                type_id: this.types.find( function(element){
                    return element.name === value
                }).id,
                property: {
                    align_id: this.aligns.find(element => element.value === this.property.align).id,
                    color_id: this.colors.find(element => element.value === this.property.color).id,
                    size_id: this.sizes.find( element => element.value === this.property.size).id
                }

            })
            this.$emit('alert','actualizado con exito','alert-success')
            this.cleanForm()
            this.disableForm()
        }
    },
    mounted(){
        this.getTypes()
        this.getSizes()
        this.getAligns()
        this.getColors()

    },
}
</script>
