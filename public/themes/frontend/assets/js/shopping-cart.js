document.addEventListener('DOMContentLoaded', () => {
    const collpaseShoppingCart = document.querySelectorAll('.cart-bill-collpase .button-collpase')
    console.log(collpaseShoppingCart)
    if(collpaseShoppingCart) {
        Array.from(collpaseShoppingCart).forEach((button) => {
            button.addEventListener('click', () => {
                const cartBillCollpase = button.closest('.cart-bill-collpase')
                const content = button.nextElementSibling
                const height = content.scrollHeight
                cartBillCollpase.classList.toggle('active')

                if(content.style.maxHeight) {
                    content.style.maxHeight = null
                } else {
                    content.style.maxHeight = height + 'px'
                }
            })
        })
    }
})