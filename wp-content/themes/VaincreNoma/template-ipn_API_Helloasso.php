<?php
/**
 *    Template Name: Page seveur API helloasso
 */
function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

    return $str;
}

$retourArray = array(
    "0"  => "Opération réussie",
    "1"  => "Service temporairement indisponible",
    "2"  => "Paiement refusé par le centre d’autorisation",
    "4"  => "Numéro de porteur ou crytogramme visuel invalide",
    "8"  => "Date de fin de validité incorrecte",
    "9"  => "Erreur de création d'un abonnement",
    "10" => "Devise inconnue",
    "11" => "Montant incorrect",
    "15" => "Paiement déjà effectué",
    "16" => "Abonné déjà existant",
    "21" => "Carte non autorisée",
    "29" => "Carte non conforme",
    "30" => "Temps d'attente > 15 minutes par l'internaute au niveau de la page de paiement",
    "33" => "Code pays de l'adresse IP du navigateur de l'acheteur non autorisé"
);

if (isset($_GET["status"]) ){
    $getStatus = $_GET["status"];
}else{
    $getStatus = 'null';
}

if (isset($_GET["reference"]) ){
    $getReference = $_GET["reference"];
}else{
    $getReference = 'null';
}




$cleanReference = wd_remove_accents($getReference);



    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from    = "helloasso-api@vaincre-noma.com";
    $to      = "Pierre-jean.dugue@hetic.net";
    $subject = "Tetative de don via helloasso";
    $message = "Un don vient d'être effectué sur vaincre-noma.com, le statu renvoyé par helloasso est  : ". $retourArray[$getStatus] ."\n \n la référence est ". htmlspecialchars( $cleanReference ) ;
    $headers = 'From: '.$from. "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text; charset=utf-8' . "\r\n";
    mail($to,$subject,$message, $headers);

?>