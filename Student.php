<?php

class Student
{
    public $Prenom;
    public $Age;

    public function __construct($prenom, $age)
    {
        $this->Prenom = $prenom;
        $this->Age = $age;
    }
}
