<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only BootStrap-->   
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">   -->


        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="baseDeDonnees.css">
        <link rel="shortcut icon" type="image/png" href="../assets/img/Logo-sans-texte.svg"/>
    
        <title>LRC Voyage - Base de Données</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<!-- Config DATATABLES https://datatables.net/download/ -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/r-2.2.9/sb-1.2.1/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/r-2.2.9/sb-1.2.1/datatables.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">



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
                <a href="../renseignement/renseignement.html"><svg class="icone" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>Renseignements</a>
                <a class="navactive"  href="index.php"><svg class="icone" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>Base de données</a>


            </div>
          </div>
    </header>

    <!-- Gestion connection Session -->
    
    <div class="connexion">
                <?php if ($_SESSION['role'] == 'utilisateur') : ?> 
                    <a href="logout.php" class="btn session1">Utilisateur</a> 

                    <?php elseif ($_SESSION['role'] == 'admin') : ?> 
                        <a href="logout.php" class="btn session1">Administrateur</a>   

                    <?php elseif ($_SESSION['role'] == 'visiteur') : ?> 
                        <a href="logout.php" class="btn session1">Visiteur</a>   
                    
                <?php endif ?>  

                <a href="reset-password.php" class="btn session2">Réinitialiser mot de passe</a>
                <a href="logout.php" class="btn session3">Déconnectez-vous</a> 
            </div>

<!-- Tableau Fabrice -->

<script type="text/javascript">

$(document).ready(function() {

    // Tableau fait à la main
    $(function() {
        $.ajax({
            type: 'GET', // GET pour récupérer les données | POST pour pousser les données
            url: 'data.php',
            success: function(data) {
                    
                var arrayData = JSON.parse(data);
              
            console.log(arrayData);
                // Boucle jQuery sur le tableau de données tabUser
                $.each(arrayData, function(index, data) {

                    console.log('index :' + index);
                    console.log(data.id); // log les ids
                    console.log(data.email); // log les emails ...


                    // HTML à construire

                    $('.tab').append("<tr><td>" + data.id + "</td><td>" + data.nom + "</td><td>" + data.prenom + "</td><td>" + data.age + "</td><td>" + data.ville + "</td><td>" + data.email + "</td><td>" + data.telephone + "</td><td>" + data.message <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'utilisateur')  : ?> + "</td> <td><button data-id='" + data.id + "' data-nom='" + data.nom + "' data-prenom='" + data.prenom  + "' data-age='" + data.age  + "' data-ville='" + data.ville + "' data-email='" + data.email + "' data-telephone='" + data.telephone  + "' data-message='" + data.message + "' class='btn edit' data-toggle='modal' data-target='#editionModal'>EDITION</button></td></tr>" <?php endif ?>);


                });

            }
        });
    });


    // Traitement Edition
        // $(".edit").click(function() {
        //     console.log('test id: ' + $(this).attr('data-id').val());
        // }); => ATTENTION ! Ne fonctionne pas car les buttons sont créés dynamiquement

        $(document).on('click', '.edit', function() {

        // console.log('test id: ' + $(this).data('id'));
        $('.deleteBtn').show();
        $('.submitBtn').show();
        $('.addBtn').hide();

        $('.editionModal').modal({
            keyboard: false
        })
        $('#nom').val($(this).data('nom'));
        $('#prenom').val($(this).data('prenom'));
        $('#age').val($(this).data('age'));
        $('#ville').val($(this).data('ville'));
        $('#email').val($(this).data('email'));
        $('#telephone').val($(this).data('telephone'));
        $('#message').val($(this).data('message'));
        $('#id_r').val($(this).data('id'));

    });

    // Gestion du formulaire de modif
    
            // Gestion du profil. Modification uniquement pour l'Admin
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    $(".submitBtn").click(function(e) {
                        // alert('toto'); On vérifie si on passe bien dans l'event click
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                        var form = $("#formEdition");

                        $.ajax({
                            type: "post",
                            url: 'edit.php',
                            data: form.serialize(), // serializes the form's elements.
                            success: function(data) {
                                console.log(data); // show response from the php script.
                                document.location.reload();
                            }
                        });
                    });

            // Suppression de l'enregistrement
                    $(".deleteBtn").click(function(e) {

                        // alert('toto'); On vérifie si on passe bien dans l'event click
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                        var id_r = $('#id_r').val();
                        $.ajax({
                            type: "POST",
                            url: 'delete.php',
                            data: {
                                id_r: id_r
                            },
                            success: function(data) {
                                console.log(data); // show response from the php script.

                                document.location.reload();
                            }
                        });
                    });

            // Gestion ajout

                    $(".add").click(function(e) {
                        $('.deleteBtn').hide();
                        $('.submitBtn').hide();
                        $('.addBtn').show();
                        $('.editionModal').modal({
                            keyboard: false
                        })
                        $('#nom').val('');
                        $('#prenom').val('');
                        $('#age').val('');
                        $('#ville').val('');
                        $('#email').val('');
                        $('#telephone').val('');
                        $('#message').val('');
                        $('#id_r').val('');
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                    });

            // Formulaire Ajout

                    $(".addBtn").click(function(e) {
                        // alert('toto'); On vérifie si on passe bien dans l'event click
                        e.preventDefault(); // avoid to execute the actual submit of the form.
                        var id_r = $('#id_r').val();
                        $.ajax({
                            type: "POST",
                            url: 'delete.php',
                            data: {
                                id_r: id_r
                            },
                            success: function(data) {
                                console.log(data); // show response from the php script.
                                document.location.reload();
                            }
                        });
                    });


    <?php endif ?>
    // FIN Tableau fait à la main
    // Initialisation DataTables
    // $('#example').DataTable({
    //     "ajax": {
    //         "processing": true,
    //         "url": "data.php"
    //     },
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ],
    //     select: true,
    //     columns: [{
    //             'data': 'id'
    //         },
    //         {
    //             'data': 'nom'
    //         },
    //         {
    //             'data': 'prenom'
    //         },
    //         {
    //             'data': 'email'
    //         },
    //         {
    //             'data': 'pays'
    //         }

    //     ]
    // });
});
</script>

<div class="container" style="margin-top:50px;">
    <!--
    <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>pays</th>

            </tr>
        </thead>
    </table>
    <br />
    <br /> -->

    <!-- Tableau Manuel -->
    <table id="manuel" class="table table-hover table-dark" style="width:100%;margin-top:20px;">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>prenom</th>
                <th>Âge</th>
                <th>Ville</th>
                <th>Mail</th>
                <th>Téléphone</th>
                <th>Message</th>
                    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'utilisateur')  : ?>
                        <th>Edition</th>
                     <?php endif ?>

            </tr>
        </thead>
        <tbody class="tab">
            <!-- Alimenté depuis ajax -->
        </tbody>
    </table>

    <!-- Modal d'édition-->
    <div class="editionModal modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulaire Edition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Edition</p>
                    <form id="formEdition">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nh" placeholder="Un nom...">
                            <small id="nh" class="form-text text-muted">Info nom</small>

                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="ph" placeholder="Un prénom...">
                            <small id="ph" class="form-text text-muted">Info prenom</small>

                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp" placeholder="Un âge...">
                            <small id="emailHelp" class="form-text text-muted">Info age</small>

                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" aria-describedby="emailHelp" placeholder="Une ville...">
                            <small id="emailHelp" class="form-text text-muted">Info ville</small>

                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Une adresse mail...">
                            <small id="emailHelp" class="form-text text-muted">Info adresse mail</small>

                            <label for="telephone">Telehone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" aria-describedby="ph" placeholder="Un téléphone...">
                            <small id="ph" class="form-text text-muted">Info téléphone</small>

                            <label for="message"> Message</label>
                            <input type="text" class="form-control" id="message" name="message" aria-describedby="emailHelp" placeholder="Un message...">
                            <small id="emailHelp" class="form-text text-muted">Info message</small>

                            <input id="id_r" name="id_r" type="hidden" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <?php if ($_SESSION['role'] == 'admin')  : ?>  
                        <button type="submit" class="submitBtn btn btn-success">Valider</button>
                        <button type="submit" class="addBtn btn btn-info">Enregistrer</button>
                        <button type="button" class="deleteBtn btn btn-warning">Supprimer</button>
                    <?php endif ?> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>