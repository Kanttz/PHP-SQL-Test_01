<?php
class Student
{

    public $stuId;
    public $stuName;
    public $stuMidterm;
    public $stuFinal;
    public $stuGpa;
    public $stuImage;
    public $stuTotalScore;


    private $conn_db;


    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }


    public function insertStudent()
    {

        $strSQL = "INSERT INTO student_tb
                   (stuId, stuName, stuMidterm, stuFinal, stuGpa, stuImage, stuTotalScore)
                   VALUES
                   (:stuId, :stuName, :stuMidterm, :stuFinal, :stuGpa, :stuImage, :stuTotalScore)";


        $stat = $this->conn_db->prepare($strSQL);


        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));
        $this->stuName = htmlspecialchars(stripcslashes(strip_tags($this->stuName)));
        $this->stuMidterm = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuMidterm))));
        $this->stuFinal = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuFinal))));
        $this->stuGpa = floatval(htmlspecialchars(stripcslashes(strip_tags($this->stuGpa))));
        $this->stuImage = htmlspecialchars(stripcslashes(strip_tags($this->stuImage)));
        $this->stuTotalScore = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuTotalScore))));


        $stat->bindParam(":stuId", $this->stuId);
        $stat->bindParam(":stuName", $this->stuName);
        $stat->bindParam(":stuMidterm", $this->stuMidterm);
        $stat->bindParam(":stuFinal",  $this->stuFinal);
        $stat->bindParam(":stuGpa", $this->stuGpa);
        $stat->bindParam(":stuImage", $this->stuImage);
        $stat->bindParam(":stuTotalScore", $this->stuTotalScore);


        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateStudentByStuId()
    {

        $strSQL = "UPDATE student_tb SET
                    stuName=:stuName, stuMidterm=:stuMidterm, stuFinal=:stuFinal, 
                    stuGpa=:stuGpa, stuTotalScore=:stuTotalScore";
        if (!empty($this->stuImage)) {
            $strSQL .= ", stuImage=:stuImage";
        }
        $strSQL .= " WHERE stuId=:stuId";



        $stat = $this->conn_db->prepare($strSQL);


        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));
        $this->stuName = htmlspecialchars(stripcslashes(strip_tags($this->stuName)));
        $this->stuMidterm = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuMidterm))));
        $this->stuFinal = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuFinal))));
        $this->stuGpa = floatval(htmlspecialchars(stripcslashes(strip_tags($this->stuGpa))));
        $this->stuTotalScore = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuTotalScore))));
        if ($this->stuImage != "") {
            $this->stuImage = htmlspecialchars(stripcslashes(strip_tags($this->stuImage)));
        }

        $stat->bindParam(":stuId", $this->stuId);
        $stat->bindParam(":stuName", $this->stuName);
        $stat->bindParam(":stuMidterm", $this->stuMidterm);
        $stat->bindParam(":stuFinal",  $this->stuFinal);
        $stat->bindParam(":stuGpa", $this->stuGpa);
        $stat->bindParam(":stuTotalScore", $this->stuTotalScore);
        if ($this->stuImage != "") {
            $stat->bindParam(":stuImage", $this->stuImage);
        }


        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStudentByStuId()
    {

        $strSQL = "DELETE FROM student_tb WHERE stuId=:stuId";

        $stat = $this->conn_db->prepare($strSQL);

        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));

        $stat->bindParam(":stuId", $this->stuId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllStudent()
    {
        $strSQL = "SELECT * FROM student_tb";

        $stat = $this->conn_db->prepare($strSQL);

        $stat->execute();

        return $stat;
    }

    public function getStudentByStuId()
    {
        $strSQL = "SELECT * FROM student_tb WHERE stuId=:stuId";

        $stat = $this->conn_db->prepare($strSQL);

        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));

        $stat->bindParam(":stuId", $this->stuId);

        $stat->execute();

        return $stat;
    }
}
