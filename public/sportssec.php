<?php

    // configuration
    require("../includes/config.php");

    $id = $_SESSION["id"];
    $bhavan_row = ($mysqli -> query("SELECT bhawan FROM voters WHERE id = '$id'")) -> fetch_assoc();
    $bhavan = $bhavan_row["bhawan"];

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SESSION["id"]){
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            // render form
            if ($bhavan === "MM" || $bhavan === "M")
            {
                render("sportssec_g_form.php", ["title" => "Sports Secretary (Girls)"]);
            }
            else
            {
                render("sportssec_b_form.php", ["title" => "Sports Secretary (Boys)"]);
            }
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
                $mysqli -> query("UPDATE voters SET sportssec = '$vote' WHERE id = '$id'");
                redirect("./smc.php");
            }
        }
    }
    else {
        redirect("./login.php");
    }

?>
