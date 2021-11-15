<?php
// Intégration des classes
require_once('Classes/Student.php');

// Je récupère le contenu de la page add_user
$page = file_get_contents("views/add_user.html");

// Vérification de l'existance de $_POST et vérification non vide 
if (isset($_POST['submit'])) {
    // Stockages des données
    $nom_etudiant = $_POST['student_name'];
    $age_etudiant = $_POST['age_etudiant'];
    // Je vérifie si rien n'est vide
    if (!empty($nom_etudiant) && !empty($age_etudiant)) {
        // Je récupère le contenu du JSON des élèves
        if (file_exists("src/public/assets/json/students.json"))
            $students = json_decode(file_get_contents("src/public/assets/json/students.json"));
        else
            $students = array();
        if ($students) {
            foreach ($students as $student) {
                $add_student = new Student($nom_etudiant, $age_etudiant);
                $students = $add_student->add_student($students);
            }
            unlink("src/public/assets/json/students.json");
        } else
            $students = $add_student->add_student($students, true);
        file_put_contents("src/public/assets/json/students.json", json_encode($students));
        $displayError = 'success';
        $infoError = 'Utilisateur crée avec succès';
    } else {
        $displayError = 'danger';
        $infoError = 'Veuillez remplir tous les champs';
    }
    // Si non vide, j'adapte le code erreur
    $page = str_replace('$typeError', $displayError, $page);
    $page = str_replace('$infoError', $infoError, $page);
} else {
    // Sinon j'affiche une info classique
    $page = str_replace('$typeError', 'info', $page);
    $page = str_replace('$infoError', 'Entrez les informations de l\'étudiant', $page);
}

echo $page;