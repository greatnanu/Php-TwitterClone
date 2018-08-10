<?php
error_reporting(0);

    include("functions.php");

    include("section/header.php");

    if ($_GET['page'] == 'timeline') {
        
        include("section/timeline.php");
        
    } else if ($_GET['page'] == 'yourtweets') {
        
        include("section/yourtweets.php");
        
    } else if ($_GET['page'] == 'search') {
        
        include("section/search.php");
        
    } else if ($_GET['page'] == 'publicprofiles') {
        
        include("section/publicprofiles.php");
        
    } else {

        include("section/home.php");
        
    }
        
    include("section/footer.php");


?>