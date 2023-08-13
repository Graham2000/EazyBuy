// Send product quantity to insert PHP

document.getElementById('addProduct').addEventListener('click', (e) => {
    let qty = document.getElementById('qty').value;
    //console.log(qty.value);
    var postData = {
        qty: qty,
        userID: userID,
        productID: productID
    };

    fetch("insertQty.php", {
        method: 'POST',
        headers: {
            'CONTENT-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    .then(response = (status) => {
        if (status.ok) {
            alert("Product added to cart!");
        }
    })

    // Add error catch

    // Update cart in nav to new values (SELECT)
});