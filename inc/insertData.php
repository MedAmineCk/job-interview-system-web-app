<?php
include 'db.php';

// initializing variables
$cin = $_POST['cin'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];


$query = "insert into candidat_infos(cin, nom, prenom, telephone, email)
 VALUE ('$cin','$nom','$prenom',$telephone, '$email')";
//mysqli_query($db, $query);
if ($db->query($query) === TRUE) {
    $last_id = $db->insert_id;
}

// initializing variables
$fk_id_candidat = $last_id;
$experience = $_POST['experience'];
$duree_experience = $_POST['duree_experience'];
$fonction_experience = $_POST['fonction_experience'];
$lieu_experience = $_POST['lieu_experience'];
$connaissance = $_POST['connaissance'];
$pourquoi_notoriety = $_POST['pourquoi_notoriety'];

if($experience == 'oui'){
    $experience = 1;
}else{
    $experience = 0;
}
$query = "insert into questionnaire(fk_id_candidat, experience, duree_experience, fonction_experience, lieu_experience, connaissance, pourquoi_notoriety) VALUE 
('$fk_id_candidat','$experience','$duree_experience','$fonction_experience', '$lieu_experience', '$connaissance', '$pourquoi_notoriety')";
if(mysqli_query($db, $query)){
    echo 'success';
}else{
    echo 'err';
}


