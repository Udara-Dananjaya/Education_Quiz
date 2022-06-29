<?php
session_start();
if(!isset($_SESSION['Admin_Session_Id']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "layout/header.php";
require_once "layout/footer.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

html_header("Users_List");
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
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
            <tbody>
EOT;
   
    
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr style='text-align:center'><td>"
        .$row["user_name"]."</td> <td>"
        .$row["f_name"]."</td><td> "
        .$row["l_name"]."</td><td>"
        .$row["dob"]."</td><td>"
        .$row["grade"]."</td><td>"
        .'<a href=dashboard.php?delete='. $row["id"].'><i class="fas fa-trash"></i></a>'
        .'</td></tr>';
    }
        echo"</tbody></table></div></div></div>";

} else {
        echo"</tbody></table></div></div></div>";
}
   

html_footer();
?>
