<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลอาจารย์ - DTI Website 2023</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/TSH.css">
</head>

<body>
    <h1>เพิ่มข้อมูลอาจารย์ DTI</h1>
    <hr>
    <div>
        <a href="./teacher_showall.php">แสดงข้อมูลอาจารย์ทั้งหมด</a>
        <a href="./student_showall.php">แสดงข้อมูลนักเรียนทั้งหมด</a>
    </div>
    <hr>
    <form action="./teacher_new_result.php" method="post" enctype="multipart/form-data">
        รหัสอาจารย์ : <input type="text" name="teaId" id="" required> <br><br>
        ชื่อ-สกุลอาจารย์ : <input type="text" name="teaName" id=""> <br><br>
        สาขาวิชาอาจารย์ : <input type="text" name="major" id=""> <br><br>
        เลือกรูปภาพ : <input type="file" name="teaImg" id="" accept=".png, .jpg, .jpeg, .ARW"> <br><br>
        <hr>
        <input type="submit" value="บันทึก" onclick="return checkform(this.form);">
        <input type="button" value="ยกเลิก" onclick="window.location.href='./teacher_showall.php'">  
        
    </form>
</body>

</html>