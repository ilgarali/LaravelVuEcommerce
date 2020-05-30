export const getFeatured = ({commit}) => {
    let data = axios.get('/api/featured').then((res) => {
        
        
        commit('GETFEATURED',res.data.data)
    } )
    .catch((error) => {
        console.log(error);
        
    })
}



export const paginate = ({commit},page = 1) => {
    axios.get('api/post?page=' + page)
    .then(response => {
        
        
        commit('GETPOSTS',response.data)
    });
}

export const addToCart = ({commit},id) => {
     axios.get('api/allpost').then((res) => commit('ADDCART',{id,res}) )
    .catch((error) => console.log(error))
    
}
export const increaseQunatity = ({commit},id) => {
    commit('INCREASE',id)
    
}


export const decreaseQunatity = ({commit},id) => {
    commit('DECREASE',id)
    
}


export const removeItem = ({commit},id) => {
    commit('GETREMOVED',id)
}

export const findItem = ({commit},title) => {
    axios.get('api/allpost').then((res) => commit('GETFOUND',{title,res}) )
    .catch((error) => console.log(error))
    
}




export const addToHeart = ({commit},id) => {
    axios.get('api/allpost').then((res) => commit('ADDTOHEART',{id,res}) )
    .catch((error) => console.log(error))
}

export const getUnlikeItem = ({commit},id) => {
    commit('GETUNLIKED',id)
}

export const addCart = ({commit},id) => {

    axios.get('api/allpost').then((res) => commit('ADDEDCART',{id,res}) )
    .catch((error) => console.log(error))

} 

export const getSingle = ({commit},slug) => {
    
    axios.get('api/allpost').then((res) => commit('GETSINGLE',{slug,res}) )
    .catch((error) => console.log(error))
  
}