<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/STA.css">
        <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
        <h1>แสดงข้อมูลนักเรียน DTI ทั้งหมด</h1>
        <hr>
        <div>
                <a href="./student_new.php">เพิ่มข้อมูลนักเรียน</a>
                <a href="./teacher_showall.php">แสดงข้อมูลอาจารย์</a>
        </div>

        <hr>
        <?php
        require_once "./ConnectDatabase.php";
        require_once "./Student.php";

        $connectDatabase = new ConnnectDatabase();

        $student = new Student($connectDatabase->getConnectDatabase());

        $result = $student->getAllStudent();

        $numRow = $result->rowCount();

        if ($numRow > 0) {
                echo "<table border=\"1\" width=\"800\">";
                echo "<tr><td>รหัส</td><td>รูป</td><td>ชื่อ-สกุล</td><td>คะแนนรวม</td><td>GPA</td></tr>";

                while ($dataRow = $result->fetch(PDO::FETCH_ASSOC)) {
                        extract($dataRow);
                        echo "<tr>";
                        echo "<td>" . $stuId . "</td>";
                        if (file_exists("./images/student/$stuImage")) {
                                echo "<td><image src=\"./images/student/$stuImage\" width=\"100\"></td>";
                        } else {
                                echo "<td><image src=\"./images/logo.png\" width=\"100\"></td>";
                        }
                        // echo "<td><image src=\"./images/student/$stuImage\" width=\"100\"></td>"; 
                        echo "<td>" . $stuName . "</td>";
                        echo "<td>" . $stuTotalScore . "</td>";
                        echo "<td>" . $stuGpa . "</td>";
                        //echo "<td>แก้ไข&nbsp;&nbsp;&nbsp;ลบ</td>";
                        echo "<td>";
                        echo "<a href=\"./student_update.php?stuId=" . $stuId . "&stuName=" . $stuName . "&stuMidterm=" . $stuMidterm . "&stuFinal=" . $stuFinal . "&stuGpa=" . $stuGpa . "\">แก้ไข</a>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href=\"./student_delete_result.php?stuId=" . $stuId . "\">ลบ</a>";
                        echo "</td>";
                        echo "</tr>";
                }

                echo "</table>";
        } else {
                echo "<h3>ไม่มีข้อมูลนักเรียนใน DB</h3>";
        }

        ?>


</body>

</html>