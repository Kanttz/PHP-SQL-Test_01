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
        <h1>แสดงข้อมูลอาจารย์ทั้งหมด</h1>
        <hr>
        <div>
                <a href="./teacher_new.php">เพิ่มข้อมูลอาจารย์</a>
                <a href="./student_new.php">เพิ่มข้อมูลนักเรียน</a>
                <a href="./student_showall.php">แสดงข้อมูลนักเรียนทั้งหมด</a>
        </div>

        <hr>
        <?php
        require_once "./ConnectDatabase.php";
        require_once "./Teacher.php";

        $connectDatabase = new ConnnectDatabase();
        $teacher = new Teacher($connectDatabase->getConnectDatabase());

        $result = $teacher->getAllTeacher();

        $numRow = $result->rowCount();

        if ($numRow > 0) {
                echo "<table border='1'>";
                echo "<tr><td>รหัสอาจารย์</td><td>รูปภาพ</td><td>ชื่ออาจารย์</td><td>สาขาวิชา</td></tr>";

                while ($dataRow = $result->fetch(PDO::FETCH_ASSOC)) {
                        extract($dataRow);
                        echo "<tr>";
                        echo "<td>" . $teaId . "</td>";

                        if (file_exists("./images/teacher/$teaImg")) {
                                echo "<td><image src=\"./images/teacher/$teaImg\" width=\"100\"></td>";
                        } else {
                                echo "<td><image src=\"./images/logo.png\" width=\"100\"></td>";
                        }

                        echo "<td>" . $teaName . "</td>";
                        echo "<td>" . $major . "</td>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<td align=\"center\">";
                        echo "<a href=\"./teacher_update.php?teaId=" . $teaId . "&teaName=" . $teaName . "&major=" . $major . "\">แก้ไข</a>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href=\"./teacher_delete_result.php?teaId=" . $teaId . "\">ลบ</a>";
                        echo "</td>";
                        echo "</tr>";
                }

                echo "</table>";
        } else {
                echo "<h3>ไม่มีข้อมูลอาจารย์</h3>";
        }

        ?>





</body>

</html>