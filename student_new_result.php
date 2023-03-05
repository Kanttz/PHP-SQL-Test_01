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
        <h1>ผลลัพธ์เพิ่มข้อมูลนักเรียน DTI</h1>
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
                $student->stuTotalScore = intval($_POST['stuMidterm']) + intval($_POST['stuFinal']);

                $temp = explode(".", $_FILES['stuImage']['name']);
                $extentionFile = $ext = end($temp);
                
                $newFileName = "sau_" . uniqid() . "." . $extentionFile;
                
                $student->stuImage = $newFileName;
                
                move_uploaded_file($_FILES['stuImage']['tmp_name'], "./images/student/" . $newFileName);

                if ($student->insertStudent()) {
                        echo "บันทึกข้อมูลสำเร็จ";
                } else {
                        echo "บันทึกข้อมูลไม่สำเร็จ";
                }

                header("Refresh:2; url=./student_showall.php");
        }

        ?>


</body>

</html>