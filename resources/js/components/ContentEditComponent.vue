<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 d-flex flex-column">

                <div class="alert alert-danger" v-if="validateForm.createContent === true">
                    {{message.create}}
                </div>

                <div class="alert alert-success" v-if="validateForm.createContent === false">
                    {{message.create}}
                </div>

                <div class="row">
                    <div class="dropdown mb-2 col-12">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="http://localhost:8000/storage/icons/texts-40.png" alt="text">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <button class="dropdown-item" v-for="type of type_texts" :key="type.id"  @click="optionText(type.name,type.id)" type="button">{{textSpanish(type.name)}}</button>
                        </div>
                    </div>
                    <div class="dropdown mb-2 col-12">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="http://localhost:8000/storage/icons/files-40.png" alt="Archivo" class="text-light">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" @click="optionImage()" type="button">Imagen</button>
                        </div>
                    </div>
<!--                    <div class="dropdown mb-2 col-12">-->
<!--                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            <img src="http://localhost:8000/storage/icons/add-proper-white.png" alt="Otro">-->
<!--                        </button>-->
<!--                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">-->
<!--                            <button class="dropdown-item" type="button">Action</button>-->
<!--                            <button class="dropdown-item" type="button">Another action</button>-->
<!--                            <button class="dropdown-item" type="button">Something else here</button>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">
                                Contenido del Post
                            </h5>
                            <div class="card-body">
                                <div class="row" v-for="content of contents" :key="content.id">
                                    <div class="col" v-if="content.type === 1">
                                        <div class="card" @click="addId(content.id)" :class="[checkSelectedItem(content.id),content.text.align]">
                                            <div class="card-body">
                                                <p :class="['card-text',sizeTitle(content.text.size)]">
                                                    {{content.text.value}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col" v-if="content.type === 2">
                                        <div class="card" @click="addId(content.id)" :class="[checkSelectedItem(content.id)]">
                                            <div class="card-body d-flex justify-content-center align-item-center">
                                                <img :src="'http://localhost:8000/storage/'+content.image.url" :alt="content.image.url">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header">
                                Editar Contenido
                            </h5>
                            <div class="card-body">
                                <form action="" method="post" @submit.prevent="storeText" v-if="options.title || options.text">
                                    <input v-if="options.title" type="text" v-model="form.value" :class="['form-control','mb-2',isvalidValue]" :placeholder="textValue">
                                    <textarea name="text" v-if="options.text" :class="['form-control','mb-2',isvalidValue]" v-model="form.value" id="" cols="30" rows="5" :placeholder="textValue"></textarea>
                                    <div class="invalid-feedback" v-if="!validateForm.value">
                                        {{textValueFeedback}}
                                    </div>
                                    <select v-if="options.title" name="form.size" id="sizeSelect" :class="['custom-select','mr-sm-2','mb-2',isvalidsize]" v-model="form.size">
                                        <option value="">{{textSize}}</option>
                                        <option value="big">Grande</option>
                                        <option value="normal">normal</option>
                                        <option value="little">Chico</option>
                                    </select>
                                    <div class="invalid-feedback" :state="validateForm.size" v-if="!validateForm.size">
                                        Debes seleccionar un valor
                                    </div>
                                    <select name="form.align" id="alignSelect" :class="['custom-select','mr-sm-2','mb-2',isvalidalign]" v-model="form.align">
                                        <option value="">{{textAlign}}</option>
                                        <option value="text-center">centrado</option>
                                        <option value="text-left">izquierda</option>
                                        <option value="text-right">derecha</option>
                                    </select>
                                    <div class="invalid-feedback" v-if="!validateForm.align">
                                        Debes seleccionar un valor
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                                <form action="" method="post" @submit.prevent="storeImage" v-if="options.image">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input mb-2" id="validatedCustomFile" v-on:change="fileUpload" required>
                                        <label class="custom-file-label" for="validatedCustomFile">{{chooseFile}}</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        <button type="submit" class="btn btn-primary">Subir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2">
                <div class="col-2">
                    <div class="row">
                        <button class="btn btn-light mb-2" @click="moveContent(post_id,'up')">
                            <img src="http://localhost:8000/storage/icons/up-40.png" alt="Arriba">
                        </button>

                    </div>
                    <div class="row">
                        <button class="btn btn-light mb-2" @click="moveContent(post_id,'down')">
                            <img src="http://localhost:8000/storage/icons/down-40.png" alt="Abajo">
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-warning mb-2">
                            <img src="http://localhost:8000/storage/icons/edit-40.png" alt="Editar">
                        </button>
                    </div>
                    <div class="row">
                        <button @click="deleteContent()" class="btn btn-danger">
                            <img src="http://localhost:8000/storage/icons/delete-40.png" alt="Delete">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                selectedItem: 0,
                message: {
                  create: ''
                },
                contents: [],
                form: {
                    value:'',
                    size:'',
                    align:'',
                    type: 0,
                },
                file: null,
                type_texts: [],
                // menuOptions: {
                //   text:false,
                //   file:false,
                //   property:false
                // },
                options: {
                    text:false,
                    title:false,
                    image:false,
                },
                validateForm: {
                    value : null,
                    size: null,
                    align: null,
                    type: null,
                    createContent: null

                },
                chooseFile: 'Escoge el archivo...',

            }
        },
        computed: {

            isvalidValue: function(){
                if(this.validateForm.value != null){
                    if(!this.validateForm.value){
                        return 'is-invalid'
                    }
                }
            },
            isvalidsize: function(){
                if(this.validateForm.size != null){
                    if(!this.validateForm.size){
                        return 'is-invalid'
                    }
                }
            },
            isvalidalign: function(){
                if(this.validateForm.align != null){
                    if(!this.validateForm.align){
                        return 'is-invalid'
                    }
                }
            },
            textValueFeedback: function(){
                if(this.options.title){
                    return 'Debe ser entre 5 a 20'
                }else{
                    return 'El texto debe estar entre 20 a 200'
                }
            },
            textValue: function () {
                if(this.options.title){
                    return 'Ingresa el titulo...';
                }
                if(this.options.text){
                    return 'Ingresa el texto...';
                }
            },
            textSize: function (){
                if(this.options.title){
                    return 'Indica el tamaño del titulo'
                }
                if(this.options.text){
                    return 'Indica el tamaño del texto'
                }
            },
            textAlign: function(){
                if(this.options.title){
                    return 'Indica el alinamiento del titulo'
                }
                if(this.options.text){
                    return 'Indica el alinamiento del texto'
                }
            }
        },
        methods: {
            textSpanish: function(value){
                if(value === 'title'){
                    return 'Titulo'
                }else if(value === 'body_text'){
                    return 'Texto'
                }else{
                    return value
                }
            },
            storeImage: async function(){
                let orderNumber = 1
                let order =  await axios('/post/contents/order/'+this.post_id)
                order = order.data

                if(Array.isArray(order) && order.length){
                    orderNumber += order[0].order
                }

                let config = {
                    headers: { 'content-type' : 'multipart/form-data'}
                }
                let formData = new FormData()
                formData.append('file', this.file)

                let post = await axios.post('/images', formData , config)
                // console.log(post.data.id)
                if(post.status === 201){
                    let content = {
                        'order': orderNumber,
                        'post_id': this.post_id,
                        'image_id': post.data.id,
                        'type_id': 2
                    }
                    let postContent = await axios.post('/contents',content)
                    // console.log(postContent)
                    if (postContent.status === 201){
                        this.chooseFile = 'Escoge el archivo...'
                        this.message.create = 'Agregado exitosamente'
                        this.validateForm.createContent = false
                        this.getContentsByPost()
                    }else{
                        this.validateForm.createContent = true
                        this.message.create = 'Hubo un error al crear el contenido'
                    }
                }

            },
            storeText: async function (){
                let orderNumber = 1
                let order =  await axios('/post/contents/order/'+this.post_id)
                order = order.data

                if(Array.isArray(order) && order.length){
                    orderNumber += order[0].order
                }

                if(this.form.type === 1){

                    if(this.form.value.length >= 4 && this.form.value.length <= 20){
                        this.validateForm.value = true
                    }else{
                        this.validateForm.value = false
                    }

                    if(this.form.size.length){
                        this.validateForm.size = true
                    }else{
                        this.validateForm.size = false
                    }

                }else if(this.form.type === 2){
                    if(this.form.value.length >= 20 && this.form.value.length <= 200){
                        this.validateForm.value = true
                    }else{
                        this.validateForm.value = false
                    }

                    this.validateForm.size= true
                }

                if(this.form.align.length){
                    this.validateForm.align = true
                }else{
                    this.validateForm.align = false
                }



                // console.log(this.validateForm.value, this.validateForm.size, this.validateForm.align)



                if(this.validateForm.value && this.validateForm.size && this.validateForm.align){

                    let text = {
                        'value': this.form.value,
                        'size': this.form.size,
                        'align': this.form.align,
                        'type_text_id': this.form.type
                    }
                    let post = await axios.post('/texts',text)

                    if(post.status == 201){


                        let content = {
                            'order': orderNumber,
                            'post_id': this.post_id,
                            'text_id': post.data.id,
                            'type_id': 1
                        }
                        let postContent = await axios.post('/contents',content)
                        if(postContent.status === 201){
                            this.message.create = 'Agregado exitosamente'
                            this.validateForm.createContent = false
                            this.getContentsByPost()
                            this.resetFormTitle()
                            this.options.title = false
                            this.options.text = false
                        }else{
                            this.validateForm.createContent = true
                            this.message.create = 'Hubo un error al crear el contenido'
                        }
                    }

                }


            },
            resetFormTitle: function(){
                this.form.value = ''
                this.form.type = ''
                this.form.size = ''
                this.form.align = ''
                this.validateForm.value = null
                this.validateForm.type = null
                this.validateForm.align = null
                this.validateForm.size = null
            },
            fileUpload: async function(e){
                console.log(e.target.files[0])
                this.chooseFile = e.target.files[0].name
                this.file = e.target.files[0]
            },
            getTypesTexts: async function(){
                let types = await axios('/type-texts')
                this.type_texts = types.data;
            },
            getContentsByPost: async function(){
                let listContents = []
                let contents = await axios('/post/contents/list/'+this.post_id)

                for(let content of contents.data){
                    if(content.type_id === 1){
                        let text = await axios('/texts/'+content.text_id)
                        let type_text = await axios('/type-texts/'+text.data.type_text_id)
                        listContents.push(
                            {
                                'id': content.id,
                                'order': content.order,
                                'type': content.type_id,
                                'text':
                                    {
                                        'value' : text.data.value,
                                        'size' : text.data.size,
                                        'align' : text.data.align,
                                        'type' : type_text.data.name
                                    }
                            }
                        )
                    }
                    else if(content.type_id === 2){
                        let image = await axios('/images/'+content.image_id)
                        listContents.push(
                            {
                                'id': content.id,
                                'order': content.order,
                                'type': content.type_id,
                                'image':
                                    {
                                        'url' : image.data.url
                                    }
                            }
                        )
                    }

                }
                this.contents = listContents
            },
            editContent: async function(){
                if(this.selectedItem !== 0){
                    let content = await axios.get('/contents/'+this.selectedItem)
                    console.log(content)
                    this.selectedItem = 0
                }
            },
            deleteContent: async function(){
                if(this.selectedItem !== 0){
                    let content = await axios.delete('/contents/'+this.selectedItem)
                    this.getContentsByPost()
                    this.selectedItem = 0
                }

            },
            setFalseOptions: function(){
                this.options.text= false;
                this.options.title = false;
                this.options.image = false
            },
            optionText: function(type,id){
                this.resetFormTitle()
                this.setFalseOptions()
                if(type === 'title'){
                    this.options.title= true;
                }
                else{
                    this.options.text = true;
                }
                this.form.type = id
            },
            optionImage: function(){
                this.setFalseOptions()
                this.options.image = true
            },
            moveContent: async function(post_id,move){
                if(this.selectedItem !== 0){
                    let object = {
                        'post_id':post_id,
                        'content_id':this.selectedItem
                    }
                    if(move === 'up'){
                        let post = await axios.post('/post/contents/up',object)
                        this.getContentsByPost()
                    }else{
                        let post = await axios.post('/post/contents/down',object)
                        console.log(post)
                        this.getContentsByPost()
                    }
                    this.selectedItem = 0

                }


            },
            addId: function(id){
                this.selectedItem = id;
            },
            sizeTitle: function(size){
                if(size === 'big'){
                    return 'display-1'
                }else if(size === 'normal'){
                    return 'display-3'
                }else if(size === 'little'){
                    return 'display-5'
                }
            },
            checkSelectedItem: function(id){
                if(this.selectedItem === id){
                    return 'bg-info'
                }
            },

        },
        props: ['post_id'],
        mounted() {
            this.getTypesTexts()
            this.getContentsByPost()
        }

    }
</script>
