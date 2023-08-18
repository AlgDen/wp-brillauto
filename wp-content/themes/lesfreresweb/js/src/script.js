var faqItems = document.getElementsByClassName('faq__item');

for (var i = 0; i < faqItems.length; i++) {
  faqItems[i].onclick = function () {
    this.classList.toggle('faq__item--active');
  };
}


var map = L.map('map', {
  center: [47.21701644857339, -1.5551846587943043],
  zoom: 12,
  title: 'test',
});
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([47.21701644857339, -1.5551846587943043], {
  title: "Nous travaillons sur Nantes et alentours",
  direction: "center"

}).addTo(map);
marker.bindPopup("<b>BrillAuto - Lavage Auto Intérieur</b>").openPopup();

// Sélectionnez le checkbox et la classe navbot
const checkbox = document.querySelector('.navtop__checkbox');
const navbot = document.querySelector('.navbot');
const logo = document.querySelector('.navtop__logo');
const body = document.querySelector('body');

// Écoutez l'événement de changement d'état du checkbox
checkbox.addEventListener('change', function () {
  navbot.classList.toggle('navbot--active');

  if (this.checked) {
    logo.style.visibility = 'hidden';
    body.style.overflowY = 'hidden';
  } else {
    logo.style.visibility = 'visible';
    body.style.overflowY = 'auto';

  }

});

const formules = document.querySelector('.navbot__item--formules .navbot__link');
const menuChild = document.querySelector('.navbot__child-list');

formules.addEventListener('click', function () {
  menuChild.classList.toggle('navbot__child-list--active')
});