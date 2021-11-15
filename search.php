<?php
require_once('Classes/Student.php');
if (isset($_POST['student_name'])) {
    $student_name = $_POST['student_name'];
    $student = new Student($student_name);
    $result = $student->search_student();
    if (!$result) {
        $displayError = 'danger';
        $infoError = 'Aucun utilisateur trouvé';
    } else {
        $displayError = 'success';
        $infoError = 'Utilisateur "' . $student_name . '" de ' . $result . ' ans trouvé';
    }
}
$page = file_get_contents("views/search.html");
if (isset($_POST['student_name'])) {
    $page = str_replace('$typeError', $displayError, $page);
    $page = str_replace('$infoError', $infoError, $page);
} else {
    $page = str_replace('$typeError', 'info', $page);
    $page = str_replace('$infoError', 'Entrez un nom d\'étudiant', $page);
}
echo $page;
