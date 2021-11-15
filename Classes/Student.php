<?php

class Student
{
    public $Prenom;
    public $Age;

    /**
     * @param string $prenom
     * @param int $age
     */

    public function __construct($prenom, $age)
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
}
