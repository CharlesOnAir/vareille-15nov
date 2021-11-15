<?php
// Intégration des classes
require_once('Classes/Student.php');

// Vérification de l'existance de $_POST et vérification non vide 
if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
    $student_name = $_POST['student_name'];

    // Initialisation de l'objet
    $student = new Student($student_name);

    // Appel de la fonction en charge de rechercher un utilisateur
    $result = $student->search_student();

    // Si aucun résultat j'adapte le message d'erreur retourné
    if (!$result) {
        $displayError = 'danger';
        $infoError = 'Aucun utilisateur trouvé';
    } else {
        $displayError = 'success';
        $infoError = 'Utilisateur "' . $student_name . '" de ' . $result . ' ans trouvé';
    }
}

// Je récupère le contenu de la page search
$page = file_get_contents("views/search.html");

// Vérification de l'existance de $_POST et vérification non vide 
if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
    // Si non vide, j'adapte le code erreur
    $page = str_replace('$typeError', $displayError, $page);
    $page = str_replace('$infoError', $infoError, $page);
} else {
    // Sinon j'affiche une info classique
    $page = str_replace('$typeError', 'info', $page);
    $page = str_replace('$infoError', 'Entrez un nom d\'étudiant', $page);
}

// Affichage de la page
echo $page;
