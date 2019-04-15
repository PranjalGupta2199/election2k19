<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        //echo "OK";

        render("login_form.php", ["title" => "Log In"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["password"]))
        {
            redirect("./login.php");
            //apologize("You must provide your password.");
        }

        // hash password
        $hashed_password = hash("sha256", $_POST["password"]);
        // query database for user
        $res = $mysqli -> query("SELECT * FROM voters WHERE pass = '$hashed_password'");
        // if we found user, check password


        if ($res -> num_rows > 0)
        {
            // first (and only) row
            $row = $res -> fetch_assoc();
            //print_r ($row);
            //if ($row["has_voted"])
            if ($row['president'] != "Didn't vote" || $row['gensec'] != "Didn't vote" || $row['cultsec'] != "Didn't vote" || $row['sportssec'] != "Didn't vote" || $row['smc'] != "Didn't vote")
            {
                //apologize("User Has Already Voted");
                redirect("./login.php");
            }
            else
            {
            	// set session id
	            $_SESSION["id"] = $row["id"];

	            // redirect to president voting page
	            redirect("./president.php");
            }
        }

        // else if password not found, apologize
        redirect("./login.php");
        //apologize("Invalid password.");
    }

?>
