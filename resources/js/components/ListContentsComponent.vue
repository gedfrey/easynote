<template>
    <div class="card">
        <h1 class="card-header">Vista Preliminar</h1>
        <div class="card-body">

            <div v-for="(content,index) in contents" :key="index" :class="['container',checkSelected(content)]" @click="addSelected(index)">
                <div class="container" v-if="types.find(function(element) {return element.id === content.type_id}).name === 'title'">
                    <p :class="[align(content.property.align_id),size_title(content.property.size_id)]">{{content.value}}</p>
                </div>
                <div class="container" v-if="types.find(function(element) {return element.id === content.type_id}).name === 'text'">
                    <p :class="[align(content.property.align)]">{{content.value}}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { mapMutations} from 'vuex';
export default {
    props: ['contents'],
    data(){
        return {
            types: [],
            sizes: [],
            aligns: [],
            colors: []
        }
    },
    methods: {
        ...mapMutations([
           'addSelected'
        ]),
        align: function(value){
            let align = this.aligns.find(element => element.id === value).value
            console.log('revisando alinamiento')
            console.log(align)
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
        checkSelected(obj){
            if(obj.hasOwnProperty('selected')){
                if(obj.selected){
                    return "bg-primary"
                }
            }
        }
    },
    mounted(){
        this.getTypes()
        this.getSizes()
        this.getAligns()
        this.getColors()
    }
}
</script>
