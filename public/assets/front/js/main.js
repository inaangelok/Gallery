let photos = document.getElementsByClassName('photo-block');
let nextbtn = document.getElementById('nextpaginate');
let prevbtn = document.getElementById('prevpaginate');

let x = 0;
let y = 3;

for (let i = 0; i < photos.length; i++) {
    photos[i].style.display = 'none';
}
for (let i = 0; i < 4; i++) {
    photos[i].style.display = 'block';
}
prevbtn.style.display = 'none';
nextbtn.style.display = 'block';


function paginate(n) {
    x += n;
    y += n;

    console.log('x=' + x);
    console.log('y=' + y);

    for (let i = 0; i < photos.length; i++) {
        photos[i].style.display = 'none';
    }

    if (y >= photos.length - 1) {
        nextbtn.style.display = 'none';
    }

    if (x == 0) {
        prevbtn.style.display = 'none';

    }
    if (x > 0) {
        prevbtn.style.display = 'block';
    }
    if (y < photos.length - 1) {
        nextbtn.style.display = 'block';
    }
    for (let i = x; i <= y; i++) {
        photos[i].style.display = 'block';
    }


}


"use strict";
function dragNdrop(event) {
    var fileName = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("preview");
    var previewImg = document.createElement("img");
    previewImg.setAttribute("src", fileName);
    preview.innerHTML = "";
    preview.appendChild(previewImg);
}
function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
}
function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
}