<?php
function callPage() {

    if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        }
        else {
            $page = "home";
        }
        
        $page = "./includes/" . $page . ".inc.php";
        
        $incFiles = glob("./includes/*.inc.php");
        
        if (in_array($page, $incFiles)) {
            include $page;
        }
        else{
            include "./includes/home.inc.php";
        }
        

}