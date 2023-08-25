let imgSlider = document.getElementById("imgSlider");
let header = document.getElementById("sliderHeader");
let descr = document.getElementById("sliderDescr");
let btn = document.getElementById('shop');

let backgroundImages = ["#002244", "#367588"];
let headerContent = ["Laptops", "Smartphones"];
let descrContent = ["Starting at $700.99", "Starting at $250.99"];
let btnText = ["Shop Laptops", "Shop Smartphones"];
let btnLink = ["./laptops", "./smartphones"];

imgSlider.style.backgroundColor = "#002244";

let count = 0;
const length = backgroundImages.length;

// Change img url on button click
const prevImg = () => {
    if (count !== 0) {
        count--;
        setContent(count);
    }
}

const nextImg = () => {
    if (count < length - 1) {
        count++;
        setContent(count);
    }
}

const setContent = (count) => {
    imgSlider.style.backgroundColor = backgroundImages[count];
    header.textContent = headerContent[count];
    descr.textContent = descrContent[count];
    btn.textContent = btnText[count];
    btn.href = btnLink[count];
}