<?php
//Maximum allowed size for uploaded files.
//http://php.net/upload-max-filesize
//upload_max_filesize = 2M

require_once "../../config/database.php";
session_start();

if(!($_SESSION['user']=="user")){
    header('Location: ../login.php');
}

if(isset($_POST['upload'])){

    $id=$_POST['d_id'];
    $docname=$_POST['docname'];
    $ref=$_POST['ref'];
    $doctype=$_POST['doctype'];
    $docscope=$_POST['docscope'];
    $docid="DOC-000".$id;
    $user_id=$_SESSION['Session_Id'];
    $filename=$_FILES["file"]["name"];
    $docreview=$_POST['docreview']; 
        switch ($docreview) {
            case "1":
                $docreview = date('Y-m-d', strtotime('+1 month'));
                break;
            case "3":
                $docreview = date('Y-m-d', strtotime('+3 month'));
                break;
            case "6":
                $docreview = date('Y-m-d', strtotime('+6 month'));
                break;
            case "9":
                $docreview = date('Y-m-d', strtotime('+9 month'));
                break;
            case "12":
                $docreview = date('Y-m-d', strtotime('+12 month'));
                break;
            default:
                $docreview = date('Y-m-d', strtotime('+12 month'));
        }
   
    $fileext=strstr($filename,'.');
    $url=$docid . $fileext;
    //upload
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        rename($target_file,$target_dir.$url);
        $sql = "INSERT INTO `documents` (`id`, `doc_name`, `doc_ref`, `doc_type`, `scope`, `doc_id`, `user_id`, `file_name`, `url`, `status`, `approve_date`, `review`, `upload_date`) 
        VALUES ('".$id."', '".$docname."','".$ref."', '".$doctype."', '".$docscope."', '".$docid."', '".$user_id."', '".$filename."', '$url', 'Pending', '2000-01-01 00:00:00', '".$docreview."', CURRENT_TIMESTAMP);";
        $conn->query($sql);

        //history
        $sql = "INSERT INTO `history` ( `doc_id`, `activity`, `note`, `date`, `username`) 
        VALUES ( '".$docid."', 'Document Added', '".$filename."', CURRENT_TIMESTAMP, '".$_SESSION['Session_Id']."');";
        $conn->query($sql);


      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    header('Location: ../pdnapproval.php');
}elseif(isset($_POST['update'])){
  

  $id=$_POST['d_id'];
  $docname=$_POST['docname'];
  $ref=$_POST['ref'];
  $doctype=$_POST['doctype'];
  $docscope=$_POST['docscope'];
  $docid="DOC-000".$id;
  $user_id=$_SESSION['Session_Id'];
  $filename=$_FILES["file"]["name"];
  $docreview=$_POST['docreview']; 
      switch ($docreview) {
          case "1":
              $docreview = date('Y-m-d', strtotime('+1 month'));
              break;
          case "3":
              $docreview = date('Y-m-d', strtotime('+3 month'));
              break;
          case "6":
              $docreview = date('Y-m-d', strtotime('+6 month'));
              break;
          case "9":
              $docreview = date('Y-m-d', strtotime('+9 month'));
              break;
          case "12":
              $docreview = date('Y-m-d', strtotime('+12 month'));
              break;
          default:
              $docreview = date('Y-m-d', strtotime('+12 month'));
      }
  $fileext=strstr($filename,'.');
  $url=$docid . $fileext;
  //upload
  $target_dir = "../../uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  if (file_exists($target_file)) {
      $del_dir="../../uploads/bin/";
      $temp_name=date("Ymdhis ");
      rename($target_dir.$url,$del_dir.$temp_name.$url);
          //history
        $sql = "INSERT INTO `history` ( `doc_id`, `activity`, `note`, `date`, `username`) 
        VALUES ( '". $docid."', 'Document Already Exists', 'Recover Path :uploads/bin/". $temp_name.$file."', CURRENT_TIMESTAMP, '".$_SESSION['Session_Id']."');";
        $conn->query($sql);

  }
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      rename($target_file,$target_dir.$url);
      $sql = "UPDATE `documents` SET doc_name='".$docname."',doc_ref='".$ref."' ,doc_type='".$doctype."' ,scope='".$docscope."' ,review='".$docreview."' ,file_name='".$filename."' ,status='Pending', approve_date='2000-01-01 00:00:00' ,url='". $url."' WHERE `id` = ". $_POST['d_id'].";";
      $conn->query($sql);
      //history
      $sql = "INSERT INTO `history` ( `doc_id`, `activity`, `note`, `date`, `username`) 
      VALUES ( '".$docid."', 'Document Updated', '".$filename."', CURRENT_TIMESTAMP, '".$_SESSION['Session_Id']."');";
      $conn->query($sql);


    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  header('Location: ../pdnapproval.php');
}else{

}
?>