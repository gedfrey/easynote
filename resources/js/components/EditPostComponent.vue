<template>
    <div class="container-fluid">

        <div class="row">

<!--            left-->

            <div class="col-12 col-md-2">
                <div class="container">
                    <div v-if="alert.status" :class="['alert', alert.type,'mt-0','mt-md-2']" role="alert">
                        {{alert.message}}
                    </div>

                    <div class="dropdown mb-2 col-3 col-md-12">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img :src="url_path+'/icons/texts-40.png'" alt="text">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <button class="dropdown-item" v-for="(type,index) of type_texts" :key="type.index"  @click="activeForm(type)" type="button">{{typeText(type)}}</button>
                        </div>
                    </div>
                    <div class="dropdown mb-2 col-3 col-md-12">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img :src="url_path+'/icons/files-40.png'" alt="imagen" class="text-light">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" @click="alertActive('Hola mundo','alert-danger')" type="button">Imagen</button>
                        </div>
                    </div>

                </div>
            </div>

<!--            mid-->

            <div class="col-12 col-md-8">
                <div class="container mb-2">
                    <ListContents :contents="getContents" />
<!--                    <button class="btn btn-primary" @click="alertActive('HOla mundo','alert-danger')">Click Me</button>-->
                </div>
                <div class="container">
                    <FormComponent :form="form" @disableForm="form.status = $event, form.update = $event" @alert="alertActive"/>
                </div>
            </div>

<!--            right-->

            <div class="col-12 col-md-2">
                <div class="row">
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-light mb-2" @click="move('up')">
                            <img :src="url_path+'/icons/up-40.png'" alt="Arriba">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-light mb-2" @click="move('down')">
                            <img :src="url_path+'/icons/down-40.png'" alt="Abajo">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2 col-md-12">
                        <button class="btn btn-warning mb-2" @click="editContent()">
                            <img :src="url_path+'/icons/edit-40.png'" alt="Editar">
                        </button>
                    </div>
                    <div class="col-3 col-sm-2 col-md-12">
                        <button @click="deleteContent" class="btn btn-danger">
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
    props: ['post_id','url_path'],
    computed: {
        ...mapGetters([
            'getContents'
        ]),
    },
    methods: {
        ...mapMutations([
            // 'move',
            'deleteContent',
            // 'updateContent'
        ]),
        ...mapActions([
           'move'
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


    },
    mounted() {
        this.types = this.getTypes()
    }
}
</script>
