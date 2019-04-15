<?php
    // require("db_config.php");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,"elections");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else{
        echo "OK";
    }
    if (empty($_GET["file_name"]))
    {
        echo "Please Specify a File Name";
    }
    else
    {
        $file_name = $_GET["file_name"];
        if (($file = @fopen($file_name, 'r')) !== FALSE)
        {
            while(!feof($file))
            {
                $row = fgetcsv($file);
                // print_r($row);
                $pass = hash("sha256", $row[0]);
                $bhavan = $row[1];
                $sql ="INSERT INTO `voters` (`id`, `pass`, `bhawan`, `president`, `gensec`, `cultsec`, `sportssec`, `smc`) VALUES (NULL, '$pass', '$bhavan', 'Didn\'t vote', 'Didn\'t vote', 'Didn\'t vote', 'Didn\'t vote', 'Didn\'t vote')"; 
                //if (mysqli_query($conn, $sql)) {
                  //  echo "New record created successfully";
                //} 
                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
                }
                
            }
            echo "Population Successful";
        }
        else
        {
            echo "Please Specify a Valid File Name";
        }
    }
?>