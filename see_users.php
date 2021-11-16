<?php
require_once('header.php');
// Intégration des classes
require_once('classes/Student.php');
require_once("repository/StudentRepository.php");

$students = StudentRepository::GetStudents();
foreach ($students as $student) {
    echo $student->Prenom . ' ';
    echo $student->Age . ' <a class="btn btn-info" href="update_user.php?id=' . $student->Id . '">MODIFIER</a> <a class="btn btn-danger" href="delete_user.php?id=' . $student->Id . '">SUPPRIMER</a><br />';
}
