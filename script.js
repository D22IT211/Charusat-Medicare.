
let menu = document.querySelector('#menu-btn');
let home = document.querySelector('.Home');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

home.onclick = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}


function openFunction(){
  document.getElementById("menu").style.width="300px";
  document.getElementById("mainbox").style.marginLeft="300px";
  document.getElementById("mainbox").innerHTML="";
}
function closeFunction(){
 document.getElementById("menu").style.width="0px";
 document.getElementById("mainbox").style.marginLeft="0px";
 document.getElementById("mainbox").innerHTML="&#9776;";
}

const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
	document.body.classList.toggle('dark');
}); 