import axios from 'axios'
export default {


    state: {
        comments: [],
        contents: [],
        selected: undefined,
        sizes: [],
        aligns: [],
        types: [],
        colors: [],
        promises: []
    },
    getters:{
        getContents: (state) => {
            return state.contents
        },
        getOrder: (state) => {
            console.log('getOrder')
            return state.contents.length
        },
        getContent: (state)  => {
            return state.contents[state.selected]
        },
        getSizes: (state) => {
            return state.sizes
        },
        getAligns: (state) => {
            return state.aligns
        },
        getTypes: (state) => {
            return state.types
        },
        getColors: (state) => {
            return state.colors
        },
        getComments: (state) => {
            return state.comments
        }


    },
    mutations: {
        addContent(state, content) {
            state.contents.push(content)
        },
        addSelected(state,index){
            if(state.selected != undefined){
                state.contents[state.selected].selected = false
                // Vue.set(state.contents[state.selected],'selected',false)
            }
            state.selected = index
            Vue.set(state.contents[index],'selected',true)
        },
        updateContent(state,content){
            state.contents[state.selected].property.align_id = content.property.align_id
            state.contents[state.selected].property.size_id = content.property.size_id
            state.contents[state.selected].property.color_id = content.property.color_id
            state.contents[state.selected].value = content.value
            state.contents[state.selected].type_id = content.type_id
        },
        deleteContent(state){
            let index = state.selected
            state.selected = undefined
            state.contents.splice(index,1)
        },
        uploadContent(state,contents){
            state.contents = contents
        },
        uploadTypes(state,types){
            state.types = types
        },
        uploadAligns(state,aligns){
            state.aligns = aligns
        },
        uploadSizes(state,sizes){
            state.sizes = sizes
        },
        uploadColors(state,colors){
            state.colors = colors
        },
        uploadComments(state,comments){
            state.comments = comments
        }
    },
    actions:{
        move({commit,state},dir){
            if(dir === 'down'){
                if(state.selected < state.contents.length - 1){
                    let index = state.selected
                    let content = {
                        value: state.contents[index].value,
                        type_id: state.contents[index].type_id,
                        property: state.contents[index].property
                    }
                    commit('deleteContent')
                    state.contents.splice(index+1,0,content)
                    commit('addSelected',index+1)
                }
            }else if(dir === 'up'){
                if(state.selected > 0){
                    let index = state.selected
                    let content = {
                        value: state.contents[index].value,
                        type_id: state.contents[index].type_id,
                        property: state.contents[index].property
                    }
                    commit('deleteContent')
                    state.contents.splice(index-1,0,content)
                    commit('addSelected',index-1)
                }
            }
        },
        contentsPayload({state,dispatch},post_id){

                state.contents.forEach( (element, index) => {
                    element.order = index
                    element.post_id = post_id
                    if(element.hasOwnProperty('url_temporal')){
                        if(element.url_temporal){
                            const promise = axios.post('/content/image/change',{value : element.value, post_id: post_id}).then( (res) => {
                                element.value = res.data
                            })
                            state.promises.push(promise)
                        }
                    }
                })


        },
        saveContentsDB({state,dispatch},post_id){
            let promises = []

            return new Promise(function(resolve, reject) {
                dispatch('contentsPayload',post_id)

                Promise.all(state.promises).then( values => {
                    axios.post('/publish',{contents : state.contents}).then( (res) => {
                        resolve({
                            status: res.status,
                            data: res.data
                        })
                    }).catch( (error) => {
                        reject({
                            status: error.response.status,
                            data: error.response
                        })
                    })
                }, reason => {
                    reject({
                        status: error.response.status,
                        data: error.response
                    })
                })
            })


        },
        async loadProperties({commit,state}){
            let types = await axios('/types')
            types = types.data
            commit('uploadTypes', types)
            let sizes = await axios('/sizes')
            sizes = sizes.data
            commit('uploadSizes',sizes)
            let aligns = await axios('/aligns')
            aligns = aligns.data
            commit('uploadAligns',aligns)
            let colors = await axios('/colors')
            colors = colors.data
            commit('uploadColors',colors)

        },
        loadComments({commit},post_id){
            axios('/comments/post/'+post_id)
                .then( (res) => {
                    commit('uploadComments',res.data)
                })
                .catch( (error) => {
                    console.log('error al traer los comentarios')
                    console.log(error.response)
                })
        }
    },
}
