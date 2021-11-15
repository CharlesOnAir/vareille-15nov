<?php
// Intégration des classes
require_once("classes/Student.php");

// Initialisation de l'objet
$name_student = 'Nicolas';
$age_student = 10;
$student = new Student($name_student, $age_student);

// Récupération du contenu de page.html
$page = file_get_contents("views/page.html");
// Remplacement des valeurs
$page = str_replace('$prenom', $student->Prenom, $page);
$page = str_replace('$age', $student->Age, $page);

// Affichage de la page
echo $page;
