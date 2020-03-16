<template>
    <div>
        <div class="card" v-if="!pending">
            <h1 class="card-header">Vista Preliminar</h1>
            <div class="card-body">
                <div v-for="(content,index) in contents" :key="index" :class="['container',checkSelected(content)]" @click="addSelected(index)">
                    <div class="container" v-if="types.find(function(element) {return element.id === content.type_id}).name === 'title'">
                        <p :class="[align(content.property.align_id), size_title(content.property.size_id)]">{{content.value}}</p>
                    </div>
                    <div class="container" v-if="types.find(function(element) {return element.id === content.type_id}).name === 'text'">
                        <p :class="[align(content.property.align_id)]">{{content.value}}</p>
                    </div>
                    <div :class="[align(content.property.align_id),'container']"  v-if="types.find(function(element) {return element.id === content.type_id}).name === 'images'">
<!--                        <p :class="[align(content.property.align_id)]">{{}}</p>-->
                        <img class="img-fluid" :src="url_path+'/'+content.value" :alt="content.value">
                    </div>

                </div>
            </div>
        </div>
        <div v-if="pending" class="container text-center mt-5">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { mapMutations, mapActions} from 'vuex';
export default {
    props: ['contents','url_path'],
    data(){
        return {
            types: [],
            sizes: [],
            aligns: [],
            colors: [],
            pending: true
        }
    },
    methods: {
        ...mapMutations([
           'addSelected'
        ]),
        ...mapActions([
           'loadProperties'
        ]),
        align: function(value){
            let align = this.aligns.find(element => element.id === value).value

            if(align === "center"){
                return "text-center"
            }else if(align === "left"){
                return "text-left"
            }else if(align === "right"){
                return "text-right"
            }
        },
        size_title: function(value){
            let size = this.sizes.find(element => element.id === value).value
            if(size === "very_big"){
                return "display-1"
            }else if(size === "big"){
                return "display-2"
            }else if(size === "normal"){
                return "display-4"
            }
        },
        getTypes: function(){
            return axios('/types')
        },
        getSizes(){
            return axios('/sizes')
        },
        getAligns(){
            return axios('/aligns')
        },
        getColors(){
            return axios('/colors')
        },
        async getUrlImage(value){
            let url = value
            try {
                url = await axios('/content/image/okK1k0ul7DrT35dooQvHLEKWvJjVNsJAHWcYb9Ef.png')
                console.log(url.data)
            }catch (e) {
                console.log('hubo un error al traer la imagenerror')
                console.log(e.response)
            }

            return url.data
        },
        checkSelected(obj){
            if(obj.hasOwnProperty('selected')){
                if(obj.selected){
                    return "bg-primary"
                }
            }
        },
        async requestData(){
            this.pending = true
            await this.loadProperties()

            this.types = await this.$store.getters.getTypes
            this.sizes = await  this.$store.getters.getSizes
            this.aligns = await this.$store.getters.getAligns
            this.colors = await this.$store.getters.getColors
            this.pending = false
        }
    },
    mounted(){
        this.requestData()
    }




}
</script>
