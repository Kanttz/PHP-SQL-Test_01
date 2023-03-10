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
    <h1>ผลลัพธ์เพิ่มข้อมูลอาจารย์</h1>
    <hr>
    <?php
    if (!empty($_POST)) {
        require_once "./ConnectDatabase.php";
        require_once './Teacher.php';

        $connectDatabase = new ConnnectDatabase();
        $teacher = new Teacher($connectDatabase->getConnectDatabase());

        $teacher->teaId = $_POST['teaId'];
        $teacher->teaName = $_POST['teaName'];
        $teacher->major = $_POST['major'];
        $temp = explode(".", $_FILES['teaImg']['name']);
        $extentionFile = $ext = end($temp);

        $newFileName = "sau_" . md5(uniqid()) . "." . $extentionFile;

        $teacher->teaImg = $newFileName;

        move_uploaded_file($_FILES['teaImg']['tmp_name'], "./images/teacher/" . $newFileName);

        if ($teacher->insertTeacher()) {
            echo "เพิ่มข้อมูลอาจารย์สำเร็จ";
        } else {
            echo "เพิ่มข้อมูลอาจารย์ไม่สำเร็จ";
        }

        header("refresh:2; url=./teacher_showall.php");
    }
    ?>
</body>

</html>