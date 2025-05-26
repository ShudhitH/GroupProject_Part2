<!DOCTYPE html>
<html lang="en">
<head><title>Manage EOIs</title></head>
<body>

<h1>Manage EOIs</h1>

<!-- List All EOIs -->
<form method="post" action="manage.php" style="margin-bottom:20px;">
  <button type="submit" name="action" value="list_all">List All EOIs</button>
</form>

<!-- List EOIs by Job Reference -->
<form method="post" action="manage.php" style="margin-bottom:20px;">
  <input type="text" name="job_ref" placeholder="Job Reference Number" required>
  <button type="submit" name="action" value="list_by_job">List EOIs by Job Ref</button>
</form>

<!-- List EOIs by Applicant Name -->
<form method="post" action="manage.php" style="margin-bottom:20px;">
  <input type="text" name="first_name" placeholder="First Name">
  <input type="text" name="last_name" placeholder="Last Name">
  <button type="submit" name="action" value="list_by_applicant">List EOIs by Applicant</button>
</form>

<!-- Delete EOIs by Job Reference -->
<form method="post" action="manage.php" style="margin-bottom:20px;">
  <input type="text" name="job_ref" placeholder="Job Reference Number" required>
  <button type="submit" name="action" value="delete_by_job">Delete EOIs by Job Ref</button>
</form>

<!-- Change Status of an EOI -->
<form method="post" action="manage.php" style="margin-bottom:20px;">
  <input type="number" name="eoi_number" placeholder="EOI Number" required>
  <input type="text" name="status" placeholder="New Status" required>
  <button type="submit" name="action" value="change_status">Change EOI Status</button>
</form>

<hr>


<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
    header("LocationL access.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("settings.php");

// Create DB connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$action = $_POST['action'] ?? '';
$output = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "";
    switch ($action) {
        // List all EOIs
        case 'list_all':
            $query = "SELECT * FROM eoi";
            break;
        // List all EOIs for a particular position (given a job reference number).
        case 'list_by_job':
            $job_ref = sanitize($_POST['job_ref']);
            $query = "SELECT * FROM eoi WHERE jobReferenceNumber = '$job_ref'";
            break;
        // List all EOIs for a particular applicant given their first name, last name or both.
        case 'list_by_applicant':
            $fname = sanitize($_POST['first_name']);
            $lname = sanitize($_POST['last_name']);
            $conditions = [];
            if (!empty($fname)) $conditions[] = "firstName = '$fname'";
            if (!empty($lname)) $conditions[] = "lastName = '$lname'";
            if (count($conditions) > 0) {
                $query = "SELECT * FROM eoi WHERE " . implode(" AND ", $conditions);
            }
            break;
        // Delete all EOIs with a specified job reference number
        case 'delete_by_job':
            $job_ref = sanitize($_POST['job_ref']);
            $query = "DELETE FROM eoi WHERE jobReferenceNumber = '$job_ref'";
            break;
        // Change the Status of an EOI.
        case 'change_status':
            $eoi_num = intval($_POST['eoi_number']);
            $new_status = sanitize($_POST['status']);
            $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = $eoi_num";
            break;

        default:
            $output = "Invalid action.";
    }
    
    // Allows manager to make the following queries of the eoi table and returns a web page with the appropriate results
    if (!empty($query)) {
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (stripos($query, "SELECT") === 0) {
                if (mysqli_num_rows($result) > 0) {
                    $output .= "<table border='1'><tr>
                        <th>EOI Number</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $output .= "<tr>
                            <td>{$row['EOInumber']}</td>
                            <td>{$row['jobReferenceNumber']}</td>
                            <td>{$row['firstName']}</td>
                            <td>{$row['lastName']}</td>
                            <td>{$row['emailAddress']}</td>
                            <td>{$row['phoneNumber']}</td>
                            <td>" . (isset($row['status']) ? $row['status'] : '') . "</td>
                        </tr>";
                    }

                    $output .= "</table>";
                } else {
                    $output = "No matching records found.";
                }
            } else {
                $output = "Action completed successfully.";
            }
        } else {
            $output = "Query failed: " . mysqli_error($conn);
        }
    }
}

echo $output;
echo "<br><a href='index.php'>Return back home</a>";

mysqli_close($conn);
?>
</body>
</html>
