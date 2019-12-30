<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 d-flex flex-column">

                <div class="alert alert-danger" v-if="validateForm.createContent === true">
                    {{message.create}}
                </div>

                <div class="alert alert-success" v-if="validateForm.createContent === false">
                    {{message.create}}
                </div>

                <div class="dropdown mb-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agregar Texto
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <button class="dropdown-item" v-for="type of type_texts" :key="type.id"  @click="optionText(type.name,type.id)" type="button">{{type.name}}</button>
                    </div>
                </div>
                <div class="dropdown mb-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agregar Multimedia
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button">Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                </div>
                <div class="dropdown mb-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agregar Containers
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <button class="dropdown-item" type="button">Action</button>
                        <button class="dropdown-item" type="button">Another action</button>
                        <button class="dropdown-item" type="button">Something else here</button>
                    </div>
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
                                    <div class="col">
                                        <div class="card" @click="addId(content.id)" :class="[checkSelectedItem(content.id)]">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    {{content.value}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="col-2">-->
<!--                                        <div class="row">-->
<!--                                            <button class="btn btn-primary col mt-2" @click="moveContent(content.id,post_id,'up')">Subir</button>-->
<!--                                        </div>-->
<!--                                        <div class="row">-->
<!--                                            <button class="btn btn-primary col mt-2" @click="moveContent(content.id,post_id,'down')">Bajar</button>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>

                                <div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div @click="addId(1)" :class="[checkSelectedItem(1)]">
                    <h1>{{selectedItem}}</h1>
                </div>


                <p>Asterisk icon on a button:
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-asterisk"></span> Asterisk
                    </button>
                </p>
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
                                    <select name="form.size" id="sizeSelect" :class="['custom-select','mr-sm-2','mb-2',isvalidsize]" v-model="form.size">
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-2">
                <div class="col-2">
                    <div class="row">
                        <button class="btn btn-primary mb-2" @click="moveContent(post_id,'up')">Subir</button>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary mb-2" @click="moveContent(post_id,'down')">Bajar</button>
                    </div>
                    <div class="row">
                        <button class="btn btn-warning mb-2">Editar</button>
                    </div>
                    <div class="row">
                        <button @click="deleteContent(content.id)" class="btn btn-danger">Eliminar</button>
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
                    type: 0
                },
                type_texts: [],
                options: {
                    text:false,
                    title:false,
                },
                validateForm: {
                    value : null,
                    size: null,
                    align: null,
                    type: null,
                    createContent: null

                },
                selected: 'adios',

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

                }else if(this.form.type === 2){
                    if(this.form.value.length >= 20 && this.form.value.length <= 200){
                        this.validateForm.value = true
                    }else{
                        this.validateForm.value = false
                    }
                }


                if(this.form.size.length){
                    this.validateForm.size = true
                }else{
                    this.validateForm.size = false
                }

                if(this.form.align.length){
                    this.validateForm.align = true
                }else{
                    this.validateForm.align = false
                }

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
                            'text_id': post.data.id
                        }
                        let postContent = await axios.post('/contents',content)
                        if(postContent.status === 201){
                            this.message.create = 'Agregado exitosamente'
                            this.validateForm.createContent = false
                            this.getContentsByPost()
                            this.form.value = ''
                            this.form.type = ''
                            this.form.size = ''
                            this.form.align = ''
                            this.validateForm.value = null
                            this.validateForm.type = null
                            this.validateForm.align = null
                            this.validateForm.size = null
                            this.options.title = false
                            this.options.text = false
                        }else{
                            this.validateForm.createContent = true
                            this.message.create = 'Hubo un error al crear el contenido'
                        }
                    }

                }


            },
            getTypesTexts: async function(){
                let types = await axios('/type-texts')
                this.type_texts = types.data;
            },
            getContentsByPost: async function(){
                let listContents = []
                let contents = await axios('/post/contents/list/'+this.post_id)

                for(let content of contents.data){
                    let text = await axios('/texts/'+content.text_id)
                    let type_text = await axios('/type-texts/'+text.data.type_text_id)
                    listContents.push(
                        {
                            'id': content.id,
                            'order': content.order,
                            'value': text.data.value,
                            'size': text.data.size,
                            'align':text.data.align,
                            'type':type_text.data.name
                        }
                    )
                }
                this.contents = listContents
            },
            deleteContent: async function(id){
                console.log("eliminando")
                console.log(id)
                let content = await axios.delete('/contents/'+id)
                console.log(content)
                this.getContentsByPost()
            },
            optionText: function(type,id){
                this.options.text= false;
                this.options.title = false;
                if(type === 'title'){
                    this.options.title= true;
                }
                else{
                    this.options.text = true;
                }
                this.form.type = id
                console.log(this.form.type)
            },
            moveContent: async function(post_id,move){
                let object = {
                    'post_id':post_id,
                    'content_id':this.selectedItem
                }
                if(move === 'up'){
                    let post = await axios.post('/post/contents/up',object)
                    console.log(post)
                    this.getContentsByPost()
                }else{
                    let post = await axios.post('/post/contents/down',object)
                    console.log(post)
                    this.getContentsByPost()
                }

            },
            addId: function(id){
                this.selectedItem = id;
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
