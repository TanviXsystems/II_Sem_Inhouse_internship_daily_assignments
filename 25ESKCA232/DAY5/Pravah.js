const menuBtn = document.querySelector(".menu-btn");
const navLinks = document.querySelector(".nav-links");

menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

const modal = document.getElementById("eventModal");
const modalBody = document.getElementById("modalBody");

const eventDetails = {

"Byte Chase":{
fee:"₹200",
time:"Day 1 | 12:30 PM - 2:00 PM",
venue:"Computer Lab 1",
description:"Coding treasure hunt consisting of algorithmic puzzles, debugging rounds and programming checkpoints."
},

"IEEE-E Summit":{
fee:"₹250",
time:"Day 1 | 10:00 AM - 12:00 PM",
venue:"Seminar Hall",
description:"Technical summit organized with IEEE featuring innovation talks and competitions."
},

"V Stock Market":{
fee:"₹200",
time:"Day 2 | 10:00 AM - 11:30 AM",
venue:"MBA Block",
description:"Virtual stock trading simulation."
},

"Typing Titans":{
fee:"₹100",
time:"Day 2 | 11:30 AM - 12:30 PM",
venue:"Computer Lab",
description:"Typing speed championship."
},

"Coding League":{
fee:"₹250",
time:"Day 2 | 10:00 AM - 12:00 PM",
venue:"Lab 2",
description:"Competitive coding contest."
},

"Joist Kwik":{
fee:"₹150",
time:"Day 2 | 1:00 PM - 2:00 PM",
venue:"Civil Lab",
description:"Civil engineering practical challenge."
},

"Bell The Cat":{
fee:"₹150",
time:"Day 2 | 2:00 PM - 3:00 PM",
venue:"Mechanical Block",
description:"Engineering puzzle event."
},

"Astrohunt":{
fee:"₹200",
time:"Day 3 | 10:00 AM - 11:30 AM",
venue:"Physics Block",
description:"Space themed treasure hunt."
},

"EV Brain Rush":{
fee:"₹150",
time:"Day 3 | 12:00 PM - 1:00 PM",
venue:"EEE Block",
description:"Quiz based on electric vehicles."
},

"Knock The Gate":{
fee:"₹200",
time:"Day 3 | 2:00 PM - 3:30 PM",
venue:"Mechanical Lab",
description:"Mechanical engineering challenge."
},

"Crack The Circuit":{
fee:"₹250",
time:"Day 4 | 10:00 AM - 12:00 PM",
venue:"ECE Lab",
description:"Circuit designing and troubleshooting."
},

"WEBATHON":{
fee:"₹300",
time:"Day 4 | 12:30 PM - 2:30 PM",
venue:"Computer Lab",
description:"Web development marathon."
},

"SMART SHOPPING":{
fee:"₹150",
time:"Day 4 | 3:00 PM - 4:00 PM",
venue:"MBA Hall",
description:"Budget planning competition."
},

"Tech Talk":{
fee:"₹100",
time:"Day 4 | 4:30 PM - 5:30 PM",
venue:"Seminar Hall",
description:"Technical presentation competition."
},

"Syntax Scavenger":{
fee:"₹150",
time:"Day 5 | 10:00 AM - 11:30 AM",
venue:"Lab 4",
description:"Programming scavenger hunt."
},

"Robo Rush":{
fee:"₹300",
time:"Day 1 | 10:00 AM - 12:00 PM",
venue:"Main Ground",
description:"Autonomous robot race."
},

"Drone Race":{
fee:"₹400",
time:"Day 2 | 11:00 AM - 1:00 PM",
venue:"Sports Ground",
description:"Drone racing championship."
},

"Startup Expo":{
fee:"₹500",
time:"Day 5 | 10:00 AM - 12:00 PM",
venue:"Auditorium",
description:"Startup exhibition and pitching."
},

"Robo Soccer":{
fee:"₹350",
time:"Day 5 | 2:00 PM - 4:00 PM",
venue:"Football Ground",
description:"Robot football competition."
}
 
,

"Murder Mystery":{
fee:"₹200",
time:"Day 1 | 2:30 PM - 4:00 PM",
venue:"Conference Hall",
description:"Solve clues, interrogate suspects and uncover the murderer before time runs out."
},

"Horcrux Hunt":{
fee:"₹150",
time:"Day 3 | 12:00 PM - 1:30 PM",
venue:"Entire Campus",
description:"A magical treasure hunt spread across the campus."
},

"Fusion Without Flames":{
fee:"₹200",
time:"Day 2 | 11:00 AM - 12:30 PM",
venue:"Food Court",
description:"Prepare innovative dishes without using fire."
},

"Quizathon":{
fee:"₹150",
time:"Day 2 | 2:00 PM - 3:30 PM",
venue:"Seminar Hall",
description:"Multi-round quiz competition."
},

"Designfinity":{
fee:"₹200",
time:"Day 3 | 11:00 AM - 1:00 PM",
venue:"Design Lab",
description:"Graphic designing and poster making competition."
},

"Taare Zameen Par":{
fee:"₹100",
time:"Day 3 | 3:00 PM - 4:00 PM",
venue:"Art Room",
description:"Creative imagination and artistic expression."
},

"Squid Game":{
fee:"₹250",
time:"Day 2 | 3:30 PM - 5:00 PM",
venue:"Sports Ground",
description:"Series of survival-inspired games."
},

"Scream & Win":{
fee:"₹100",
time:"Day 4 | 2:00 PM - 3:00 PM",
venue:"Open Arena",
description:"Fun games full of laughter and excitement."
},

"Escape Room":{
fee:"₹250",
time:"Day 4 | 12:00 PM - 1:30 PM",
venue:"Innovation Lab",
description:"Escape before the countdown ends by solving puzzles."
},

"SKIT Roadies":{
fee:"₹200",
time:"Day 5 | 11:00 AM - 1:00 PM",
venue:"College Ground",
description:"Adventure, stamina and obstacle challenge."
},

"IPL Auction":{
fee:"₹150",
time:"Day 5 | 12:00 PM - 2:00 PM",
venue:"MBA Hall",
description:"Create your dream cricket team through live bidding."
},

"Real Life Among Us":{
fee:"₹200",
time:"Day 5 | 2:30 PM - 4:00 PM",
venue:"Campus",
description:"Find the impostor before everyone gets eliminated."
},

"AD Flix":{
fee:"₹150",
time:"Day 3 | 1:30 PM - 3:00 PM",
venue:"Media Lab",
description:"Advertisement creation and marketing challenge."
},

"Hands On Art":{
fee:"₹100",
time:"Day 4 | 11:00 AM - 12:30 PM",
venue:"Fine Arts Room",
description:"Painting and creative artwork competition."
},

"Silent DJ":{
fee:"₹300",
time:"Day 5 | 7:00 PM - 9:00 PM",
venue:"Main Lawn",
description:"Dance with wireless headphones under the stars."
},

"Rasaverse":{
fee:"₹300",
time:"Day 4 | 3:00 PM - 5:00 PM",
venue:"Main Stage",
description:"Inter-college dance championship."
},

"Raparazzi":{
fee:"₹250",
time:"Day 4 | 5:30 PM - 7:00 PM",
venue:"Open Stage",
description:"Rap battle competition."
},

"Sur":{
fee:"₹200",
time:"Day 1 | 5:00 PM - 7:00 PM",
venue:"Auditorium",
description:"Solo singing competition."
},

"Rawaz":{
fee:"₹300",
time:"Day 2 | 6:00 PM - 8:00 PM",
venue:"Main Stage",
description:"Battle of Bands."
},

"Street Warz":{
fee:"₹250",
time:"Day 3 | 2:00 PM - 4:00 PM",
venue:"Open Arena",
description:"Street dance showdown."
}

,

"Abhivyakti":{
fee:"₹200",
time:"Day 2 | 4:00 PM - 6:00 PM",
venue:"Auditorium",
description:"Drama and theatrical performance competition."
},

"Rang":{
fee:"₹150",
time:"Day 3 | 11:00 AM - 1:00 PM",
venue:"Art Gallery",
description:"Painting and sketching competition."
},

"Thirak":{
fee:"₹300",
time:"Day 2 | 5:00 PM - 7:00 PM",
venue:"Main Stage",
description:"Group dance competition."
},

"Persona Show":{
fee:"₹100",
time:"Day 5 | 3:00 PM - 4:30 PM",
venue:"Seminar Hall",
description:"Toastmasters personality showcase."
},

"Debate":{
fee:"₹100",
time:"Day 3 | 5:00 PM - 6:30 PM",
venue:"Seminar Hall",
description:"Inter-college debate competition."
},

"Toggle":{
fee:"₹100",
time:"Day 4 | 10:00 AM - 11:00 AM",
venue:"Room 205",
description:"Creative thinking and problem-solving event."
},

"Spelling Bee":{
fee:"₹100",
time:"Day 2 | 10:00 AM - 11:00 AM",
venue:"Library",
description:"Vocabulary and spelling championship."
},

"MUN":{
fee:"₹350",
time:"Day 1 | 10:00 AM - 4:00 PM",
venue:"Conference Hall",
description:"Model United Nations conference."
},

"Kavyanjali":{
fee:"₹100",
time:"Day 4 | 4:00 PM - 5:00 PM",
venue:"Open Theatre",
description:"Poetry recitation competition."
},

"Open Mic":{
fee:"₹100",
time:"Day 4 | 6:00 PM - 8:00 PM",
venue:"Open Stage",
description:"Music, poetry and stand-up performances."
},

"Ad-Mania":{
fee:"₹150",
time:"Day 5 | 10:00 AM - 11:30 AM",
venue:"Media Lab",
description:"Advertisement creation challenge."
},

"Umang":{
fee:"₹100",
time:"Day 5 | 10:00 AM - 11:30 AM",
venue:"Community Hall",
description:"Community engagement and social awareness event."
},

"Bhagirath":{
fee:"₹100",
time:"Day 5 | 2:00 PM - 3:30 PM",
venue:"Open Ground",
description:"Environmental awareness initiative."
},

"Lemon Race":{
fee:"₹50",
time:"Day 1 | 11:00 AM - 12:00 PM",
venue:"Sports Ground",
description:"Classic lemon and spoon race."
},

"Cart Race":{
fee:"₹50",
time:"Day 1 | 12:30 PM - 1:30 PM",
venue:"Sports Ground",
description:"Childhood cart racing competition."
},

"Sack Race":{
fee:"₹50",
time:"Day 1 | 2:00 PM - 3:00 PM",
venue:"Sports Ground",
description:"Traditional sack race."
},

"3 Legged Race":{
fee:"₹50",
time:"Day 2 | 10:00 AM - 11:00 AM",
venue:"Sports Ground",
description:"Three-legged team race."
},

"Musical Chair":{
fee:"₹50",
time:"Day 2 | 12:00 PM - 1:00 PM",
venue:"Central Lawn",
description:"Classic musical chairs."
},

"Jenga":{
fee:"₹50",
time:"Day 2 | 2:00 PM - 3:00 PM",
venue:"Indoor Games Hall",
description:"Tower stacking competition."
},

"Snake & Ladder":{
fee:"₹50",
time:"Day 3 | 10:00 AM - 11:00 AM",
venue:"Indoor Games Hall",
description:"Life-size Snake & Ladder challenge."
},

"Book Balance Race":{
fee:"₹50",
time:"Day 3 | 12:00 PM - 1:00 PM",
venue:"Sports Ground",
description:"Balance books while racing."
},

"Lazy Cycling":{
fee:"₹50",
time:"Day 3 | 3:00 PM - 4:00 PM",
venue:"Cycling Track",
description:"The slowest cyclist without touching the ground wins."
}

};
```
```


function openModal(eventName){

    const event = eventDetails[eventName];

    if(!event){

        modalBody.innerHTML = `

            <h2>${eventName}</h2>

            <p>Details will be available soon.</p>

        `;

    }

    else{

        modalBody.innerHTML = `

            <h2>${eventName}</h2>

            <hr>

            <p><strong>Registration Fee :</strong> ${event.fee}</p>

            <p><strong>Time :</strong> ${event.time}</p>

            <p><strong>Venue :</strong> ${event.venue}</p>

            <br>

            <p>${event.description}</p>

            <br>

            <button class="register-btn">

                Book Your Spot

            </button>

        `;

    }

    modal.style.display = "flex";

}

function closeModal(){

    modal.style.display = "none";

}

window.addEventListener("click",function(e){

    if(e.target===modal){

        closeModal();

    }

});

window.addEventListener("keydown",function(e){

    if(e.key==="Escape"){

        closeModal();

    }

});

function showCategory(category){

    document.querySelectorAll(".event-category").forEach(section=>{

        section.style.display="none";

    });

    const selected=document.getElementById(category);

    if(selected){

        selected.style.display="block";

        selected.scrollIntoView({

            behavior:"smooth",

            block:"start"

        });

    }

}

document.addEventListener("DOMContentLoaded",()=>{

    showCategory("technical");

});

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

    anchor.addEventListener("click",function(e){

        e.preventDefault();

        const target=document.querySelector(this.getAttribute("href"));

        if(target){

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});

window.addEventListener("scroll",()=>{

    const navbar=document.querySelector(".navbar");

    if(window.scrollY>80){

        navbar.classList.add("sticky");

    }

    else{

        navbar.classList.remove("sticky");

    }

});

const observer=new IntersectionObserver(entries=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.classList.add("show");

        }

    });

},

{

    threshold:0.2

});

document.querySelectorAll(".event-card").forEach(card=>{

    observer.observe(card);

});

document.querySelectorAll(".category-card").forEach(card=>{

    observer.observe(card);

});

document.querySelectorAll(".day").forEach(day=>{

    observer.observe(day);

});

const heroTitle=document.querySelector(".hero h1");

window.addEventListener("mousemove",(e)=>{

    const x=(window.innerWidth/2-e.pageX)/40;

    const y=(window.innerHeight/2-e.pageY)/40;

    heroTitle.style.transform=`translate(${x}px,${y}px)`;

});

console.log("PRAVAH'26 Loaded Successfully");



function createParticles(){

    const total=40;

    for(let i=0;i<total;i++){

        const particle=document.createElement("span");

        particle.className="particle";

        particle.style.left=Math.random()*100+"vw";

        particle.style.animationDuration=(8+Math.random()*10)+"s";

        particle.style.animationDelay=(Math.random()*8)+"s";

        particle.style.opacity=Math.random();

        particle.style.transform=`scale(${Math.random()+0.4})`;

        document.body.appendChild(particle);

    }

}

createParticles();

const hero=document.querySelector(".hero");

window.addEventListener("mousemove",(e)=>{

    const x=(window.innerWidth/2-e.clientX)/40;

    const y=(window.innerHeight/2-e.clientY)/40;

    hero.style.backgroundPosition=`calc(50% + ${x}px) calc(50% + ${y}px)`;

});

window.addEventListener("load",()=>{

    document.body.classList.add("loaded");

});

const revealObserver=new IntersectionObserver((entries)=>{

entries.forEach(entry=>{

if(entry.isIntersecting){

entry.target.classList.add("show");

}

});

},

{

threshold:.15

});

document.querySelectorAll(

".fade-up,.fade-left,.fade-right,.category-card,.event-card,.day"

).forEach(el=>{

revealObserver.observe(el);

});

const year=new Date().getFullYear();

const copyright=document.querySelector(".copyright");

if(copyright){

copyright.innerHTML=`© ${year} PRAVAH'26 • All Rights Reserved`;

}

/* ==========================
     FLOATING CANDLES
========================== */
const container = document.getElementById("candles-container");

const candle = document.createElement("img");

candle.src = "candles.png";

candle.style.position = "fixed";

candle.style.left = "200px";

candle.style.top = "200px";

candle.style.width = "60px";

candle.style.zIndex = "9999";

container.appendChild(candle);
