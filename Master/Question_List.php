<?php
session_start();
if(!isset($_SESSION['Admin_Session_Id']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "layout/header.php";
require_once "layout/footer.php";

$sql = "SELECT * FROM quiz";
$result = $conn->query($sql);

html_header("Question_List");
echo <<<EOT

<h1 class="h3 mb-4 text-gray-800">Students List</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Students List</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Level</th>
                    <th>Question</th>
                    <th>Answer_A</th>
                    <th>Answer_B</th>
                    <th>Answer_C</th>
                    <th>Answer_D</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Subject</th>
                    <th>Level</th>
                    <th>Question</th>
                    <th>Answer_A</th>
                    <th>Answer_B</th>
                    <th>Answer_C</th>
                    <th>Answer_D</th>
                </tr>
            </tfoot>
            <tbody>
EOT;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr style='text-align:center'><td>"
        .$row["subject"]."</td> <td>"
        .$row["level"]."</td><td> "
        .$row["question"]."</td><td>"
        .$row["answer_a"]."</td><td>"
        .$row["answer_b"]."</td><td>"
        .$row["answer_c"]."</td><td>"
        .$row["answer_d"]."</td></tr>";
    }
        echo"</tbody></table></div></div></div>";

} else {
        echo"</tbody></table></div></div></div>";
}
   

html_footer();
?>
