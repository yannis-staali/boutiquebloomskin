const menuBtn = document.querySelector('.menu-btn');
// const hamburger = document.querySelector('.menu-btn_burger');

const nav = document.querySelector('.header_nav');
const title = document.querySelector('.header_title');


let menuOpen = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu(){
    if(!menuOpen){
        menuBtn.classList.add('open');
        nav.classList.add('open');
        title.classList.add('open');

        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        nav.classList.remove('open');
        title.classList.remove('open');

        menuOpen = false;
    }
}

// function openMenu() {
//     document.getElementsByClassName("produits_filtres_types_dropdown").classList.toggle("active");
// }

// document.getElementsByClassName("produits_filtres--types").addEventListener("click", openMenu);

const filtresTypes = document.querySelector('.produits_filtres--types');
const typesDrop = document.querySelector('.produits_filtres_types_dropdown');

let DropOpen = false;

filtresTypes.addEventListener("click", dropDownMenu);

function dropDownMenu() {
    if(!DropOpen){
        typesDrop.classList.add('active');

        DropOpen = true;
    } else {
        typesDrop.classList.remove('active');

        DropOpen = false;
    }
}

const filtresRegions = document.querySelector('.produits_filtres--regions');
const regionDrop = document.querySelector('.produits_filtres_regions_dropdown');

let DropOpenRegion = false;

filtresRegions.addEventListener("click", dropDownMenuRegion);

function dropDownMenuRegion() {
    if(!DropOpenRegion){
        regionDrop.classList.add('active');

        DropOpenRegion = true;
    } else {
        regionDrop.classList.remove('active');

        DropOpenRegion = false;
    }
}