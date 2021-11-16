<?php
// Intégration des classes
require_once('classes/Student.php');
require_once("repository/StudentRepository.php");

// Je récupère le contenu de la page add_user
$page = file_get_contents("views/update_user.html");

if (!empty($_GET['id'])) {
    $student = StudentRepository::GetStudent($_GET['id']);
    $nom_etudiant = $student[0]->Prenom;
    $age_etudiant = $student[0]->Age;
    $id_etudiant = $student[0]->Id;
    $page = str_replace('$nom_etudiant', $nom_etudiant, $page);
    $page = str_replace('$age_etudiant', $age_etudiant, $page);
    $page = str_replace('$id_etudiant', $id_etudiant, $page);
    echo $page;
}

if (isset($_POST['submit'])) {
    $nom_etudiant = $_POST['student_name'];
    $age_etudiant = $_POST['age_etudiant'];
    $id_etudiant = $_POST['id_etudiant'];
    if (StudentRepository::UpdateStudent($id_etudiant, $nom_etudiant, $age_etudiant)) {
        header('Location:see_users.php');
    } else {
        die('Une erreur est survenue');
    }
}
