<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ผลลัพธ์แก้ไขข้อมูลอาจารย์</h1>
    <hr>
    <?php
    if (!empty($_POST)) {
        require_once "./ConnectDatabase.php";
        require_once "./Teacher.php";

        $connectDatabase = new ConnnectDatabase();
        $teacher = new Teacher($connectDatabase->getConnectDatabase());

        $teacher->teaId = $_POST['teaId'];
        $teacher->teaName = $_POST['teaName'];
        $teacher->major = $_POST['major'];

        if (!empty($_FILES['teaImg']['name'])) {
            $temp = explode(".", $_FILES['teaImg']['name']);
            if (count($temp) == 2) {
                $extentionFile = end($temp);
                $newFileName = "sau_" . md5(uniqid()) . "." . $extentionFile;
                $teacher->teaImg = $newFileName;
                $imageUploaded = move_uploaded_file($_FILES['teaImg']['tmp_name'], "./images/teacher/" . $newFileName);
                if (!$imageUploaded) {
                    die("ไม่สามารถอัพโหลดรูปภาพได้");
                }
            } else {
                die("ชื่อไฟล์ไม่ถูกต้อง");
            }
        }


        if ($teacher->updateTeacherByTeaId()) {
            echo "แก้ไขข้อมูลอาจารย์สำเร็จ";
        } else {
            echo "แก้ไขข้อมูลอาจารย์ไม่สำเร็จ";
        }

        header("Refresh:2; url=./teacher_showall.php");
    }
    ?>

</body>

</html>