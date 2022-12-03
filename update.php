<?php 
include "./connection/config.php";

if (isset ($_POST['update'])){
    $first_name =$_POST ['firstname'];
    $last_name = $_POST ['lastname'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    $gender =$_POST ['gender'];

 $sql = "UPDATE `users` SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email',`password`='$password',`gender`='$gender' WHERE 'id'= '$user_id'";
 $result = $conn->query ($sql);

 if ($result == TRUE){
    echo "Record Updated Successfully";

 }else{
    echo 
    "Error Occurred" .sql. "<br>" .$conn->error;
 }
}
if (isset ($_GET['id'])){
    $user_id = $_GET['id'];

    $sql = "SELECT *FROM `users` WHERE 'id'='$user_id'";
    $result =$conn->query($sql);
    if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $first_name =htmlspecialchars($_POST ['firstname']);
            $last_name = htmlspecialchars($_POST ['lastname']);;
            $email = htmlspecialchars($_POST ['email']);;
            $password = htmlspecialchars($_POST ['password']);;
            $gender =htmlspecialchars($_POST ['gender']);;
            
            $id =$row ['id'];

        
        ?>
        <h2> USER UPDATE FORM</h2>
        <form action= ""method ="post">
        <feildset>
        <legend> PERSONAL INFORMATION </legend>
        FirstName: <br> 
        <input type="text" name = "firstname" value ="<?php echo $first_name; ?>">
        <input type="hidden" name = "user_id" value ="<?php echo $id; ?>">
        <br>
        LastName: <br> 
        <input type="text" name = "lastname" value ="<?php echo $last_name; ?>">
        
        <br>  
        Email: <br> 
        <input type="email" name = "email" value ="<?php echo $email; ?>">

        <br>
        Email: <br> 
        <input type="password" name = "password" value ="<?php echo $password; ?>">

        <br>
        Gender:<br>
        <input type="radio" name = "gender" value ="Male"
        <?php
        if($gender =='Male'){
            echo "Checked";
        } ?> >Male
        <input type="radio" name = "gender" value ="Female"
        <?php
        if($gender =='Female'){
            echo "Checked";
        } ?> >Female
        <br><br>
        <input type="submit" value = "update" name="update">
    </feildset>
        </form>
    </body>
    </html>
    <?php
        }}
     else{
        //if the id value is not valid redirect user to view.php
    header('Location: show.php');
    }


}
?>