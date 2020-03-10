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
            }
            state.selected = index
            Vue.set(state.contents[index],'selected',true)
        },
        updateContent(state,content){
            state.contents[state.selected].property.align = content.property.align
            state.contents[state.selected].property.size = content.property.size
            state.contents[state.selected].property.color = content.property.color
            state.contents[state.selected].value = content.value
            state.contents[state.selected].type_id = content.type_id
        },
        deleteContent(state){
            let index = state.selected
            state.selected = undefined
            state.contents.splice(index,1)
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
                        property: {
                            align: state.contents[index].property.align,
                            size: state.contents[index].property.size,
                            color: state.contents[index].property.color
                        }
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
                        property: {
                            align: state.contents[index].property.align,
                            size: state.contents[index].property.size,
                            color: state.contents[index].property.color
                        }
                    }
                    commit('deleteContent')
                    state.contents.splice(index-1,0,content)
                    commit('addSelected',index-1)
                }
            }
        }
    },
}
