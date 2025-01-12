<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only BootStrap-->   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  


    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../renseignement/renseignement.css">
    <link rel="shortcut icon" type="image/png" href="../assets/img/Logo-sans-texte.svg"/>
   
    <title>LRC Voyage - Renseignement</title>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F2N957RW0H"></script>

    <!-- Lien JavaScript -->
    <script async src="renseignement.js"></script>


</head>
<body>
    <header>
        <div class="navbare">
            <div class="navcentrer">
                <a title="Accueil" id="navbare-logo-lien" href="../accueil/accueil.html"><img class="navbare-logo" src="../assets/img/Logo-sans-texte.svg" alt="" ></a>
                <a href="../accueil/accueil.html"><svg class="icone" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg> Accueil</a>
                <a href="../destination/destination.html"><svg class="icone" width="24" height="18" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M20 18v2h-20v-2h20zm-19.989-6.426l2.624-1.5 4.765 1.815s9.197-5.519 11.773-7.038c2.226-1.312 4.268-.853 4.647-.216.448.753.131 2.366-2.576 4.09-2.166 1.38-9.233 5.855-9.233 5.855-4.969 2.708-7.565.657-7.565.657l-4.435-3.663zm5.587-6.621l-2.598 1.5 6.252 3.173 5.388-3.227-9.042-1.446z"/></svg> Destinations</a>
                <a href="../circuits/circuit.html"><svg class="icone" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M7.488 24h-.001c-.266 0-.487-.216-.487-.487v-.513c-1.104 0-2-.896-2-2v-13c0-1.104.896-2 2-2h2v-5c0-.552.448-1 1-1h4c.552 0 1 .448 1 1v5h2c1.105 0 2 .896 2 2v13c0 1.104-.895 2-2 2v.488c0 .283-.228.512-.512.512h-.001c-.265 0-.487-.214-.487-.487v-.513h-8v.488c0 .283-.229.512-.512.512zm9.012-13c.277 0 .5-.224.5-.5s-.223-.5-.5-.5h-9c-.276 0-.5.224-.5.5s.224.5.5.5h.507c-.072 1.037.389 1.936.996 2.352l-.003 1.476 3.529 3.543 2.834-2.823-3.529-3.542-1.289-.003c-.124-.364-.335-.721-.578-1.003h6.533zm-4.851 3.271l1.821 1.821-.354.353-1.821-1.82.354-.354zm.683 1.744l-.353.354-1.214-1.214.354-.353 1.213 1.213zm-.153-2.274l1.821 1.821-.354.353-1.82-1.821.353-.353zm-1.572-.726c-.102.283-.331.462-.606.539.042.416.551.6.85.303.279-.276.142-.754-.244-.842zm-1.361-2.015c.334.257.614.638.763 1.002l-1.003-.002-.001.682-.018-.022c-.332-.401-.529-.99-.477-1.66h.736zm4.254-9h-3c-.276 0-.5.224-.5.5v3.5h4v-3.5c0-.276-.224-.5-.5-.5z"/></svg> Circuits</a>
                <a href="../croisiere/croisiere.html"><svg class="icone" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M4.069 13h-4.069v-2h4.069c-.041.328-.069.661-.069 1s.028.672.069 1zm3.034-7.312l-2.881-2.881-1.414 1.414 2.881 2.881c.411-.529.885-1.003 1.414-1.414zm11.209 1.414l2.881-2.881-1.414-1.414-2.881 2.881c.528.411 1.002.886 1.414 1.414zm-6.312-3.102c.339 0 .672.028 1 .069v-4.069h-2v4.069c.328-.041.661-.069 1-.069zm0 16c-.339 0-.672-.028-1-.069v4.069h2v-4.069c-.328.041-.661.069-1 .069zm7.931-9c.041.328.069.661.069 1s-.028.672-.069 1h4.069v-2h-4.069zm-3.033 7.312l2.88 2.88 1.415-1.414-2.88-2.88c-.412.528-.886 1.002-1.415 1.414zm-11.21-1.415l-2.88 2.88 1.414 1.414 2.88-2.88c-.528-.411-1.003-.885-1.414-1.414zm2.312-4.897c0 2.206 1.794 4 4 4s4-1.794 4-4-1.794-4-4-4-4 1.794-4 4zm10 0c0 3.314-2.686 6-6 6s-6-2.686-6-6 2.686-6 6-6 6 2.686 6 6z"/></svg> Croisières</a>
                <a class="navactive"  href="../renseignement/renseignement.html"><svg class="icone" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>Renseignements</a>
                
            </div>
          </div>
    </header>

    

    <div class="container-fluid contact1">
    <!-- Destination 1 2 & 3 -->
    <div class="row">
      <div class="col-12 col-md-8 p-0 m-0">
          <img class="contact--photo" src="../assets/img/Merci.jpg" alt="" >
      </div>
      
  
      <div class="col-12 col-md-4">
          <div class="reponseAuto--text">

     

          <h1 class="reponseAuto--text--paragraphe">     
                  <?php
                    echo "<strong>".$_GET['prenom']."</strong>,
                    <br>nous reviendrons vers vous 
                    dans les plus brefs délais pour répondre 
                    à votre demande.";
                  ?>
          </h1>
        </div>


      </div>
    </div>
  </div>


<!-- Footer -->
    <footer>
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="footer-info">
                            <svg class="footer-icone" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M12 0c-3.148 0-6 2.553-6 5.702 0 4.682 4.783 5.177 6 12.298 1.217-7.121 6-7.616 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm12 16l-6.707-2.427-5.293 2.427-5.581-2.427-6.419 2.427 4-9 3.96-1.584c.38.516.741 1.08 1.061 1.729l-3.523 1.41-1.725 3.88 2.672-1.01 1.506-2.687-.635 3.044 4.189 1.789.495-2.021.465 2.024 4.15-1.89-.618-3.033 1.572 2.896 2.732.989-1.739-3.978-3.581-1.415c.319-.65.681-1.215 1.062-1.731l4.021 1.588 3.936 9z"/></svg>
                            <p>Ambérieu en Bugey</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-info">
                            <svg class="footer-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>
                            <p>XX XX XX XX XX</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="footer-info">
                            <svg class="footer-icone" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>
                            <p>contact@LRCvoyages.com</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-info">
                            <svg class="footer-icone" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
                            <p>LRC voyages</p>
                        </div>
                    </div>
                </div>
            </div>
           
          
        </div>
    </footer>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    <!-- Balise pour validation Plugin jQuerry -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</body>



</html>