<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// checks if form was submitted using POST, otherwise it redirects back to form page
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: apply.php"); // redirect to the form page
    exit();
}

// Connnects to database with the hostname, username password and database name
$conn = mysqli_connect("localhost", "root", "", "eoi");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the 'eoi' table if it doesn't exist
$tableCheckSQL = "
    CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        jobReferenceNumber VARCHAR(10) NOT NULL,
        firstName VARCHAR(20) NOT NULL,
        lastName VARCHAR(20) NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(10) NOT NULL,
        streetAddress VARCHAR(40) NOT NULL,
        suburbTown VARCHAR(40) NOT NULL,
        state VARCHAR(3) NOT NULL,
        postcode VARCHAR(4) NOT NULL,
        emailAddress VARCHAR(100) NOT NULL,
        phoneNumber VARCHAR(20) NOT NULL,
        skill1 VARCHAR(30),
        skill2 VARCHAR(30),
        skill3 VARCHAR(30),
        otherSkills TEXT
    );
";

if (!mysqli_query($conn, $tableCheckSQL)) {
    die("Error creating table: " . mysqli_error($conn));
}

// a function to sanitize to prevent attacks
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Sanitizing inputs from the form submission
$jobRef = isset($_POST['jobReferenceNumber']) ? clean_input($_POST['jobReferenceNumber']) : '';
$firstName = isset($_POST['firstName']) ? clean_input($_POST['firstName']) : '';
$lastName = isset($_POST['lastName']) ? clean_input($_POST['lastName']) : '';
$dob = isset($_POST['dob']) ? clean_input($_POST['dob']) : '';
$gender = isset($_POST['gender']) ? clean_input($_POST['gender']) : '';
$street = isset($_POST['streetAddress']) ? clean_input($_POST['streetAddress']) : '';
$suburb = isset($_POST['suburbTown']) ? clean_input($_POST['suburbTown']) : '';
$state = isset($_POST['state']) ? clean_input($_POST['state']) : '';
$postcode = isset($_POST['postcode']) ? clean_input($_POST['postcode']) : '';
$email = isset($_POST['emailAddress']) ? clean_input($_POST['emailAddress']) : '';
$phone = isset($_POST['phoneNumber']) ? preg_replace('/\s+/', '', clean_input($_POST['phoneNumber'])) : '';
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
$otherskills = isset($_POST['otherSkills']) ? clean_input($_POST['otherSkills']) : '';

// creating an array to hold the validation errors
$errors = [];

// validating job reference numbers
if (empty($jobRef)) {
    $errors[] = "Job Reference Number is required.";
}

// validating first name and making it max of 20 chars
if (empty($firstName)) {
    $errors[] = "First name is required.";
} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $firstName)) {
    $errors[] = "First name must be alphabetic and up to 20 characters.";
}

// validatiing last name and making it max 20 chars
if (empty($lastName)) {
    $errors[] = "Last name is required.";
} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $lastName)) {
    $errors[] = "Last name must be alphabetic and up to 20 characters.";
}

// validating dob and makig sure its in dd/mm/yyyy format with a vlaid date
if (empty($dob)) {
    $errors[] = "Date of Birth is required.";
} elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dob)) {
    $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
} else {
    $dateParts = explode('/', $dob);
    // checking if the date is valid via php checkdate function
    if (!checkdate((int)$dateParts[1], (int)$dateParts[0], (int)$dateParts[2])) {
        $errors[] = "Date of Birth is not a valid date.";
    }
}

// validating gender must be one of thy two options
$allowedGenders = ['Male', 'Female', 'Other'];
if (empty($gender) || !in_array($gender, $allowedGenders)) {
    $errors[] = "Please select a valid gender.";
}

// validating street address and making it a max of 40 chars
if (empty($street)) {
    $errors[] = "Street Address is required.";
} elseif (strlen($street) > 40) {
    $errors[] = "Street Address cannot be longer than 40 characters.";
}

// validating suburb/town making it max of 40 chars
if (empty($suburb)) {
    $errors[] = "Suburb/Town is required.";
} elseif (strlen($suburb) > 40) {
    $errors[] = "Suburb/Town cannot be longer than 40 characters.";
}

// validating state making sure its one of the aus states only
$allowedStates = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
if (empty($state) || !in_array($state, $allowedStates)) {
    $errors[] = "Please select a valid state.";
}

// validating postcode making sure its only 4 digits and matches the selected state
if (empty($postcode)) {
    $errors[] = "Postcode is required.";
} elseif (!preg_match('/^\d{4}$/', $postcode)) {
    $errors[] = "Postcode must be exactly 4 digits.";
} else {
    $postcodeFirstDigit = $postcode[0];
    // map of the states to validate starting digits for postcodes
    $statePostcodeMap = [
        'VIC' => ['3', '8'],
        'NSW' => ['1', '2'],
        'QLD' => ['4', '9'],
        'NT'  => ['0'],
        'WA'  => ['6'],
        'SA'  => ['5'],
        'TAS' => ['7'],
        'ACT' => ['0']
    ];
    // checking if postcodes first digit matches the expected digit
    if (!in_array($postcodeFirstDigit, $statePostcodeMap[$state] ?? [])) {
        $errors[] = "Postcode does not match the selected state.";
    }
}

// validating email making sure it is a valid email format
if (empty($email)) {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// validating phone numher must be between 8-12 digits
$phoneDigits = preg_replace('/\D/', '', $phone); // removes non-number chars
if (empty($phone)) {
    $errors[] = "Phone Number is required.";
} elseif (strlen($phoneDigits) < 8 || strlen($phoneDigits) > 12) {
    $errors[] = "Phone number must be between 8 and 12 digits.";
}

// validating rtsl making sore atleast one skill is selected
if (empty($skills) || count($skills) == 0) {
    $errors[] = "Please select at least one technical skill.";
}

// validating other skills, if checkbox is clicked other skills must be specified
$otherSkillsCheckbox = $_POST['otherSkillsCheckbox'] ?? '';
if ($otherSkillsCheckbox === 'on' && empty($otherskills)) {
    $errors[] = "Please specify your other skills.";
}

// if there are any errors its displays them and stops further processing
if (count($errors) > 0) {
    echo "<h2>There were errors in your submission:</h2><ul>";
    foreach ($errors as $error) {
        // output each error safely using htmlspecialchars
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><p><a href='your_form_page.php'>Go back to the form</a></p>";
    exit();
}

// converts dob from dd/mm/yyy to yyyy-mm-dd for sql
$dateParts = explode('/', $dob);
$dobFormatted = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];

// repeats required field checks and validations but kept to ensure all required fields are present
// this second validation block validates without format checking
$errors = [];

if (empty($jobRef)) $errors[] = "Job Reference Number is required.";
if (empty($firstName)) $errors[] = "First name is required.";
if (empty($lastName)) $errors[] = "Last name is required.";
if (empty($dob)) $errors[] = "Date of Birth is required.";
if (empty($gender)) $errors[] = "Gender is required.";
if (empty($street)) $errors[] = "Street Address is required.";
if (empty($suburb)) $errors[] = "Suburb/Town is required.";
if (empty($state)) $errors[] = "State is required.";
if (empty($postcode)) $errors[] = "Postcode is required.";
if (empty($email)) $errors[] = "Email Address is required.";
if (empty($phone)) $errors[] = "Phone Number is required.";

// validating dob format and checking checkdate
if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dob)) {
    $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
} else {
    $dateParts = explode('/', $dob);
    if (!checkdate((int)$dateParts[1], (int)$dateParts[0], (int)$dateParts[2])) {
        $errors[] = "Date of Birth is not a valid date.";
    }
}

// validating email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // checks if string is valid email 
    $errors[] = "Invalid email format.";
}

// validating phone no digits length 
if (!preg_match('/^\d{8,}$/', preg_replace('/\D/', '', $phone))) {
    $errors[] = "Phone number must contain at least 8 digits.";
}

// if any errors it displays them then exits
if (count($errors) > 0) {
    echo "<h2>There were errors in your submission:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><p><a href='your_form_page.php'>Go back to the form</a></p>";
    exit();
}


// getitng upto three skills from the skills array
$skill1 = $skills[0] ?? null;
$skill2 = $skills[1] ?? null;
$skill3 = $skills[2] ?? null;

// sql insert statement with the placeholders for prepared statment
$sql = "INSERT INTO eoi (
    jobReferenceNumber, firstName, lastName, dob, gender, streetAddress, suburbTown, state, postcode,
    emailAddress, phoneNumber, skill1, skill2, skill3, otherSkills
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// sqal statement that prevents sql injection
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    // binding variables to the statement paraments as strings
    mysqli_stmt_bind_param($stmt, "sssssssssssssss",
        $jobRef, $firstName, $lastName, $dobFormatted, $gender,
        $street, $suburb, $state, $postcode, $email,
        $phone, $skill1, $skill2, $skill3, $otherskills
    );

    // executing the prepped statement
    if (mysqli_stmt_execute($stmt)) {
        // gets auto generated id of inserted record
        $eoiID = mysqli_insert_id($conn);
        echo "<h2>Thank you! Your EOI Number is: {$eoiID}</h2>";
    } else {
        // displays error if execution fails
        echo "<h2>Error: " . mysqli_error($conn) . "</h2>";
    }
} else {
    // display error if statement prep fails
    echo "<h2>Preparation failed: " . mysqli_error($conn) . "</h2>";
}

// closes the database connection
mysqli_close($conn);
?>
