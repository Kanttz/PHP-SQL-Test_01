<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
        <h1>ผลลัพธ์แก้ไขข้อมูลนักเรียน DTI</h1>
        <hr>
        <?php

        require_once "./ConnectDatabase.php";
        require_once "./Student.php";

        $connectDatabase = new ConnnectDatabase();

        $student = new Student($connectDatabase->getConnectDatabase());

        $student->stuId = $_GET['stuId'];

        if ($student->deleteStudentByStuId()) {
                echo "<h3>ลบ เรียบร้อยแล้ว....^_^</h3>";
        } else {
                echo "<h3>ลบ ไม่สำเร็จ กรุณาลองใหม่หรือติดต่อ IT .... T_T</h3>";
        }

        header("Refresh:2; url=./student_showall.php");

        ?>

</body>

</html>