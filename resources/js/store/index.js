import axios from 'axios'
export default {


    state: {
        contents: [],
        selected: undefined,
        sizes: [],
        aligns: [],
        types: [],
        colors: []
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

        }
    },
}
