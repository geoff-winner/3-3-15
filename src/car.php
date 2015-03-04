<?php

class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image_path;
    function __construct($name, $cost, $mileage, $image)
    {
        $this->make_model = $name;
        $this->price = $cost;
        $this->miles = $mileage;
        $this->image_path = $image;
    }
    function getMakeModel()
    {
        return $this->make_model;
    }
    function getPrice()
    {
        return $this->price;
    }
    function setMiles($new_miles)
    {
        $float_miles = (float) $new_miles;
        if ($float_miles != 0) {
            $this->miles = $float_miles;
        }
    }
    function getMiles()
    {
            return $this->miles;
    }
    function getImage()
    {
        return $this->image_path;
    }
}

}
?>
