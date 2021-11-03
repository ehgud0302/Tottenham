<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>

    <?php

        $con = mysqli_connect("localhost","root","1234","spurs");
        $sql = "select * from member";
        $result = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {

            $email = $row['email'];
            $password = $row['password'];
            $name = $row['name'];


            echo $email."<br>";
            echo $password."<br>";
            echo $name."<br>";

            echo "======================================"."<br>";
        } 
            
    ?>

</body>
</html>
