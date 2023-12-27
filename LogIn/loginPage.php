<?php
session_start();

include("connectionPage.php");

$message = ''; // 에러 또는 성공 메시지를 저장할 변수

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    // SQL Injection 방어를 위해 사용자 입력값을 이스케이프 처리
    $id = mysqli_real_escape_string($con, $id);
    $password = mysqli_real_escape_string($con, $password);

    // 데이터베이스에서 아이디와 비밀번호 일치 확인
    $query = "SELECT * FROM Users WHERE id = '$id' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // 로그인 성공
        $_SESSION['id'] = $id;
        $message = "로그인 되었습니다.";

    } else {
        // 로그인 실패
        $message = "아이디 또는 비밀번호가 잘못되었습니다.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <p><?php echo $message; ?></p> <!-- 성공 또는 실패 메시지 출력 -->
</body>
</html>
