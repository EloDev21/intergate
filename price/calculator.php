<?php

include('../resources/nav_head.php');
include('../resources/navbar.php');

$title = 'My Calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title) ?></title>
    <link rel="stylesheet" href="../resources/css/calculator.css">
</head>

<body>
    
<div class="jumbotron">
        <div class="container">
            <h1>Routes and Prices</h1>
            <!-- <p> Calculate Routes Distances n have a range of Prices.</p> -->
            <form class="form-horizontal" >
                <div class="form-group">
                    <label for="from" class="col-xs-2 control-label"><i class="far fa-dot-circle "> </i>  Enter a loading place</label><br>
                    <div class="col-xs-4 mt-1">
                        <input type="text" id="from" placeholder="e.g : Paris" class="form-control">
                    </div>
               </div><br>
               <div class="form-group">
                
                    <label for="to" class="col-xs-2 control-label"><i class="fas fa-map-marker-alt"></i> Enter an unloading place</label><br>
                    <div class="col-xs-4">
                        <input type="text" id="to"  placeholder="e.g : Brussels" class="form-control">
                    </div>
                  
                 </div>
                 
            </form><br>

            <div class="col-xs-offset-2 col-xs-10">
                <button class="btn btn-warning btn-md center " onclick="calcRoute();"><i class="fas fa-map-signs"></i> Caclulate Route</button>
            </div>
        </div>
        <div class="container-fluid">
            <div id="output">
               
             
            </div>
            <div id="googleMap"></div>
           
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://kit.fontawesome.com/ab2155e76b.js" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK7vqZqnZ28d789hs0I2WhxHNO-0M-IwY&libraries=places"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="../resources//js/calculator.js"></script>
</body>
</html>