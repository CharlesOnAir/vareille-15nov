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

    public function add_student()
    {
        if (file_exists("./students.json")) {
            $json_file = fopen("./students_list.json", "w");
            fwrite($json_file, file_get_contents("./students.json"));
            fclose($json_file);
            return true;
        }
        return false;
    }

    public function search_student()
    {
        $students = json_decode(file_get_contents("./students_list.json"));
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
}
