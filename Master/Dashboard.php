<?php
session_start();
if(!isset($_SESSION['Admin_Session_Id']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "layout/header.php";
require_once "layout/footer.php";

$sql = "SELECT COUNT(`id`) FROM `users`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$std_cnt= $row["COUNT(`id`)"];

$sql = "SELECT MAX(`score`) FROM `score`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$max_score= $row["MAX(`score`)"];

$sql = "SELECT * FROM score";
$result = $conn->query($sql);


html_header("dashboard");

echo <<<EOT

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Student Count</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$std_cnt</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt  fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Max Score</div>
                        <div class="h5 mb-0 font-weight-bold text-danger">$max_score</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        NEW CARD </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            NEW CARD</div>
                        <div class="h5 mb-0 font-weight-bold text-warning">-</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

EOT;


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
                    <th>quiz id</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>User Name</th>
                    <th>quiz id</th>
                    <th>Score</th>
                </tr>
            </tfoot>
            <tbody>
EOT;
   

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr style='text-align:center'><td>"
        .$row["user_name"]."</td> <td>"
        .$row["quiz_id"]."</td><td> "
        .$row["score"]."</td></tr>";
    }
        echo"</tbody></table></div></div></div>";

} else {
        echo"</tbody></table></div></div></div>";
}
   
    


html_footer();
?>
