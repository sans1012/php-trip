<?php
    {   $insert = false;
        if(isset($_POST['name']))

        $server="127.0.0.1";
        $username="root";
        $password="";
        
        $con= mysqli_connect($server,$username,$password);
        if(!$con)
        {
            die("Connetion to database failed because of ".mysqli_connect_error());
        }
        
        $name=$_POST['name'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $desc=$_POST['desc'];

        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";


        if($con -> query($sql)==true)        //-> object operator.
        {
            //echo "Successfully Executed.";
            $insert = true;
            
        }
        else{
            echo "<br><br> ERROR:  $sql  <br> $con->error ";

        }
        //connection close
        $con->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
 
</head>
<body>
    
    <img class="bg" src="https://www.peopletopeople.com/wp-content/uploads/2019/09/65211106_438003537048987_2712394206747295744_n-2800x1600.jpg " alt="Trip">
    <div class="container">
        <h3>US Travel Form </h3>
        <p>Enter the details to confirm Participation </p>
        
        <?php
            if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your response.</p>";
            }
        ?>

        <form action="index.php" method ="post">
                <input type="text" name="name" id="name" placeholder ="Enter Name">
                <input type="number" name="age" id="age" placeholder ="Enter Age"> 
                <input type="text" name="gender" id="Gender" placeholder ="Enter Gender"> 
                <input type="text" name="email" id="email" placeholder ="Enter Email">
                <input type="phone" name="phone" id="phone" placeholder =" Enter Phone Number">
                <textarea name="desc" id ="desc" cols="30" rows="5" placeholder="Enter queries"></textarea>
                <button class="btn" > Submit</button>
                <button class="btn"> Reset</button>
            </form>
    </div>
</body>
</html>