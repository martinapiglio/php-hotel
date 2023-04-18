<?php

    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $isParkingAvailable = $_GET['parking-opt'] ?? 'off';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>

    <div class="container py-3">

        <h1 class="pb-3">PHP Hotels</h1>

        <form action="index.php" method="get" class="pb-3 d-flex flex-row align-items-center gap-2">
            <input type="checkbox" name="parking-opt" class="form-check-input" <?php echo $isParkingAvailable == 'on' ?>
            <label>Parking</label>
            <button class="btn btn-dark" type="submit">Submit</button>
        </form>
        
        <table class="table table-striped table-bordered">
    
              <thead class="table-dark">
                    <tr>
                        <?php 
                            foreach($hotels[0] as $key => $hotelInformation) {
                        ?>
                            <th scope="col" class="text-capitalize"> 
                                
                                <?php 
                                    if ($key == 'distance_to_center') {
                                        echo 'distance to center';
                                    } else {
                                        echo $key; 
                                    }
                                ?> 
                            </th>
                        <?php
                            }
                        ?>
                    </tr>
            </thead>
    
            <tbody>
    
                <?php 
                    foreach($hotels as $hotel) {

                        if ($isParkingAvailable == 'off' || ($isParkingAvailable == 'on' && $hotel['parking'] == 'Present')) {
                ?>

                        <tr>
                            <?php 
                                foreach($hotel as $key => $hotelInformation) {
                            ?>
            
                                <td> 
                                    <?php 

                                        if ($key == 'parking') {
            
                                            if ($hotelInformation == true) {
                                                echo 'Present';
                                            } else {
                                                echo 'Not present';
                                            }
            
                                        } else if ($key == 'distance_to_center') {
                                            echo $hotelInformation . ' km';
                                        }
                                        else {
                                            echo $hotelInformation;
                                        } 
                                    ?>

                                </td>
            
                            <?php
                            }
                            ?>
                        </tr>
    
                <?php
                        }
                    }
                ?>
            </tbody>
    
        </table>

    </div>

    <!-- printed hotel information without style -->
    <!-- <?php 
    
        foreach($hotels as $hotel) {

            echo "<ul>";

            foreach($hotel as $key => $info){

                echo "<li><strong>{$key}</strong>: {$info}</li>";

            }

            echo "</ul>";
        }

    ?> -->
    <!-- //-->
    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>