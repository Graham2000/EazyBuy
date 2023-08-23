// Generate number of stars for each customer review

for (let i = 0; i < stars; i++) {
    let cs = document.getElementById('star').cloneNode(true);
    cs.style.display = "block";
    document.getElementsByClassName('starContainer')[reviewCount].appendChild(cs);
}
