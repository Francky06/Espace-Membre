const deg = 6;
const hr = document.querySelector('#hr');
const mn = document.querySelector('#mn');
const sec = document.querySelector('#sec');


setInterval(()=> {
let day = new Date();
let hh = day.getHours() * 30;
let mm = day.getMinutes() * deg;
let ss = day.getSeconds() * deg;
hr.style.transform = `rotateZ(${ (hh) + (mm/12) }deg)`;
mn.style.transform = `rotateZ(${mm}deg)`;
sec.style.transform = `rotateZ(${ss}deg)`;



const maintenant = new Date();
const noel = new Date("2020-12-25");
const duree = noel - maintenant;

//1jour = 24 * 60 * 60 * 1000 ms = 86 400 000 ms
let jours = Math.floor(duree / 86400000); 
//temps restant en ms
let reste = duree % (24 * 60 * 60 * 1000);
//nb heures dans le reste 1h= 3600000ms
let heures = Math.floor(reste / 3600000);
//temps restant apres retrait des heures
reste = reste % (60 * 60 *1000);
let minutes = Math.floor(reste/ (60 * 1000));
reste = reste % (60 * 1000);
let secondes = Math.floor(reste/1000);

document.querySelector('#jours').innerText = jours;
document.querySelector('#heures').innerText = heures;
document.querySelector('#minutes').innerText = minutes;
})


