<?php
// Intégration des classes
require_once('classes/Student.php');
require_once("repository/StudentRepository.php");

if (StudentRepository::DeleteStudent($_GET['id']))
    echo 'Utilisateur supprimé <a href="see_users.php">Revenir à la liste des utilisateurs</a>';
else
    echo 'Une erreur est survenue';
