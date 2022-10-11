const toggleSwitch = document.querySelector(
  '.theme-switch input[type="checkbox"]'
);

toggleSwitch.addEventListener("change", function (e) {
  if (e.target.checked) {
    document.documentElement.setAttribute("data-theme", "dark");
    localStorage.setItem("theme", "dark");
  } else {
    document.documentElement.setAttribute("data-theme", "light");
    localStorage.setItem("theme", "light");
  }
});

let currentTheme = localStorage.getItem("theme");

if (currentTheme != null) {
  document.documentElement.setAttribute("data-theme", currentTheme);
  if (currentTheme == "dark") {
    toggleSwitch.checked = "true";
  }
}

// const name = document.getElementById('name');
// const email = document.getElementById('email');
// const message = document.getElementById('message');
// const contactForm = document.getElementById('contact-form');
// const errorElement = document.getElementById('error');
// const successMsg = document.getElementById('success-msg');
// const submitBtn = document.getElementById('submit');

// const validate = (e) => {
//   e.preventDefault();

//   if (name.value.length < 3) {
//     errorElement.innerHTML = 'Votre nom doit comporter au moins 3 caractères.';
//     return false;
//   }

//   if (!(email.value.includes('.') && (email.value.includes('@')))) {
//     errorElement.innerHTML = "Veuillez écrire une adresse email valide.";
//     return false;
//   }

//   if (!emailIsValid(email.value)) {
//     errorElement.innerHTML = "Veuillez écrire une adresse email valide.";
//     return false;
//   }

//   if (message.value.length < 10) {
//     errorElement.innerHTML = "Veuillez écrire un message plus long.";
//     return false;
//   }

//   errorElement.innerHTML = '';
//   successMsg.innerHTML = 'Merci! Nous reviendrons vers vous dans les plus brefs délais.';

//   e.preventDefault();
//   setTimeout(function () {
//     successMsg.innerHTML = '';
//     document.getElementById('contact-form').reset();
//   }, 3000);

//   return true;

// }

// const emailIsValid = email => {
//   return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
// }

// submitBtn.addEventListener('click', validate);
