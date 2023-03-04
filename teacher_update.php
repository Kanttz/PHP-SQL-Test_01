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
    <h1>แก้ไขข้อมูลอาจารย์</h1>
    <hr>
    <a href="./teacher_showall.php">แสดงข้อมูลอาจารย์ทั้งหมด</a>
    <hr>
    <form action="./teacher_update_result.php" method="post" enctype="multipart/form-data">
        รหัสอาจารย์ : <?php echo $_GET["teaId"]; ?> <br><br>
        <input type="hidden" name="teaId" value="<?php echo $_GET["teaId"]; ?>">
        ชื่อ-สกุลอาจารย์ : <input type="text" name="teaName" id="" value="<?php echo $_GET["teaName"]; ?>"> <br><br>
        สาขาวิชาอาจารย์ : <input type="text" name="major" id="" value="<?php echo $_GET["major"]; ?>"> <br><br>
        <?php if (empty($_GET["teaImg"])) { ?>
            <img src="./images/logo.png" alt="" width="100px"> <br><br>
            <?php } else {
            $file = "./images/teacher/" . $_GET["teaImg"];
            if (file_exists($file)) { ?>
                <img src="<?php echo $file; ?>" alt="" width="100px"> <br><br>
            <?php } else { ?>
                <img src="./images/logo.png" alt="" width="100px"> <br><br>
            <?php } ?>
        <?php } ?>
        <br><br>
        เลือกรูปภาพ : <input type="file" name="teaImg" id="" accept=".png, .jpg, .jpeg, .ARW">
        <hr>
        <input type="submit" value="บันทึก" onclick="return checkform(this.form);">
        <input type="reset" value="ยกเลิก" onclick="return confirm('คุณต้องการยกเลิกหรือไม่ ?')" />
    </form>

</body>


</html>