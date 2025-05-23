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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore job descriptions for open positions at Tech Network Software Solutions.">
    <meta name="keywords" content="Jobs, Software Developer, Web Designer, Careers, Description">
    <meta name="author" content="Duc Toan">
    <link href="styles/style1.css" rel="stylesheet">
</head>
<body>

<?php include 'header.inc'; ?>

<main>
    <section class="content_box">
        <h1 class="box_header">Job Descriptions</h1>
        <p>Welcome to our careers section! Here, you'll find detailed job descriptions for available roles. Read through each posting carefully and click the "Quick Apply" button if you're ready to take the next step in your career.</p>
    </section>

    <?php
    if ($result->num_rows > 0) {
        while ($job = $result->fetch_assoc()) {
            echo "<section class='content_box'>";
            echo "<h2 class='box_header'>" . htmlspecialchars($job['title']) . "</h2>";
            echo "<p class='small_description'><strong>Type:</strong> " . htmlspecialchars($job['type']) . "</p>";
            echo "<p class='small_description'><strong>Experience:</strong> " . htmlspecialchars($job['experience']) . "</p>";
            echo "<p class='small_description'><strong>Salary:</strong> " . htmlspecialchars($job['salary']) . "</p>";

            echo "<p>" . nl2br(htmlspecialchars($job['description'])) . "</p>";
            echo "<h3><strong>Job Summary</strong></h3>";
            echo "<p><strong>Reference Number:</strong> " . htmlspecialchars($job['reference_number']) . "</p>";
            echo "<p><strong>Reports To:</strong> " . htmlspecialchars($job['reports_to']) . "</p>";

            echo "<h4>Key Responsibilities</h4><ul>";
            foreach (explode("\n", $job['responsibilities']) as $task) {
                echo "<li>" . htmlspecialchars($task) . "</li>";
            }
            echo "</ul>";

            if (!empty($job['logo_images'])) {
                echo "<div class='program_logo'>";
                foreach (explode(",", $job['logo_images']) as $logo) {
                    echo "<img src='styles/images/" . trim($logo) . "' alt='Tech logo'>";
                }
                echo "</div>";
            }

            echo "<h4>Essential Qualifications</h4><ul class='mandatory'>";
            foreach (explode("\n", $job['essential_qualifications']) as $qual) {
                echo "<li>" . htmlspecialchars($qual) . "</li>";
            }
            echo "</ul>";

            echo "<h4>Preferred Qualifications</h4><ul class='optional'>";
            foreach (explode("\n", $job['preferred_qualifications']) as $pref) {
                echo "<li>" . htmlspecialchars($pref) . "</li>";
            }
            echo "</ul>";

            echo "<h4>Benefits</h4><ul class='benefits'>";
            foreach (explode("\n", $job['benefits']) as $benefit) {
                echo "<li>" . htmlspecialchars($benefit) . "</li>";
            }
            echo "</ul>";

            echo '<a href="apply.php?job=' . urlencode($job['reference_number']) . '" class="quick-apply-button" role="button" aria-label="Apply now for ' . htmlspecialchars($job['title']) . '">Quick Apply</a>';
            echo "</section>";
        }
    } else {
        echo "<p>No job listings available at this time. Please check back later!</p>";
    }

    $conn->close();
    ?>
</main>

<aside>
    <h2>Apply Now!</h2>
    <p>See a position that fits your skills? Click the "Quick Apply" button under the listing to start your application process.</p>
</aside>

<?php include 'footer.inc'; ?>

</body>
</html>
