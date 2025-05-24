<?php
// Start session and include database settings
session_start();
require_once 'settings.php';

// Establish database connection
$conn = new mysqli("localhost", "root", "", "eoi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";  // Message to show success or error feedback

// Fetch all job reference numbers for the dropdown menu
$references = [];
$ref_result = $conn->query("SELECT reference_number FROM jobs");
if ($ref_result && $ref_result->num_rows > 0) {
    while ($row = $ref_result->fetch_assoc()) {
        $references[] = $row['reference_number'];
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from form input
    $reference_number = $_POST['reference_number'];
    $description = trim($_POST['description']);
    $responsibilities = trim($_POST['responsibilities']);
    $essential_qualifications = trim($_POST['essential_qualifications']);
    $preferred_qualifications = trim($_POST['preferred_qualifications']);
    $benefits = trim($_POST['benefits']);

    // Check that a reference number is selected
    if (!empty($reference_number)) {
        // Prepare SQL UPDATE statement to update job details
        $stmt = $conn->prepare("UPDATE jobs 
            SET description=?, responsibilities=?, essential_qualifications=?, preferred_qualifications=?, benefits=? 
            WHERE reference_number=?");
        $stmt->bind_param("ssssss", $description, $responsibilities, $essential_qualifications, $preferred_qualifications, $benefits, $reference_number);

        // Execute the query and check result
        if ($stmt->execute()) {
            $message = "✅ Job description updated successfully.";
        } else {
            $message = "❌ Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "❌ Please select a reference number.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Job Description</title>
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>

<!-- Include header and navigation -->
<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

<main>
    <section class="content_box">
        <h1 class="box_header">Update Job Description</h1>

        <!-- Display status message -->
        <p><?php echo htmlspecialchars($message); ?></p>

        <!-- Form to update a job description -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <!-- Dropdown to select reference number -->
            <label for="reference_number">Select Reference Number:</label><br>
            <select name="reference_number" id="reference_number" required>
                <option value="">-- Select a Reference Number --</option>
                <?php foreach ($references as $ref): ?>
                    <option value="<?php echo htmlspecialchars($ref); ?>"><?php echo htmlspecialchars($ref); ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <!-- Job details to update -->
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="5" cols="60" required></textarea><br><br>

            <label for="responsibilities">Responsibilities (one per line):</label><br>
            <textarea id="responsibilities" name="responsibilities" rows="5" cols="60" required></textarea><br><br>

            <label for="essential_qualifications">Essential Qualifications (one per line):</label><br>
            <textarea id="essential_qualifications" name="essential_qualifications" rows="5" cols="60" required></textarea><br><br>

            <label for="preferred_qualifications">Preferred Qualifications (one per line):</label><br>
            <textarea id="preferred_qualifications" name="preferred_qualifications" rows="5" cols="60" required></textarea><br><br>

            <label for="benefits">Benefits (one per line):</label><br>
            <textarea id="benefits" name="benefits" rows="5" cols="60" required></textarea><br><br>

            <!-- Submit button -->
            <input type="submit" value="Update Job" class="quick-apply-button">
        </form>
    </section>
</main>

<!-- Include footer -->
<?php include 'footer.inc'; ?>
</body>
</html>
