const cart = {};

function addToCart(product_name, product_price) {
    if (cart[product_name]) {
        cart[product_name].quantity += 1;
        cart[product_name].totalPrice += product_price;
    }
    else {
        cart[product_name] = {
            quantity : 1,
            totalPrice: product_price
        };
    }
    updateCartDisplay();
}

function removeFromCart(product_name, product_price){
    if (cart[product_name] && cart[product_name].quantity > 0){
        cart[product_name].quantity -= 1;
        cart[product_name].totalPrice -= product_price;
        if(cart[product_name].quantity == 0){
            delete cart[product_name];
        }
    }
    else{
        alert("The item is not in the cart!");
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartList = document.getElementById('products');
    cartList.innerHTML = '';
    let sub_total = 0;
    for (let product in cart) {
        const listItem = document.createElement('li');
        listItem.innerText = `${product}
            - Quantity: ${cart[product].quantity}
            - Price: Php ${cart[product].totalPrice.toFixed(2)}`;
        cartList.appendChild(listItem);
        sub_total += cart[product].totalPrice
    }
    document.getElementById('total').innerHTML = `
    <hr>
    <h3> Total Price: <br>
    Php ${sub_total.toFixed(2)}</h3>`

}