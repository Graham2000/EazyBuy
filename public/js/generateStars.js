// Generate number of stars for each customer review

let starContainer = document.getElementById('starContainer');
let star = document.getElementById('star');

for (let i = 0; i < stars; i++) {
    let cs = star.cloneNode(true);
    cs.style.display = "block";
    starContainer.appendChild(cs);
}
