import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger,ScrollToPlugin);

import.meta.glob([
    '../img/**'
]);

let homeAnimation = null;
// let searchAnimation= null;

function animation() {
  return new Promise((resolve) => {
    homeAnimation = gsap.to(".box",2, {
      duration: 4,
      scale: 2,
      y: 60,
      yoyo: true,
      repeat: 1,
      ease: "power1.inOut",
      stagger: {
        amount: 1.5,
        grid: [7, 15],
        axis: "x",
        from: "random"
      },
      onComplete: resolve
    });
  });
}

// let mm = gsap.matchMedia();
// let moveDirection = "max"; // Scrolla verso destra inizialmente

// mm.add("(max-width: 1400px)", () => {

//   // Verifica che l'elemento abbia larghezza sufficiente per scrollare
//   let homeGsap = document.getElementById('home-gsap');
//   if (homeGsap.scrollWidth <= homeGsap.clientWidth) {
//     console.error("Assicurati che #home-gsap sia più largo di #home-background.");
//     return;
//   }

//   // Crea una variabile di animazione GSAP (inizialmente in pausa)
//   let autoScroll = gsap.to("#home-gsap", {
//     duration: 50,
//     scrollTo: { x: moveDirection },
//     ease: "none",
//   });

//   // Avvia l'animazione di auto scroll
//   autoScroll.play();

//   // Usa ScrollTrigger.observe per rilevare l'interazione dell'utente
//   ScrollTrigger.observe({
//     type: "wheel,scroll",
//     onWheel: (self) => {
//       // Quando l'utente interagisce con lo scroll, ferma l'auto scroll
//       autoScroll.pause();
//     },
//     onStop: (self) => {
//       // Cambia la direzione in base al movimento dell'utente
//       if (self.deltaX < 0) {
//         moveDirection = 0; // Scrolla a sinistra
//       } else {
//         moveDirection = "max"; // Scrolla a destra
//       }

//       // Riavvia l'auto scroll una volta che l'utente si ferma
//       autoScroll = gsap.to("#home-gsap", { 
//         duration: 50, 
//         scrollTo: { x: moveDirection }, 
//         ease: "none" 
//       });
//       autoScroll.play(); // Riprendi lo scroll automatico
//     },
//     onStopDelay: 0.25 // Imposta un breve ritardo prima di riprendere lo scroll
//   });
// });

// // Chiude matchMedia
// mm.revert();


// function animationSearch() {
//   return new Promise((resolve) => {
//     searchAnimation = gsap.to(".search", {
//       duration: 2,
//       scale: 3,
//       y: 60,
//       yoyo: false,
//       repeat: 0,
//       onComplete: resolve
//     });
//   });
// }

// document.getElementById("cerca").addEventListener("click", getHero);

// async function getHero() {
//   const hero = document.getElementById("hero").value;
//   const inputs = document.querySelectorAll("#home-gsap div input"); // Seleziona tutti gli input
//   const foundDiv = Array.from(inputs).find(input => input.value.toLowerCase() === hero.toLowerCase())?.parentElement;

//   if (hero && foundDiv) {
//     const elementis = document.querySelectorAll("#home-gsap div");

//     if (homeAnimation) {
//       homeAnimation.progress(0).kill();
//       elementis.forEach(element => {
//         element.classList.remove('box', 'z-2','opacity-100');
//       }); 
//     }
//     if (searchAnimation) {
//       searchAnimation.progress(0).kill();
//       elementis.forEach(element => {
//         element.classList.remove('search', 'z-2','opacity-100');
//       }); 
//     }
    
//     foundDiv.classList.add('search', 'z-2','opacity-100');
//     await animationSearch();

//   }
// }


async function getBox() {
  let elementoCasuale = []; 
  const elementi = document.querySelectorAll("#home-gsap div");


  for (let i = 0; i < elementi.length; i++) {
    let index = Math.floor(Math.random() * elementi.length);
    let randomElement = elementi[index];


    if (!elementoCasuale.includes(randomElement) &&
      (index === 0 || !elementoCasuale.includes(elementi[index - 1])) &&
      (index <= 24 || (!elementoCasuale.includes(elementi[index - 24]) && !elementoCasuale.includes(elementi[index - 25]) && !elementoCasuale.includes(elementi[index - 26]))) &&
      (index === elementi.length - 1 || !elementoCasuale.includes(elementi[index + 1])) &&
      (index > elementi.length - 25 || (!elementoCasuale.includes(elementi[index + 24]) && !elementoCasuale.includes(elementi[index + 25]) && !elementoCasuale.includes(elementi[index + 26])))
    ) {
      elementoCasuale.push(randomElement);
    }
  }

  elementoCasuale.forEach(element => {
    element.classList.add('box', 'z-2','opacity-100');
  });

  await animation();

  elementoCasuale.forEach(element => {
    element.classList.remove('box', 'z-2','opacity-100');
  });

  getBox();
}

getBox();
