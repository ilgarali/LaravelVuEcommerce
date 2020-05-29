export const countItem = (state) => {
    return state.cart.length   
}

export const getPrice = (state) => {
    let sum = 0
    state.cart.forEach(element => {
        
         sum += element.price * element.quantity
    });

    return sum
}

export const countHeart = (state) => {
    return state.liked.length   
}