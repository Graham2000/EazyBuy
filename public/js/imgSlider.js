let imgSlider = document.getElementById("imgSlider");
let header = document.getElementById("sliderHeader");
let descr = document.getElementById("sliderDescr");

let backgroundImages = ["#3b3b3b", "#1f1f1f"];
let headerContent = ["Laptops", "Smartphones"];
let descrContent = ["Starting at $117.99", "Starting at $55.99"];

//Init img
//imgSlider.style.backgroundImage = "url('./img/img1.jpg')";
imgSlider.style.backgroundColor = "#3b3b3b";

let count = 0;
const length = backgroundImages.length;

// Change img url on button click
const subImg = () => {
    if (count !== 0) {
        count--;
        //imgSlider.style.backgroundImage = `url(${backgroundImages[count]})`;
        imgSlider.style.backgroundColor = backgroundImages[count];
        header.textContent = headerContent[count];
        descr.textContent = descrContent[count];
    }
}

const addImg = () => {
    if (count < length - 1) {
        count++;
        //imgSlider.style.backgroundImage = `url(${backgroundImages[count]})`;
        imgSlider.style.backgroundColor = backgroundImages[count];
        header.textContent = headerContent[count];
        descr.textContent = descrContent[count];
    }
}