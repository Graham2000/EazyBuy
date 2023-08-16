// Remove item from shoppping cart
function removeItem(elem, cartProductID, cartID, price, quantity, userID) {
    elem.parentNode.remove();

    var postData = {
        cartProductID: cartProductID,
        cartID: cartID,
        price: price,
        quantity: quantity,
        userID: userID
    }

    // Fetch to delete item from db cart_product
    fetch("./includes/removeItem.php", {
        method: 'POST',
        headers: {
            'CONTENT-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    .then(response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById('itemCount').innerText = data.totalCount + ' Items';
        document.getElementById('totalPrice').innerText = '$' + data.totalPrice;

        document.getElementById('tc').innerText = data.totalCount;
        document.getElementById('tp').innerText = data.totalPrice;
    })


}