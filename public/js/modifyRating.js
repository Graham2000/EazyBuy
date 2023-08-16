// Update rating based on user input

let emptyStar = document.getElementById('emptyStar');
let rating = document.getElementById('rating');

window.onload = () => {
    emptyStar.style.display = "block";
    emptyStar.classList.add("empty");

    for (let i = 0; i < 4; i++) {
        let e = emptyStar.cloneNode(true);
        rating.appendChild(e);
    }
}

const modifyRating = (e) => {
    if (e.classList.contains("empty")) {
        e.style.color = '#FFDF00';
        e.classList.remove("empty");
    } else {
        e.style.color = '#000';
        e.classList.add("empty");
    }
}