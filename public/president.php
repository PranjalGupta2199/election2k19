<?php

    // configuration
    require("../includes/config.php");
    
    $id = $_SESSION["id"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SESSION["id"]){
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            // render form
            render("president_form.php", ["title" => "President"]);
        }

        // else if user reached page via POST (as by submitting a form via POST)
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (empty($_POST["vote"]))
            {
                apologize("You must vote for someone.");
            }
            else
            {
                $vote = $_POST["vote"];
                $mysqli -> query("UPDATE voters SET president = '$vote' WHERE id = '$id'");
                redirect("./gensec.php");
            }
        }
    }
    else {
        redirect("./login.php");
    }

?>
