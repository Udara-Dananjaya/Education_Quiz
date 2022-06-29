
<?php

require_once "../config/database.php";

if(!isset($_GET['sub']))
{
    $url = '';
    echo "<script>document.location='../Profile.php'</script>";

}


 $sql = "SELECT * FROM `quiz` WHERE subject='".$_GET['sub']."';";
 $result = $conn->query($sql);

 echo "let questions = [";

 if ($result->num_rows > 0) {
  $i=0;
  while($row = $result->fetch_assoc()) {
    $i=$i+1;

     
       echo" { ";
        echo" numb: ".$i.",";
        echo" question: ' ".$row["question"]."',";
        echo" answer: '".$row["answer_a"]."',";
        echo" options: [";
        
        $o=rand(1,4);
        switch ($o) {
          case '1':
            echo"   '".$row["answer_a"]."',";
            echo"   '".$row["answer_b"]."',";
            echo"    '".$row["answer_c"]."',";
            echo"    '".$row["answer_d"]."'";
            break;
          
          case '2':
            echo"   '".$row["answer_d"]."',";
            echo"   '".$row["answer_a"]."',";
            echo"    '".$row["answer_b"]."',";
            echo"    '".$row["answer_c"]."'";
            break;

          case '3':
            echo"   '".$row["answer_c"]."',";
            echo"   '".$row["answer_d"]."',";
            echo"    '".$row["answer_a"]."',";
            echo"    '".$row["answer_b"]."'";
            break;

          case '4':
            echo"   '".$row["answer_b"]."',";
            echo"   '".$row["answer_c"]."',";
            echo"    '".$row["answer_d"]."',";
            echo"    '".$row["answer_a"]."'";
            break;
        }
          echo"  ] ";
          echo" }, ";

  }
     

}

echo "];";
	

echo <<<EOT



EOT;

?>