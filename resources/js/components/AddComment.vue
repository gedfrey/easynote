<template>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                Agregar un Comentario
            </div>
            <div class="card-body">
                <form v-on:submit.prevent="submit">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentario</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="value"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import {mapActions} from 'vuex';
    export default {
        props : ['post_id'],
        data() {
            return {
                value: ''
            }
        },
        methods: {
            ...mapActions(['loadComments']),
            cleanForm(){
                this.value = ''
            },
            submit(){
                axios.post('/comment/create',{
                    value : this.value,
                    post_id : this.post_id,
                }).then( (res) => {
                    console.log(res)
                    this.cleanForm()
                }).catch( (error) => {
                    console.log(error.response)
                })
            }
        }
    }

</script>
