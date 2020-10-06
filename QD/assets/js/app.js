const tl = gsap.timeline({defaults: {ease :'power1.out'}});

tl.to('.text', {y:'0%', duration: 0.8, stagger: 0.25});
tl.to('.slider', {y:'-100%', duration: 1.5});
tl.to('.intro', {y:'-100%', duration: 1}, "-=0.85");
tl.fromTo('nav', {opacity:0}, {opacity:1, duration: 1.5}, '-=2.5');
tl.fromTo('.big-text', {opacity:0}, {opacity:1, duration: 1.5}, '-=1');
