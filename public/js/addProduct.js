// Update cart table and corresponding page content
const updateCart = (checkout) => {
    let qty = document.getElementById('qty').value;

    var postData = {
        qty: qty,
        price: price * qty,
        userID: userID,
        productID: productID
    };

    fetch("./includes/updateCart.php", {
        method: 'POST',
        headers: {
            'CONTENT-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    .then(response => response.json())
    .then(data => {
        document.getElementById('itemCount').innerText = data.itemCount + ' Items';
        document.getElementById('totalPrice').innerText = '$' + data.totalPrice;
    })

    if (checkout) {
        window.location = "./cart";
    }
}
