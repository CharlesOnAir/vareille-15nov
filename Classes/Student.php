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

    public function search_student()
    {
        $students = json_decode(file_get_contents("./src/public/assets/json/students.json"));
        foreach ($students as $student) {
            if ($student->student_name === $this->Prenom) {
                $userAge = $student->student_age;
                break;
            } else {
                $userAge = false;
            }
        }
        return $userAge;
    }

    /**
     * @return bool
     */

    public function add_student($students, $firstInput = false)
    {
        if ($firstInput) {
            $students = array([
                'student_name' => $nom_etudiant,
                'student_age' => $age_etudiant
            ]);
        } else {
            array_push($students, [
                'student_name' => $this->Prenom,
                'student_age' => $this->Age
            ]);
        }
        return $students;
    }
}
