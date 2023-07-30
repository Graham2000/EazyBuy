let preview = document.getElementsByClassName("preview");
// Large preview
let product = document.getElementsByClassName("productImg");

// Images retireved from db preview!!
let images = ["../img/charger.jpg", "../img/block.jpg", "../img/cc.jpg"];

// Update preview img
const changeImg = (e) => {
    let index = e.target.classList[1];
    product[0].setAttribute("src", images[index]);

    // Update index for large preview
    let oldPreview = product[0];
    let oldIndex = product[0].classList[1];
    oldPreview.classList.remove(oldIndex);
    oldPreview.classList.add(index);
    console.log(oldPreview.classList);

    // Add border to selected img
    preview[index].classList.add("border");
    preview[oldIndex].classList.remove("border");
}

// Add event listener to each thumbnail img
for (let i = 0; i < preview.length; i++) {
    preview[i].addEventListener("click", changeImg);
}

