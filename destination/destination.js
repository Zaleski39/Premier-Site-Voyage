
// Scroll To Top

            //Get the button:
            mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }




            
// Animation texte


const txtAnim = document.querySelector ('h2');

new Typewriter(txtAnim, {
    // deleteSpeed : 0            
})
.changeDelay (50)
.typeString('Nos conseils de voyage : ')
.pauseFor (1000)
.typeString ('<strong>Cambodge </strong>')
.pauseFor (2000)
.deleteChars (9)
.typeString ('<strong>Italie </strong>')
.pauseFor (2000)
.deleteChars (7)
.typeString ('<strong>Alpes </strong>')
.pauseFor (2000)
.deleteChars (6)
.typeString ('<strong>Majorque </strong>')
.pauseFor (2000)
.deleteChars (9)
.typeString ('<strong>Jura </strong>')
.pauseFor (2000)
.deleteChars (5)
.typeString ('<strong>Amsterdam </strong>')
.pauseFor (2000)
.deleteChars (10)
.start ()

var app = document.getElementById('app');

var typewriter = new Typewriter(app, {
loop: true
});



