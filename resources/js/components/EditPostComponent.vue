<template>
    <div class="container-fluid">

        <div class="row">

<!--            left-->

            <div class="col-12 col-md-2">
                <div class="container d-flex flex-column justify-content-center align-items-center">
                    <div v-if="alert.status" :class="['alert', alert.type,'mt-0','mt-md-2']" role="alert">
                        {{alert.message}}
                    </div>

                    <button class="btn btn-primary mb-5" v-if="!post_update" @click="publish">Publicar</button>

                    <button class="btn btn-primary mb-5" v-if="post_update" @click="updatePublish">Actualizar</button>

                    <div class="dropdown mb-2 ">
                        <button class="btn btn-light dropdown-toggle border" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img :src="url_path+'/icons/texts-40.png'" alt="text">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <button class="dropdown-item" v-for="(type,index) of type_texts" :key="type.index"  @click="activeForm(type)" type="button">{{typeText(type)}}</button>
                        </div>
                    </div>
                    <div class="dropdown mb-2">
                        <button class="btn  dropdown-toggle border" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img :src="url_path+'/icons/files-40.png'" alt="imagen" class="text-light">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" @click="activeForm('images')" type="button">Imagen</button>
                        </div>
                    </div>

                </div>
            </div>

<!--            mid-->

            <div class="col-12 col-md-8">
                <div class="container mb-2">
                    <ListContents :contents="getContents" :url_path="url_path"/>
                </div>
                <div class="container">
                    <FormComponent :form="form" @disableForm="form.status = $event, form.update = $event" @alert="alertActive"/>
                </div>
            </div>

<!--            right-->

            <div class="col-12 col-md-2">
                <div class="row">
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-light mb-2 border" @click="move('up')">
                            <img :src="url_path+'/icons/up-40.png'" alt="Arriba">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-light mb-2 border" @click="move('down')">
                            <img :src="url_path+'/icons/down-40.png'" alt="Abajo">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-warning border mb-2" @click="editContent()">
                            <img :src="url_path+'/icons/edit-40.png'" alt="Editar">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2  col-md-12">
                        <button @click="deleteContent" class="btn btn-danger border">
                            <img :src="url_path+'/icons/delete-40.png'" alt="Delete">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapGetters, mapMutations, mapActions } from 'vuex'
import ListContents from "./ListContentsComponent";
import FormComponent from "./FormComponent";
import axios from "axios";
export default {
    components: {
        ListContents,
        FormComponent
    },
    data() {
        return {
            contents: [],
            alert: {
                message: '',
                type: '',
                status: false,
            },
            form: {
                value: '',
                status: false,
                update: false
            },
            type_texts:['title','text'],
            types: []
        }
    },
    props: ['post_id','url_path','post_update'],
    computed: {
        ...mapGetters([
            'getContents'
        ]),
    },
    methods: {
        ...mapMutations([
            'deleteContent',
            'uploadContent'
        ]),
        ...mapActions([
           'move',
           'loadProperties',
            'contentsPayload',
            'saveContentsDB'
        ]),
        typeText(value){
            if(value === 'title'){
                return "Titulo"
            }else if(value === 'text'){
                return "Texto"
            }
        },
        alertDisable(){
            this.alert.status = false
        },
        alertActive(message,type){
            this.alert.status = true
            this.alert.type = type
            this.alert.message = message
            setInterval(this.alertDisable, 10000)
        },
        activeForm(value){
            this.form.value = value
            this.form.status = true
            this.form.update = false
        },
        editContent(){
            let content = this.$store.getters.getContent
            this.form.value = this.types.find( element => element.id === content.type_id).name
            this.form.status = true
            this.form.update = true
        },
        getTypes(){
            axios('/types').then( (element) => {
                this.types = element.data
            })
        },
        async getContentsByDB(){
            let url = '/post/contents/properties/'+this.post_id
            return await axios.get(url)
        },
        async destroyContentsDB(contents){
            if(contents.length > 0){
                return await axios.post('/posts/contents/destroy',{
                    contents: contents
                })
            }

            this.alertActive('Nada que eliminar','alert-danger')

        },
        // changeUrlImage(value, post_id){
        //     axios.post('/content/image/change',{value : value, post_id: post_id})
        //         .then( (res) => {
        //             return res.data
        //         })
        //         .catch( (error) => {
        //
        //         })
        // },
        // createPayload(contents,post_id){
        //
        //         contents.forEach( (element, index) => {
        //             element.order = index
        //             element.post_id = post_id
        //             if(element.hasOwnProperty('url_temporal')){
        //                 if(element.url_temporal){
        //                     console.log('es una imagen temporal')
        //                     element.value = this.changeUrlImage(element.value, post_id)
        //                 }
        //             }
        //         })
        //
        // },
        // async saveContentsDB(payload){
        //     return await axios.post('/publish',payload)
        // },
        async loadContents(update){
            if(update){
                let contents = await this.getContentsByDB()
                if(contents != undefined){
                    this.uploadContent(contents.data)
                }
            }
        },
        async publish(){
            let contents = this.$store.getters.getContents
            try {
                // console.log(contents)
                // let res = await this.saveContentsDB(this.post_id)
                // console.log('res')
                // console.log(res)
                // if(res.status === 200){
                //     let url = '/publish/success/'+this.post_id
                //     window.location.pathname = url
                // }
                this.saveContentsDB(this.post_id).then( (res) => {
                    let url = '/publish/success/'+this.post_id
                    window.location.pathname = url
                }).catch( (error) => {
                    this.alertActive('Error al intentar salvar el contenido','alert-danger')
                })
            }catch (e) {
                console.log(e.response)
                this.alertActive('Error al intentar salvar el contenido','alert-danger')
            }
        },
        async updatePublish(){
            // console.log('ejecutando funciòn para grabar')
            try{
                let contentsDB = await this.getContentsByDB()
                this.saveContentsDB(this.post_id)
                this.destroyContentsDB(contentsDB.data)
                this.alertActive('Actualizado','alert-success')
            }catch (e) {
                let error = 'Error al intentar salvar el contenido.\n'+e.response
                this.alertActive('Error al intentar salvar el contenido','alert-danger')
            }


        }


    },
    created() {
        this.loadProperties()
    },
    mounted() {
        this.types = this.getTypes()
        this.loadContents(this.post_update)
    }
}
</script>
