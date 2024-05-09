// //
// const surat = document.getElementById('surat')
// // surat.style.fontSize = '50px'

// const coba = document.createElement("h6")
// coba.innerHTML = "inda riska"

// surat.append(coba)
// console.log(coba)

// // getElementId
// // getElementClassName
// // َquerySelector(".right .nav h3")
// // َquerySelectorAll(".right .nav h3")

// //
// surat.addEventListener("click", ()=>{
//     surat.style.color = "red"
//     alert("hgfr")
// })

// const data = [
//     ["Inda", 'Surat Cinta', '20 April 2024'],
//     ["Riska", 'Surat Cinta', '20 April 2024'],
//     ["Uswatun", 'Surat Cinta', '20 April 2024'],
//     ["Nisa", 'Surat Cinta', '20 April 2024'],
// ]

// const box = document.getElementById("box")

// data.map((e)=>{
//     box.innerHTML += `<div class="menu1">
//     <div class="User">
//         <img src="img/Ellipse.png" alt="">
//         <p>${e[0]}</p>
//     </div>
//     <img src="img/word.png" alt="">
//     <h3>${e[1]}</h3>
//     <h4>${e[2]}</h4>
// </div>`
// })

const sin = document.getElementById("sin");
const sout = document.getElementById("sout");
const suratmasuk = document.getElementById("suratmasuk");
const suratkeluar = document.getElementById("suratkeluar");

let des = "";
sin.style.display = "none";

sin.addEventListener("click", () => {
  suratmasuk.style.display = "block";
  suratkeluar.style.display = "none";
  sin.style.display = "none";
  sout.style.display = "block";
});
sout.addEventListener("click", () => {
  suratkeluar.style.display = "block";
  suratmasuk.style.display = "none";
  sin.style.display = "block";
  sout.style.display = "none";
});

// if (suratmasuk.style.display === "block") {
//   sin.style.display = "none";
// } else if (suratkeluar.style.display === "block") {
//   sout.style.display = "none";
// }
