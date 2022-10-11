
// Formulaire contact
$(document).ready(function() {
    $("#basic-form").validate({
      rules: {
        nom : {
          required: true,
          minlength: 3
        },
        prenom : {
          required: true,
          minlength: 3
        },
        age : {
            required: true,
            minlength: 1,
            maxlength: 3
          },
        ville : {
            required: true,
          },
        email: {
          required: true,
          email: true
        },
        telephone: {
            required: true,
            maxlength : 10,
            minlength : 10
          },
        },
      messages : {
        nom: {  
          required:"Merci de compléter votre nom",
          minlength: "Le nom doit comporter au moins 3 caractères"
        },
        prenom: {
          required:"Merci de compléter votre prénom",
          minlength: "Le prénom doit comporter au moins 3 caractères"
        },
        age: {
            required:"Merci de compléter votre âge",
            minlength: "L'âge doit comporter au maximum 3 chiffres"
          },

        ville: {
            required:"Merci de compléter votre ville",
          },
        email: {
          required:"Merci de compléter votre adresse mail",
          email: "L'e-mail doit être au format : abc@domain.com"
        },
        telephone: {
            required:"Merci de compléter votre telephone"
          },
      }
    });
  });
  
  
  