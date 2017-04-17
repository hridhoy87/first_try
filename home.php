<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 17-Apr-17
 * Time: 2:24 AM
 */
    session_start();
    if( isset($_POST['giveEmail'])){
        header("index.html");
    }
        require "database.php";
    if(!empty($_POST['email']) && !empty($_POST['password'])):

        $records = $conn->prepare('SELECT id,email,password FROM info WHERE email = :email');
        $records->bindParam(':email', $_POST['giveEmail']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

            $_SESSION['user_id'] = $results['id'];
            header("Location: /");

        } else {
            $message = 'Sorry, those credentials do not match';
        }

    endif;
        //1547
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Web Page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>

<header>

    <div class="styled_nav_top">
        <table align="right" cellpadding="0px" cellspacing="0px" width="50%" border="0"> <!--class="styled_nav_top_table"-->
            <tr>
                <td> <a href="index.html"> HOME </a>  </td>
                <td> <a href="index.html"> NEWS </a>  </td>
                <td> <a href="index.html"> PORTFOLIO </a>  </td>
                <td> <a href="index.html"> FAQ </a>  </td>
                <td> <a href="index.html"> CONTACT </a>  </td>
            </tr>
        </table>
    </div>

</header>
<main>
    <center>
        <?php
            echo $message;
        ?>
    </center>
</main>
<section>

</section>
<article>

</article>
<footer>

</footer>
<nav>

</nav>
<aside>

</aside>

</body>
</html>
