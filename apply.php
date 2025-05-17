<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Application Page</title>
    <meta charset="UTF-8">
    <meta name="description" content="Job Application Page for Web Development Project">
    <meta name="keywords" content="HTML5">
    <meta name="author" content="Nicholas Kan">  
    <link rel="stylesheet" href="styles/style1.css">  
</head>
<body>

    <header>
        <div class="header-container">
            <img src="styles/images/image.logo.png" alt="TechNetwork Software Solutions Logo" class="logo">
            <div class="header-text">
                <h1>Tech Network Software Solutions</h1>
                <p>Advanced Software Development Company Hiring the Best Talent in the Industry</p>
            </div>
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="job.html">Job Description</a></li>
            <li><a href="apply.html">Apply</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="mailto:info@TechNetworkSoftwaresolutions.com.au">Contact Us</a></li>
        </ul>
    </nav>
    <br>
    <main class="main-3">
        <img src="styles/images/job.application.jpg" alt="Job Application Logo" width="757" height="400"><hr>
        <h2>Job Application Form</h2><hr>
        <form action="process_eoi.php" method="post" novalidate="novalidate">
        <!-- Linking to mercury for submit page -->
    
            <!-- Job Reference Number -->
            <label for="Job-Reference-Number">Job Reference Number:</label>
                <select id="Job-Reference-Number" name="jobReferenceNumber" required>
                    <option value="">Select a job</option>
                    <option value="Software Developer">SD289</option>
                    <option value="Website Designer">WD229</option>
                </select><br><br>
            <!-- Selection for all job reference numbers with values of the actual jobs -->

            <!-- First Name -->
            <label for="First-Name">First Name:</label>
                <input type="text" id="First-Name" name="firstName" maxlength="20" required><br><br>

            <!-- Last Name -->
            <label for="Last-Name">Last Name:</label>
                <input type="text" id="Last-Name" name="lastName" maxlength="20" required><br><br>

            <!-- 'maxlength="20"' means that only a maximum of 20 characters can be used for this section, allowing for majority of names to have the ability to fill it out (For First Name and Last Name) -->


            <!-- Date of Birth -->
            <label for="Date-of-Birth">Date of Birth (dd/mm/yyyy):</label>
                <input type="text" id="Date-of-Birth" name="dob" pattern="\d{2}/\d{2}/\d{4}" required><br><br>
            <!-- 2 numbers for day, 2 numbers for month, 4 numbers for year. Required to look like dd/mm/yyyy or else it won't be allowed -->
            <!-- 'pattern' in <input> forces the survey-filler to input what is required from each section -->

            <!-- Gender -->
            <fieldset>
                <legend>Gender</legend>
                <!-- 'radio' means that the options to select from on the application page will have circles next to them that you can click on (Only 1 allowed to be selected)-->
                <input type="radio" id="male" name="Gender" value="Male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="Gender" value="Female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="Gender" value="Other">
                <label for="other">Other</label>
            </fieldset><br>

            <!-- Street Address -->
            <label for="Street-Address">Street Address:</label>
                <input type="text" id="Street-Address" name="streetAddress" maxlength="40" required><br><br>

            <!-- Suburb/Town -->
            <label for="Suburb/Town">Suburb/Town:</label>
                <input type="text" id="Suburb/Town" name="suburbTown" maxlength="40" required><br><br>

            <!-- 'maxlength="40" means that there can only be a maximum of 40 characters within the box, allowing for majority of addresses and suburbs/towns to be typed in and avoiding longer addresses and suburbs/towns'-->

            <!-- State -->
            <label for="State">State:</label>
                <select id="State" name="State" required>
                    <option value="">Select</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select><br><br>

            <!-- Postcode -->
                <label for="Postcode">Postcode:</label>
                    <input type="text" id="Postcode" name="Postcode" pattern="\d{4}" required><br><br>
            <!-- 'pattern="\d{4}"' mkes it so that only 4 *digits* are allowed -->
            <!-- what does '4 digits based on States' mean? -->

            <!-- Email Address -->
                <label for="Email-Address">Email Address:</label>
                    <input type="email" id="Email-Address" name="emailAddress" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$" required><br><br>
            <!-- 'pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$"' limits the survey-filler to only letters in the alphabet both uppercase and lowercase, digits from 0-9, and different symbols, @ and . is required also -->

            <!-- Phone Number -->
                <label for="Phone-Number">Phone Number:</label>
                    <input type="text" id="Phone-Number" name="phoneNumber" pattern="[\d\s]{8,12}" required><br><br>
            <!-- 'pattern"[\d\s]{8,12}"' makes it so that only 8 to 12 *digits* are allowed, also allowing for spaces -->

            <!-- Required Technical Skills -->
                <fieldset class="skills">
                    <legend>Required Technical Skills</legend>
                        <input type="checkbox" id="HTML" name="skills[]" value="HTML" checked="checked">
                        <label for="HTML">HTML</label>
                        <input type="checkbox" id="CSS" name="skills[]" value="CSS">
                        <label for="CSS">CSS</label>
                        <input type="checkbox" id="JavaScript" name="skills[]" value="JavaScript">
                        <label for="JavaScript">JavaScript</label>
                        <input type="checkbox" id="Python" name="skills[]" value="Python">
                        <label for="Python">Python</label>
                    <!-- Different skills needed relating to a software developer -->
                    <!-- Checkbox instead of radio, can choose more than one option -->
                </fieldset><br>

            <!-- Other Skills -->
                <label for="Other-Skills">Other Skills:</label><br>
                    <textarea id="Other-Skills" name="Other-Skills" rows="4" cols="40"></textarea><br><br>
            <input type="checkbox" id="OtherSkillsCheckbox" name="otherSkillsCheckbox">
            <label for="OtherSkillsCheckbox">I have additional skills</label><br><br>
            <!-- Allows for survey-fillers to state their skills outside of the required technical ones -->

            <!-- Submit -->
                <input class="submit" type="submit" value="Apply">

        </form>
    </main>
    
    <aside>
        <p>*Please Only Fill Out This Form If You Wish To Apply For A Job At TNSS!</p>
    </aside>

    <footer>
        <p>&copy; 2025 TechNetwork Software Solutions. All rights reserved.
            <br><a href="https://shudhithemrajani.atlassian.net/jira/software/projects/TGP/boards/35">Jira Project Link</a></p>
    </footer>
    
</body>
</html>
