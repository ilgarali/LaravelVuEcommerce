import Swal from 'sweetalert2'

export const GETFEATURED = (state,data) => {
    
    
    state.featured = data;
    
    
}

export const GETPOSTS = (state,data) => {
    
    state.posts = data;
   
    
    
}

export const ADDCART = (state,{id,res}) => {
    state.allPosts = res.data.data; 
    
    let checkExist = state.cart.find((data) => data.id == id)
   
    
    if (checkExist) {
        checkExist.quantity += 1;
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Item already existed in cart. So quantity increased'
          })
        
        
    }else{
        state.cart.push(state.allPosts.find((data) =>  data.id == id))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Item has been added your cart successfully'
          })
    }
  
    
}


export const INCREASE = (state,{id,quantity}) => {
    let checkExist = state.cart.find((data) => data.id == id)
    checkExist.quantity += 1;

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Item quantity increased successfully'
      })
    
}

export const GETREMOVED = (state,id) => {
    state.cart.splice(state.cart.findIndex(item => item.id == id),1)
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Item has been removed successfully'
      })
}

export const GETFOUND = (state,{title,res}) => {
    let data = res.data.data; 

    
    state.searched = data.find(data => data.title == title)
    
    
}

export const ADDTOHEART = (state,{id,res}) => {
    
    
   
    state.allPosts = res.data.data; 
    let checkExist = state.liked.find((data) => data.id == id)
   
    
    if (checkExist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'You have already liked this item.'
          })
        
        
    }else{
        state.liked.push(state.allPosts.find((data) =>  data.id == id))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'You have liked item successfully'
          })
    }

    
}

export const GETUNLIKED = (state,id) => {
    state.liked.splice(state.liked.findIndex(item => item.id == id),1)
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Item has been unliked successfully'
      })
}

export const ADDEDCART = (state,{id,res}) => {
    state.liked.splice(state.liked.findIndex(item => item.id == id),1)
    state.allPosts = res.data.data; 
    
    let checkExist = state.cart.find((data) => data.id == id)
   
    
    if (checkExist) {
        checkExist.quantity += 1;
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Item already existed your cart. So quantity increased'
          })
        
    }else{
        state.cart.push(state.allPosts.find((data) =>  data.id == id))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'success',
            title: 'Item has been added your cart successfully'
          })
    }
  

}

export const GETSINGLE  = (state,{slug,res}) => {
    state.allPosts = res.data.data; 
    
    state.single = state.allPosts.find((data) => data.slug ==slug)
  
    
}