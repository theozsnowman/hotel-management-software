<?php

// Session start
session_start();
// Check if this page was accessed through URL directly or through the login process
// If this page was accessed through URL directly then access must be dened and user must be brought back to
// the login page, else user stays on this page.
if ($_SESSION["loggedin"] == false) {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php");
}

// set the fromreservationpage session variable for our checkout_service access restriction
$_SESSION["fromreservationpage"] = true;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ashish Shetty">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin:Reservation - Sierra Hotels</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Our custom template adjustments -->
    <link href="../css/admin_template.css" rel="stylesheet">


    <style>
        .table-secondary {
            background-color: #697179;
            color: white;
        }

        table tbody tr:hover {
            background-color: #6C757D !important;
            color: white !important;
        }

        .btn-outline-light:hover {
            border-color: #6C757D !important;
            color: #6C757D !important;
        }

        .check-out-btn:hover, .check-out-btn:active:focus {
            border-color: white !important;
            background-color: red !important;
            color: white !important;
        }


        .no-check-out-btn:hover, .no-check-out-btn:active:focus {
            border-color: white !important;
            background-color: green !important;
            color: white !important;
        }

        .modal {
            color: #343A40 !important;
        }

        .modal-header {
            background-color: #343A40 !important;
            color: white !important;
        }

        #modal-yes-btn {
            color: #343A40 !important;
        }

        #modal-yes-btn:hover, #modal-yes-btn:active:focus {
            border-color: white !important;
            background-color: red !important;
            color: white !important;
        }

        .close {
            color: white !important;
        }

        #modal-headline-inline {
            display: inline !important;
            width: 80px !important;
            background-color: #343A40 !important;
            border: none !important;
            color: white !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Sierra Hotels</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../login/logout_process.php">Log out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid dboard">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/admin.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/dashboard.svg"
                                       alt="dashboard"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span><img class="iconic active" src="../css/open-iconic/svg/calendar.svg"
                                       alt="reservation"></span>
                            Reservation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/restaurant.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/restaurant.svg"
                                       alt="restaurant"></span>
                            Restaurants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/services.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/services.svg"
                                       alt="services"></span>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/reports.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/document.svg"
                                       alt="reposrts"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/expenses.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/expenses.svg"
                                       alt="expenses"></span>
                            Expenses
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Internal Management</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../admin/internal_management/employees/employees.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/employees.svg"
                                       alt="employees"></span>
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav"
                           href="../admin/internal_management/departments/departments.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/departments.svg"
                                       alt="departments"></span>
                            Departments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../admin/internal_management/stocks/stocks.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/stocks.svg"
                                       alt="stocks"></span>
                            Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link management-nav" href="../admin/internal_management/set_costs/set_costs.php">
                            <span><img class="iconic" src="../css/open-iconic/svg/set-costs.svg"
                                       alt="set-costs"></span>
                            Set costs
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Reservation</h1>
            </div>
            <p>
                <a class="btn btn-outline-secondary" href="..\admin\roombooking\newbooking.php">New
                    Booking</a>
            </p>
            <table class="table table-hover table-secondary">
                <thead>
                <tr>
                    <th scope="col">Suite #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Checkout Date</th>
                    <th scope="col">Details</th>
                    <th scope="col">Services</th>
                    <th scope="col">Checkout</th>
                </tr>
                </thead>
                <tbody>
                <?php

                // Include the database variables file
                include_once "../include/db_var.php";

                // Database connection
                $conn = mysqli_connect($db_host, $db_user, $db_pass, "rooms");

                if (!$conn) {
                    //    die("Error! could not connect to database".mysqli_error($conn));
                    echo "<div class='alert alert-danger alert-dismissible fade show col-md-12' style='padding: 4px; font-size: 14px;'><button type='button' class='close' data-dismiss='alert' style='padding: 0px;'>&times;</button>Database connection error</div>";
                    die();
                }

                $query = "SELECT * FROM suites WHERE checked_in=1";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) >= 1) {
                    while ($row = mysqli_fetch_array($result)) {
                        $suite_no = $row['room_no'];
                        $name = $row['fname'] . " " . $row['lname'];

                        // MariaDB SQL stores date type data in the format yyyy-mm-dd
                        // Change its format to dd-mm-yyy before displaying it
                        $checkout_date = date("d-m-Y", strtotime($row['booked_to']));
                        echo "<tr>";
                        echo "<td scope=\"row\">$suite_no</td>";
                        echo "<td>$name</td>";
                        echo "<td><a class=\"btn btn-outline-light\" href=\"http://$_SERVER[HTTP_HOST]/admin/roombooking/update_checkout_date.php?stno=$suite_no&dat=$checkout_date\">$checkout_date</a></td>";
                        echo "<td><a class=\"btn btn-outline-light\" href=\"http://$_SERVER[HTTP_HOST]/admin/roombooking/reservationdetails.php?det=$suite_no\">Details</a></td>";
                        echo "<td><a class=\"btn btn-outline-light\" href=\"http://$_SERVER[HTTP_HOST]/admin/services/room_services.php?det=$suite_no\">Services</a></td>";
                        echo "<td><a class=\"btn btn-outline-light check-out-btn\" data-toggle=\"modal\" data-target=\"#myModal\" href=\"#\">Checkout</a></td>";
                        // Above href value is for passing variable $suite_no to the bootstrap modal. We will set the same value as the modal's ID
                        // Bootstrap Modal
                        echo "<div class=\"modal fade\" id=\"myModal\" role=\"dialog\">";
                        echo "<div class=\"modal-dialog\">";
                        // Modal content
                        echo "<div class=\"modal-content\">";
                        // open form for sending data via POST method
                        echo "<form action=\"checkout_service.php\" method=\"post\">";
                        echo "<div class=\"modal-header\">";
                        echo "<h4 class=\"modal-title\">Confirm checkout for room no.: $suite_no ?</h4>";
                        // The data inside the above div ($suite_no) is sent to the checkout_service via POST on submit
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
                        echo "</div>";
                        echo "<div class=\"modal-body\">";
                        echo "<p>Please confirm that you want to checkout: Yes or No</p>";
                        echo "</div>";
                        echo "<div class=\"modal-footer\">";
                        echo "<a class=\"btn btn-outline-light check-out-btn\" id=\"modal-yes-btn\" href=\"http://$_SERVER[HTTP_HOST]/admin/checkout_service.php?det=$suite_no\">Yes</a>";
                        echo "<a class=\"btn btn-outline-light no-check-out-btn\" data-dismiss=\"modal\">No</a>";
                        echo "</div>";
                        echo "</form>";
                        // form closed
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        // Modal closed
                        echo "</tr>";
                    }
                }

                ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
