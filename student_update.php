<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลนักเรียน - DTI Website 2023</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
    <h1>แก้ไขข้อมูลนักเรียน DTI</h1>
    <hr>
    <a href="./student_showall.php">แสดงข้อมูลนักเรียนทั้งหมด</a>
    <hr>

    <form action="./student_update_result.php" method="post" enctype="multipart/form-data">
        รหัสนักเรียน : <?php echo $_GET["stuId"]; ?> <br><br>
        <input type="hidden" name="stuId" value="<?php echo $_GET["stuId"]; ?>">
        ชื่อ-สกุลนักเรียน : <input type="text" name="stuName" value="<?php echo $_GET["stuName"]; ?>" id=""> <br><br>
        คะแนนกลางภาคนักเรียน : <input type="text" name="stuMidterm" value="<?php echo $_GET["stuMidterm"]; ?>" id=""> <br><br>
        คะแนนปลายภาคนักเรียน : <input type="text" name="stuFinal" value="<?php echo $_GET["stuFinal"]; ?>" id=""> <br><br>
        GPA นักเรียน : <input type="text" name="stuGpa" value="<?php echo $_GET["stuGpa"]; ?>" id=""> <br><br>
        <?php if (empty($_GET["stuImage"])) { ?>
            <img src="./images/logo.png" width="100"> <br><br>
            <?php } else {
            $file = "./images/student/" . $_GET["stuImage"];
            if (file_exists($file)) { ?>
                <img src="<?php echo $file; ?>" width="100"> <br><br>
            <?php } else { ?>
                <img src="./images/logo.png" width="100"> <br><br>
            <?php } ?>
        <?php } ?>
        <br><br>

        <!-- แก้ไขรูปนักเรียน -->
        เลือกรูป : <input type="file" name="stuImage" id="" accept=".png, .jpg, .jpeg, .">
        <hr>
        <input type="submit" value="บันทึก (แก้ไข)" onclick="return checkForm();">
        <input type="reset" value="ยกเลิก" onclick="return confirm('คุณต้องการยกเลิกหรือไม่ ?')" />







    </form>

</body>


</html>