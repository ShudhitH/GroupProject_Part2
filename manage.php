<?php
require_once("settings.php");

// Connection to database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Allows manager to make the following queries of the eoi table and returns a web page with the appropriate results
if (!empty($query)) {
    $result = mysqli_query($conn, $query);
    if ($result) {
        if ($query, "SELECT") === 0 {
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


mysqli_close($conn);
?>
