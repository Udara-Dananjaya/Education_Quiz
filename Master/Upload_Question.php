<?php
session_start();
if(!isset($_SESSION['Admin_Session_Id']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "layout/header.php";
require_once "layout/footer.php";



if(isset($_POST['upload']))
{
    $sql = "INSERT INTO `quiz`(`quiz_id`, `subject`, `level`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`)
    VALUES ('Quiz1', '".$_POST['sub']."','".$_POST['lvl']."', '".$_POST['qst']."', '".$_POST['a1']."', '".$_POST['a2']."', '".$_POST['a3']."', '".$_POST['a4']."');";
$conn->query($sql);
}





html_header("Upload_Question");



echo <<<EOT

<h1 class="h3 mb-4 text-gray-800">Upload Question</h1>

<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <center>Upload Details</center>
            </h6>
        </div>
        <div class="card-body">
            <form action="Upload_Question.php" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Subject </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select class="form-control" name="sub" id="sub" required>
                                <option value="Sinhala">Sinhala</option>
                                <option value="History">History</option>
                                <option value="Buddhism">Buddhism</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Level : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select class="form-control" name="lvl" id="lvl" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Question : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="qst" class="form-control"required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Answer 1 : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="a1" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Answer 2 : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="a2" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Answer 3 : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="a3" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Answer 4 : </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="a4" class="form-control"required>
                        </div>
                    </div>
                </div>

                <input  class="btn btn-primary" id="upload" name="upload" type="submit"
                    value="Upload">
    
            </form>
        </div>
    </div>
</div>

EOT;
    html_footer();
?>
