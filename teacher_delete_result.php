<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ผลลัพธ์แก้ไขข้อมูลนักเรียน DTI</h1>
    <hr>
    <?php
    require_once "./ConnectDatabase.php";
    require_once "./Teacher.php";

    $connectDatabase = new ConnnectDatabase();
    $teacher = new Teacher($connectDatabase->getConnectDatabase());

    $teacher->teaId = $_GET['teaId'];

    if ($teacher->deleteTeacherByTeaId()) {
        echo "ลบข้อมูลอาจารย์สำเร็จ";
    } else {
        echo "ลบข้อมูลอาจารย์ไม่สำเร็จ";
    }

    header("refresh:2; url=./teacher_showall.php");
    ?>

</body>

</html>