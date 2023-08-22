const checkout = () => {
  let productIDs = [];
  let productQtys = [];

  let ids = document.getElementsByClassName('pID');
  let qtys = document.getElementsByClassName('qty');
  
  for (let i = 0; i < qtys.length; i++) {
    productIDs.push(ids[i].value);
    productQtys.push(qtys[i].value);
  }

  var postData = {
    productIDs: productIDs,
    productQtys: productQtys,
  };

  fetch("../src/finalizePurchase.php", {
      method: 'POST',
      headers: {
          'CONTENT-Type': 'application/json'
      },
      body: JSON.stringify(postData)
  })
  
  .then(response => response.json())
  .then(data => {
    //console.log(data)
    window.location = data.url;
  })
}

document.getElementById('checkout').addEventListener('click', checkout);
