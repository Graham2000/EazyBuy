// Thumbnails and main content
let thumbnails = document.getElementsByClassName("preview");
let oldMain = document.getElementsByClassName("main");

const changeProduct = (e) => {
    // Hide old img and thumbnail
    for (let i = 0; i < oldMain.length; i++) {
        oldMain[i].style.display = "none";
        thumbnails[i].classList.remove("border");
    }

    // Change main image
    let mainClass = e.classList[0];
    let mainImg = document.getElementsByClassName(mainClass)[0];
    mainImg.style.display = "block";

    // Add thumbnail border
    e.classList.add("border");
}