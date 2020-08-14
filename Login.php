<?php
//php code for connecting with database
$connection = new mysqli("localhost","root","","demo");
    if($connection -> connect_error)
        die("Connection failed".$connection -> connect_error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="css\style.css">
    <link rel="stylesheet" a href="css\font-awesome.min.css">
    <title>Fahima-blog</title>
</head>
<body>
    <div class="container">
        <img src="image/login.png"/>
        <form method="POST" action="#">
            <div class="form-input">
                <input type="text" name="username" placeholder="Enter name"/>
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password"/>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="btn-login" name="btn"/>
        </form>
    </div>
</body>
</html>
<?php

if(isset($_REQUEST["btn"]))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT *FROM demo.loginform WHERE username LIKE '$username' and password LIKE '$password'";
        $result = $connection->query($sql);
        if ($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    $u = $row['username'];
                    $p = $row['password'];
                    if(($username == $u)&&($password == $p))
                        {
                            echo '<script> alert ("Success!");</script>';
                        }
                    else if(($username == $u)&&($password == $p))
                        {
                            echo '<script> alert ("Failed!");</script>';
                        }
                }
            } 
    }

?>