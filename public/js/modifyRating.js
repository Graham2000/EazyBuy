// Update rating based on user input

let emptyStar = document.getElementById('emptyStar');
let rating = document.getElementById('rating');

window.onload = () => {
    emptyStar.style.display = "block";
    emptyStar.classList.add("star");

    for (let i = 0; i < 4; i++) {
        let e = emptyStar.cloneNode(true);
        rating.appendChild(e);
    }
}

let stars = document.getElementsByClassName('star');

const modifyRating = (e) => {
    let starPos = getPosition(e);

    // Fill in prev stars
    for (let i = starPos; i >= 0; i--) {
        stars[i].style.color = '#FFDF00';
    }

    // Remove filled in stars to right
    for (let i = starPos + 1; i < 5; i++) {
        stars[i].style.color = '#000';
    }
}

function getPosition(star) {
   var list = document.getElementsByClassName("star");
   list = [].slice.call(list); 

   return list.indexOf(star);
}