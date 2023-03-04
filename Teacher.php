<?php

class Teacher
{
    public $teaId;
    public $teaName;
    public $major;
    public $teaImg;
    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    public function insertTeacher()
    {

        $strSQL = "INSERT INTO teacher_tb
                   (teaId, teaName, major, teaImg)
                   VALUES
                   (:teaId, :teaName, :major, :teaImg)";

        $stat = $this->conn_db->prepare($strSQL);

        $this->teaId = htmlspecialchars(stripcslashes(strip_tags($this->teaId)));
        $this->teaName = htmlspecialchars(stripcslashes(strip_tags($this->teaName)));
        $this->major = htmlspecialchars(stripcslashes(strip_tags($this->major)));
        $this->teaImg = htmlspecialchars(stripcslashes(strip_tags($this->teaImg)));

        $stat->bindParam(":teaId", $this->teaId);
        $stat->bindParam(":teaName", $this->teaName);
        $stat->bindParam(":major", $this->major);
        $stat->bindParam(":teaImg", $this->teaImg);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateTeacherByTeaId()
    {

        $strSQL = "UPDATE teacher_tb
                   SET teaName = :teaName, major = :major";
        if (!empty($this->teaImg)) {
            $strSQL .= ", teaImg = :teaImg";
        }
        $strSQL .= " WHERE teaId = :teaId";

        $stat = $this->conn_db->prepare($strSQL);

        $this->teaId = htmlspecialchars(stripcslashes(strip_tags($this->teaId)));
        $this->teaName = htmlspecialchars(stripcslashes(strip_tags($this->teaName)));
        $this->major = htmlspecialchars(stripcslashes(strip_tags($this->major)));
        if ($this->teaImg != "") {
            $this->teaImg = htmlspecialchars(stripcslashes(strip_tags($this->teaImg)));
        }

        $stat->bindParam(":teaId", $this->teaId);
        $stat->bindParam(":teaName", $this->teaName);
        $stat->bindParam(":major", $this->major);

        if ($this->teaImg != "") {
            $stat->bindParam(":teaImg", $this->teaImg);
        }

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteTeacherByTeaId()
    {

        $strSQL = "DELETE FROM teacher_tb
                   WHERE teaId = :teaId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->teaId = htmlspecialchars(stripcslashes(strip_tags($this->teaId)));

        $stat->bindParam(":teaId", $this->teaId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getAllTeacher()
    {

        $strSQL = "SELECT * FROM teacher_tb";

        $stat = $this->conn_db->prepare($strSQL);

        $stat->execute();

        return $stat;
    }

    public function getTeacherById()
    {

        $strSQL = "SELECT * FROM teacher_tb
                   WHERE teaId = :teaId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->teaId = htmlspecialchars(stripcslashes(strip_tags($this->teaId)));

        $stat->bindParam(":teaId", $this->teaId);

        $stat->execute();

        return $stat;
    }
}
