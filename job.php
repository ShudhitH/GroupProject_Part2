<?php
require_once('settings.php');
$conn = new mysqli("localhost", "root", "", "eoi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Descriptions</title>
    <link href="styles/style1.css" rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="description" content = "Job description for Software and Website Designer">
    <meta name ="keyword" content= "Jobs, Software Developer, Website Desginer, Front-end, Back-end, Description ">
    <meta name = "author"  content ="Duc Toan">
    <meta>
</head>
<body>

<?php include 'header.inc'; ?>
<?php
if ($result->num_rows > 0) {
    while ($job = $result->fetch_assoc()) {
        echo "<section class='content_box'>";
        echo "<h2 class='box_header'><strong>" . htmlspecialchars($job['title']) . "</strong></h2>";
        echo "<div><p class='small_description'>" . $job['type'] . "</p>";
        echo "<p class='small_description'>" . $job['experience'] . "</p>";
        echo "<p class='small_description'>" . $job['salary'] . "</p></div>";
        echo "<p>" . nl2br(htmlspecialchars($job['description'])) . "</p>";
        echo "<h3><strong>Job Summary:</strong></h3>";
        echo "<p><strong>Position Reference Number: </strong>" . $job['reference_number'] . "</p>";
        echo "<p><strong>Reports To: </strong>" . $job['reports_to'] . "</p>";
        echo "<p><strong>Key Responsibilities:</strong></p><ul>";
        foreach (explode("\n", $job['responsibilities']) as $task) {
            echo "<li>" . htmlspecialchars($task) . "</li>";
        }
        echo "</ul>";

        if ($job['logo_images']) {
            echo "<div class='program_logo'>";
            foreach (explode(",", $job['logo_images']) as $logo) {
                echo "<img src='styles/images/" . trim($logo) . "' alt='Tech logo'>";
            }
            echo "</div>";
        }

        echo "<p><strong>Required Qualifications:</strong></p><ul class='mandatory'>";
        foreach (explode("\n", $job['essential_qualifications']) as $qual) {
            echo "<li>" . htmlspecialchars($qual) . "</li>";
        }
        echo "</ul>";

        echo "<p><strong>Preferred Qualifications:</strong></p><ul class='optional'>";
        foreach (explode("\n", $job['preferred_qualifications']) as $pref) {
            echo "<li>" . htmlspecialchars($pref) . "</li>";
        }
        echo "</ul>";

        echo "<p><strong>Benefits:</strong></p><ul class='benefits'>";
        foreach (explode("\n", $job['benefits']) as $benefit) {
            echo "<li>" . htmlspecialchars($benefit) . "</li>";
        }
        echo "</ul>";

        echo "<p>Apply <a href='" . $job['apply_link'] . "'><strong>here</strong></a></p>";
        echo "</section>";
    }
} else {
    echo "<p>No job listings available.</p>";
}

mysqli_close($conn)
?>
<?php include 'footer.inc'; ?>

</body>
</html>
