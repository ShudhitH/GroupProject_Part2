<?php
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
                            <td>{$row['status']}</td>
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

mysqli_close($conn);
?>
