<?php

class Competitor
{
    public $id;
    public $name;
    public $sex;
    public $age;
    public $country;
    public $marks;

    public function __construct($id, $array)
    {
        $this->id = $id;
        $this->name = $array['name'];
        $this->sex = $array['sex'];
        $this->age = $array['age'];
        $this->country = $array['country'];
        $this->marks = $array['marks'];
    }

    public static function validationDataCompetitors($array)
    {
        return !(
            empty($array['name']) ||
            empty($array['sex']) ||
            empty($array['age']) ||
            empty($array['country']) ||
            empty($array['marks']) ||
            $array['age'] > 0 ||
            !isset($array)
        );
    }
}