<?php
require_once('Classes/Student.php');
// Je vérifie si le fichier existe
if (!file_exists('students.json')) {
    $json_studient = fopen("students.json", "w");
    die;
}

if (!empty($_GET['create'])) {
    $json_studient = fopen("students.json", "w");
    $students = [];
    $i = 1;
    while ($i < 6) {
        array_push($students, [
            'student_name' => 'Etudiant' . $i,
            'student_age' => $i
        ]);
        $i++;
    }
    fwrite($json_studient, json_encode($students));
    fclose($json_studient);
    die;
}

$students = json_decode(file_get_contents("students.json"));

foreach ($students as $student) {
    // J'instencie l'objet
    $new_student = new Student($student->student_name, $student->student_age);
    // J'ajoute les étudiants
    if (!$new_student->add_student())
        die('Une erreur est survenue');
}
