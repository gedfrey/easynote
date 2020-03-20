<template>
    <div class="container mt-2">
        <div class="card" v-if="loading">
            <div class="card-header text-center">
                <h2>
                    <strong>
                        Comentarios
                    </strong>
                </h2>

            </div>
            <div class="card-body "  v-for="(comment, index) in this.$store.getters.getComments" :key="index" v-if="getComments.length != 0">
                <p class="text-center">{{comment.value}}</p>
                <h6 class="card-subtitle mt-2 text-muted text-right">Usuario : {{comment.user.name}}</h6>
                <h6 class="card-subtitle mt-2 text-muted text-right">Fecha: {{comment.created_at}}</h6>
            </div>
            <div class="card-body" v-if="getComments.length === 0">
                <h1 class="display-2 text-center">No Hay Comentarios</h1>
                <h1 class="display-3 text-center">Se el primero!!</h1>
            </div>
        </div>
        <div v-if="!loading">
            <h1>Cargando...</h1>
        </div>
    </div>
</template>
<script>
    import {mapActions,mapGetters} from 'vuex'
    export default {
        props: ['comments','post_id'],
        data(){
            return {
                loading: false
            }
        },
        computed: {
            ...mapGetters([
                'getComments'
            ])
        },
        methods: {
              ...mapActions([
                  'loadComments'
              ])
        },
        mounted() {
            this.loading = false
            this.loadComments(this.post_id)
            this.loading = true
        }
    }
</script>
