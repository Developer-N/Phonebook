<?php
session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$mobile = $_POST['mobile'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$photoName = $_FILES["photo"]["name"];
$photoType = $_FILES["photo"]["type"];
$photoSize = $_FILES["photo"]["size"];
$photoTempName = $_FILES["photo"]["tmp_name"];

$folderPath = "photos";

if (!file_exists($folderPath)) {
    if (!mkdir($folderPath, 0777, true)) {
        die("Failed to create folder.");
    }
}

move_uploaded_file($photoTempName, "$folderPath/$photoName");

try {
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $databaseName = "Phonebook";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $databaseName);

    if ($conn->connect_error) {
        die("خطا در اتصال به پایگاه داده: " . $conn->connect_error);
    }
    $sql = "insert into contacts (firstName,lastName,mobile,phone,address,photo) 
values ('$firstName','$lastName','$mobile','$phone','$address','$photoName')";
    if ($conn->query($sql) === TRUE) {
        Header("Location: http://localhost:8001/index.php?insert=اطلاعات با موفقیت ثبت شد.");
    } else {
        Header("Location: http://localhost:8001/index.php?error=خطا در ثبت اطلاعات!");
    }

} catch (Exception $ex) {
    Header("Location:http://localhost:8001/index.php?error=" . $ex->getMessage());
}