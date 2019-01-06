<?php include("connection.php"); ?>

<?php
    if(!isset($_GET['email']) || !isset($_GET['token'])) {
        header("Location:signup.php");
        exit();
    } else {
        $email = $_GET['email'];
        $token = $_GET['token'];

        $query = "SELECT id FROM dummy_accounts WHERE email = '$email' AND token='$token' AND isVerified='0'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0) {
            $query = "UPDATE dummy_accounts SET isVerified = '1', token = '' WHERE email = '$email'";
            $result = mysqli_query($db, $query);
            header("Location:index.php");
            exit();
        } else {
            header("Location:signup.php");
        }
    }
?>