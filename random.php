<?php

    if(isset($_POST['throw'])) {

        $random = rand(1,6);

        $imagePath1 = '1oog.jpg">';
        $imagePath2 = '2oog.jpg">';
        $imagePath3 = '3oog.jpg">';
        $imagePath4 = '4oog.jpg">';
        $imagePath5 = '5oog.jpg">';
        $imagePath6 = '6oog.jpg">';

        if($random==1) {
            echo '<img src="' . $imagePath1;
        }
        if($random==2) {
            echo '<img src="' . $imagePath2;
        }
        if($random==3) {
            echo '<img src="' . $imagePath3;
        }
        if($random==4) {
            echo '<img src="' . $imagePath4;
        }
        if($random==5) {
            echo '<img src="' . $imagePath5;
        }
        if($random==6) {
            echo '<img src="' . $imagePath6;
        }
    
    }































?>