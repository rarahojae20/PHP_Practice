<?php
    session_start();

    include("connectionPage.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        if (!empty($id) && !empty($name) && !empty($password)) {
        //아이디 중복 확인
            $query = "SELECT * FROM Users WHERE id = '$id'";
            $result = mysqli_query($con, $query);
            
            if (mysqli_num_rows($result) > 0) {
                echo '<div id="box">' . "아이디 또는 비밀번호가 중복입니다." . '</div>';
            } else {
                //DB 삽입
                $query = "INSERT INTO Users (id, name, password) VALUES ('$id', '$name', '$password')";
                mysqli_query($con, $query);

                echo '<div id="box">' . "회원가입이 완료되었습니다. 로그인해주세요." . '</div>';
                header("refresh:1; url=loginPage.php"); // 1초 후 로그인 페이지로 이동
                exit();
            }
        } else {
            echo '<div id="box">' . "모든 항목을 작성해주세요." . '</div>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>회원가입</title>
</head>
<body>
    <h2>회원가입</h2>
    <form method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="가입">
    </form>
