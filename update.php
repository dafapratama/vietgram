<?php
    include_once('db.php');
    session_start();
    $usernamelama = $_SESSION['username'];


    //$usernamebaru = $_POST['username'];
    $namebaru = $_POST['name'];
    $websitebaru = $_POST['website'];
    $biobaru = $_POST['bio'];
    $emailbaru = $_POST['email'];
    $phonenumberbaru = $_POST['phonenumber'];
    $genderbaru = $_POST['gender'];

    $sql="UPDATE profile SET name='$namebaru',website='$websitebaru',bio='$biobaru',email='$emailbaru',phonenumber='$phonenumberbaru',gender='$genderbaru' WHERE username='$usernamelama'";
    $result = $conn->query($sql);
    // echo $result;
    header('location: profile.php');
?>