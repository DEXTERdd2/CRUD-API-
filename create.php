<?php include "connection/config.php";

$error = $success = $first_name = $last_name = $email = '';
if (isset($_POST['submit'])){//when the submit button on the form will be pressed then
//creating different varaibles 

$first_name =htmlspecialchars($_POST ['firstname']);
$last_name = htmlspecialchars($_POST ['lastname']);;
$email = htmlspecialchars($_POST ['email']);;
$password = htmlspecialchars($_POST ['password']);;
$gender =htmlspecialchars($_POST ['gender']);;

 if (empty($first_name)){
    $error = 'Please enter your name';

 }elseif(empty($last_name)){
    $error = 'Please enter your lastname';
 }elseif(empty($email)){
    $error = 'Please enter your email';

 }else{
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($sql);

 }


$sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";
$result = $conn->query ($sql);

//if records are created then
if ($result == TRUE){
    echo "NEW RECORDS HAS BEEN CREATED";

}else{
    echo "error" .$sql ."br" . $conn->error;
}
// $con->close();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style> 
.container{
    display: grid;
    align-items: center;
    border: 1px solid black;
}
</style>
<body >
   <h2 style= "text-align:center;"> SIGNUP FORM</h2>
   <form action="" method = "post"> 
    <fieldset class="container">
        <legend style= "text-align:center;"> Personal Information</legend>
        First Name: <br>
        <input type="text" name="firstname">
        <br>
        Last Name: <br>
        <input type="text" name="lastname">
        <br>
        Email: <br>
        <input type="email" name="email">
        <br>
        Password: <br>
        <input type="password" name="password">
        <br>
        Gender: <br>
        <input type="radio" name="gender" value ="Male">Male
        <input type="radio" name="gender" value ="Female">Female

        <br><br>
        <input type="submit" class = "btn btn-primary"name="submit" value ="submit">
</fieldset>

   </form>
</body>
</html>