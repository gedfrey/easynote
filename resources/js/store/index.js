export default {
    state: {
        contents: [],
        selected: undefined
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
            console.log(content)
            state.contents[state.selected].property.align_id = content.property.align_id
            state.contents[state.selected].property.size_id = content.property.size_id
            state.contents[state.selected].property.color_id = content.property.color_id
            state.contents[state.selected].value = content.value
            state.contents[state.selected].type_id = content.type_id
            console.log(state.contents[state.selected])
        },
        deleteContent(state){
            let index = state.selected
            state.selected = undefined
            state.contents.splice(index,1)
        },
        uploadContent(state,contents){
            state.contents = contents
        }
    },
    actions:{
        move({commit,state},dir){
            console.log('ejecutando cambio')
            console.log(dir)
            if(dir === 'down'){
                if(state.selected < state.contents.length - 1){
                    let index = state.selected
                    let content = {
                        value: state.contents[index].value,
                        type_id: state.contents[index].type_id,
                        // property: {
                        //     align: state.contents[index].property.align,
                        //     size: state.contents[index].property.size,
                        //     color: state.contents[index].property.color
                        // }
                        property: state.contents[index].property
                    }
                    console.log(state.contents)
                    console.log(content)
                    commit('deleteContent')
                    console.log('contenidos')
                    console.log(state.contents)
                    state.contents.splice(index+1,0,content)
                    commit('addSelected',index+1)
                }
            }else if(dir === 'up'){
                if(state.selected > 0){
                    let index = state.selected
                    let content = {
                        value: state.contents[index].value,
                        type_id: state.contents[index].type_id,
                        // property: {
                        //     align: state.contents[index].property.align,
                        //     size: state.contents[index].property.size,
                        //     color: state.contents[index].property.color
                        // }
                        property: state.contents[index].property
                    }
                    commit('deleteContent')
                    state.contents.splice(index-1,0,content)
                    commit('addSelected',index-1)
                }
            }
        }
    },
}
