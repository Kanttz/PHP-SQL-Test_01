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
        if (!empty($_POST)) {
                require_once "./ConnectDatabase.php";
                require_once "./Student.php";

                $connectDatabase = new ConnnectDatabase();
                $student = new Student($connectDatabase->getConnectDatabase());

                $student->stuId = $_POST['stuId'];
                $student->stuName = $_POST['stuName'];
                $student->stuMidterm = $_POST['stuMidterm'];
                $student->stuFinal = $_POST['stuFinal'];
                $student->stuGpa = $_POST['stuGpa'];
                $student->stuTotalScore = $student->stuMidterm + $student->stuFinal;

                if (!empty($_FILES["stuImage"]["name"])) {
                        $temp = explode(".", $_FILES["stuImage"]["name"]);
                        if (count($temp) == 2) {
                                $extentionFile = end($temp);
                                $newFileName = "sau_" . md5(uniqid()) . "." . $extentionFile;
                                $student->stuImage = $newFileName;
                                $imageUploaded = move_uploaded_file($_FILES["stuImage"]["tmp_name"], "./images/student/" . $newFileName);
                                if (!$imageUploaded) {
                                        die("อัปโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
                                }
                        } else {
                                die("อัปโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
                        }
                }

                if ($student->updateStudentByStuId()) {
                        echo "<h3>บันทึกข้อมูลแล้ว </h3>";
                } else {
                        echo "<h3>บันทึกข้อมูลไม่สำเร็ว</h3>";
                }

                header("Refresh:2; url=./student_showall.php");
        }

        ?>


</body>

</html>