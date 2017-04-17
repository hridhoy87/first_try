<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17-Apr-17
 * Time: 1:50 PM
 */


session_start();
if( isset($_POST['giveEmail'])){
    header("index.html");
}
require "database.php";
$message='';
$giveFName=$_POST['giveFName'];
$giveLName=$_POST['giveLName'];
$givePass=$_POST['givePass'];
$giveEmail=$_POST['giveEmail'];

if(!empty($_POST['giveEmail']) && !empty($_POST['givePass']) && ($_POST['givePass']==$_POST['reGivePass']) ){

    // Enter the new user in the database
    $sql = "INSERT INTO `info` (`id`, `fName`, `lName`, `password`, `email`, `time`) VALUES (NULL, :giveFName, :giveLName, :givePass, :giveEmail ,CURRENT_TIMESTAMP);";

    //(NULL,'.$_POST['giveFName'].','.$_POST['giveLName'].','.$_POST['givePass'].','.$_POST['giveEmail'].',' CURRENT_TIMESTAMP);
    $statement = $con->prepare($sql);
    $statement->bind_param(':giveFName',$_POST['giveFName']);
    $statement->bind_param(':giveLName',$_POST['giveLName']);
    $statement->bind_param(':givePass',$_POST['givePass']);
    $statement->bind_param(':giveEmail',$_POST['giveEmail']);

    try{
        $statement->execute();
        $message="Successfully Added";
    }catch (Exception $exception){
        $message=$exception.".No data inserted";
    }

}

?>

<!DOCTYPE html>
<body>

    <center>
        <h1>
            <?php
                echo $message;
            ?>
        </h1>
    </center>
</body>
