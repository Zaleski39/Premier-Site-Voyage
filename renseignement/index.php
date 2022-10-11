<?php 

include ('connect.php');

if (isset ($_POST['bouton'])) {

    $errors = '';
    $myemail = 'rigoulot.alex@gmail.com';//<-----Put Your email address here.
    if(
        // empty($_POST['civilite'])  || 
       empty($_POST['nom']) ||
       empty($_POST['prenom']) ||
       empty($_POST['age']) ||
       empty($_POST['ville']) ||
       empty($_POST['email']) ||
       empty($_POST['telephone']) ||
       empty($_POST['message']))
    {
        $errors = "\n Error: all fields are required";
    }
    
    
    // $civilite = $_POST['civilite']; 
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $age = $_POST['age']; 
    $ville = $_POST['ville']; 
    $email = $_POST['email']; 
    $telephone = $_POST['telephone']; 
    $message = $_POST['message'];
   // $messsage = str_replace("'", "\'", $_POST['message']);
 
// Envoyer les données sur base SQL
        
    $query = "INSERT INTO `renseignement` (nom, prenom, age, ville, email, telephone, message, time) VALUES ('$nom', '$prenom', '$age','$ville','$email', '$telephone', '$message', NOW())";
    $result = mysqli_query($connection, $query);

    // var_dump($query,$result);
    // die();

// Envoyer mail
    if( empty($errors)) {
    
        $to = $myemail;
        $email_subject = "Prise de contact de : $nom";
        $email_body = '<html>  
                <body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#ffffff; -webkit-text-size-adjust:none">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                <tr>
                <td align="center" valign="top">
                <table width="700m" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                <tr>
                <td class="td" style="width:700mpx; min-width:700mpx; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; Margin:0">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="1"></td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="50" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="1"></td>
                <td>
                <div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><a href="#" target="_blank"><img src="" border="0" width="173" height="53" alt="" /></a></div>
                </td>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="1"></td>
                </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="35" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td bgcolor="#D24606">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="10" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text1" style="color:#ffffff; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left">Formulaire de contact</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="10" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                </td>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
                <!-- Orange section -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td bgcolor="#0D4E88">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text1" style="color:#ffffff; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left">'.$telephone.' :</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                </td>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
                <!-- END Orange section -->
                <!-- Grey Section -->
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td bgcolor="#f5f5f5">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left">Identité :</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="5" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left"><strong>'.$nom.' '.$prenom.'</strong></div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left">email :</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="5" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left"><strong>'.$email.'</strong></div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="25" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left">Message :</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="5" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                <div class="text2" style="color:#3a3449; font-family:Arial,sans-serif; font-size:18px; line-height:22px; text-align:left"><strong>'.$message.'</strong></div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="35" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                </td>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="15"></td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
                <!-- END Grey Section -->
                                                
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">
                <tr>
                <td height="15" class="spacer" style="font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%">&nbsp;</td>
                </tr>
                </table>
                </td>
                <td class="content-spacing" style="font-size:0pt; line-height:0pt; text-align:left" width="1"></td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
                </td>
                </tr>
                </table>
                </body> </html>' ;
    
        $headers [] = "From: $myemail";
        $headers []= "Reply-To: $email";
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        mail($to,$email_subject,$email_body,implode("\r\n", $headers));
    
    //redirect to the 'thank you' page
    
        header('Location: reponse_auto.php?prenom='.$prenom);
    
     }
      
    
}


?>