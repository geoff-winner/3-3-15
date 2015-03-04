<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $porsche = new Car("2014 Porsche 911", 114991, 7804, "porsche911.jpg");
        $ford = new Car("2011 Ford F450", 55995, 14241, "f450.jpg");
        $lexus = new Car("2013 Lexus RX 350", 39900, 23000, "lexusrx350.jpg");
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979,"cls550.jpg");
        $cars = array($porsche, $ford, $lexus, $mercedes);
        $cars_matching_search = array();
        foreach ($cars as $car) {
            $car_price = $car->getPrice();
            $car_miles = $car->getMiles();
            if ($car_price < $_GET["price"] || $car_miles < $_GET["miles"])
            {
                array_push($cars_matching_search, $car);
            }
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
            <h1>Find a Car!</h1>
            <form action='cartest.php'>
            <div class='form-group'>
                <label for='price'>Enter Maximum Price:</label>
                <input id='price' name='price' class='form-control' type='number'>
            </div>
            <div class='form-group'>
                <label for='miles'>Enter Maximum Miles:</label>
                <input id='miles' name='miles' class='form-control' type='number'>
                </div>
                <button type='submit' class='btn-success'>Submit</button>
            </form>
        </div>
    </body>
    </html>
    ";
    
    });

    $app->get("/", function() {
        return "<!DOCTYPE html>
        <html>
        <head>
                <title>Your Car Dealership's Homepage</title>
        </head>
        <body>
            <h1>Your Car Dealership</h1>
            <ul>
                    <?php
                        if (empty ($cars_matching_search)){
                            echo "There are no results to display.";
                        }   else {
                            foreach ($cars_matching_search as $car)
                            {
                            $car_price = $car->getPrice();
                            $car_make_model = $car->getMakeModel();
                            $car_miles = $car->getMiles();
                            $car_image = $car->getImage();
                            echo "<li> $car_make_model </li>";
                            echo "<img src='$car_image'>";
                            echo "<ul>";
                                echo "<li> $$car_price </li>";
                                echo "<li> Miles: $car_miles </li>";
                            echo "</ul>";
                            }
                        }
                    ?>
            </ul>
        </body>
        </html>
        "
    });
?>
