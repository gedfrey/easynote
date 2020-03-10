<template>
    <div class="card">
        <h1 class="card-header">Vista Preliminar</h1>
        <div class="card-body">

            <div v-for="(content,index) in contents" :key="index" :class="['container',checkSelected(content)]" @click="addSelected(index)">
                <div class="container" v-if="types.find(function(element) {return element.id === content.type_id}).name === 'title'">
                    <p :class="[align(content.property.align),size_title(content.property.size)]">{{content.value}}</p>
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
    methods: {
        ...mapMutations([
           'addSelected'
        ]),
        align: function(value){
            if(value === "center"){
                return "text-center"
            }else if(value === "left"){
                return "text-left"
            }else if(value === "right"){
                return "text-right"
            }
        },
        size_title: function(value){
            if(value === "very_big"){
                return "display-1"
            }else if(value === "big"){
                return "display-2"
            }else if(value === "normal"){
                return "display-4"
            }
        },
        getTypes(){
            axios('/types').then( (element) => {
                this.types = element.data
            })
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
    }
}
</script>
