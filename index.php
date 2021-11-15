<?php

require_once("Classes/Student.php");

$student = new Student('Nicolas', 10);

$page = file_get_contents("views/page.html");
$page = str_replace('$prenom', $student->Prenom, $page);
$page = str_replace('$age', $student->Age, $page);

echo $page;
