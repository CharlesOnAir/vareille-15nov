<?php

class Student
{
    public $Prenom;
    public $Age;

    /**
     * @param string $prenom
     * @param int $age
     */

    public function __construct($prenom, $age = 0)
    {
        $this->Prenom = $prenom;
        $this->Age = $age;
    }

    /**
     * @return bool
     */

    public static function search_student($student_name)
    {
        $students = json_decode(file_get_contents("./src/public/assets/json/students.json"));
        foreach ($students as $student)
            if ($student->student_name === $student_name)
                return $student->student_age;
            else
                return false;
    }

    /**
     * @return bool
     */

    public static function add_student($students, $nom_etudiant, $age_etudiant)
    {
        if ($students) {
            $students = array([
                'student_name' => $nom_etudiant,
                'student_age' => $age_etudiant
            ]);
        } else {
            array_push($students, [
                'student_name' => $nom_etudiant,
                'student_age' => $age_etudiant
            ]);
        }
        return $students;
    }
}
