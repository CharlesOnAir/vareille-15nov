<?php

require_once("pdo.php");
require_once('./classes/Student.php');

class StudentRepository
{
    public static function AddStudent(Student $student)
    {
        $query = GetPDO()->prepare("INSERT INTO students(prenom, age) VALUES (?, ?)");
        $query->execute([
            $student->Prenom,
            $student->Age
        ]);
    }

    public static function GetStudents()
    {
        $query = GetPDO()->prepare("SELECT * FROM students");
        $query->execute();

        $datas = [];

        while ($student = $query->fetch(PDO::FETCH_ASSOC)) {
            $new_student = new Student($student['prenom'], $student['age'], $student['id']);
            $datas[] = $new_student;
        }
        return $datas;
    }

    public static function GetStudent($id)
    {
        $query = GetPDO()->prepare("SELECT * FROM students WHERE id =:id LIMIT 0,1");
        $query->execute([
            ':id' => $id
        ]);
        $datas = [];
        $student = $query->fetch(PDO::FETCH_ASSOC);
        $datas[] = new Student($student['prenom'], $student['age'], $student['id']);
        return $datas;
    }

    public static function UpdateStudent($id, $nom_etudiant, $age_etudiant)
    {
        $query = GetPDO()->prepare("UPDATE students SET prenom=:nom_etudiant, age=:age_etudiant WHERE id=:id");
        if ($query->execute([':nom_etudiant' => $nom_etudiant, ':age_etudiant' => $age_etudiant, ':id' => $id]))
            return true;
        else
            return false;
    }

    public static function DeleteStudent($id)
    {
        $query = GetPDO()->prepare("DELETE FROM students WHERE id =:id");
        if ($query->execute([':id' => $id]))
            return true;
        else
            return false;
    }
}
