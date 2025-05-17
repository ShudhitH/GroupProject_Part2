<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>
  <!-- header -->
    <header>
      <div class="header-container">
        <img src="styles/images/image.logo.png" alt="TechNetwork Software Solutions Logo" class="logo">
        <div class="header-text">
            <h1>Tech Network Software Solutions</h1>
            <p>Advanced Software Development Company Hiring the Best Talent in the Industry</p>
        </div>
      </div>
    </header>

    <!-- navigation -->
    <nav>
      <ul>
        <!-- links to all other pages of this website -->
          <li><a href="index.html">Home</a></li>
          <li><a href="job.html">Job Description</a></li>
          <li><a href="apply.html">Apply</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="mailto:info@TechNetworkSoftwaresolutions.com.au">Contact Us</a></li>
      </ul>
  </nav>

    <!-- Group name and class -->
    <section> 
        <h2 class="about-head">About us Page:</h2>
        <div>
          <h3>Our group name and class details:</h3>
          <p>Tech Network Software Solutions (TNSS) - 2:30PM Wednesday</p>
        </div>
    </section>

    <!-- Student IDs -->
    <div>
      <aside id="id">
        <!-- creating undordered list -->
         <p>Student IDs</p>
        <ul class="student-ids">
          <!-- creating list items -->
            <li>Shudhit Hemrajani - 105924419</li>
            <li>Nicholas Kan - 105923474</li>
            <li>Shafiullah Mohamed Hakkim - 105532757</li>
            <li>Toan Nguyen Nhu Duc - 105076035</li>
        </ul>
      </aside>
    </div>

    <!-- Tutors Name -->
    <section>
        <h2>Our Tutors name:</h2>
        <p>Rahul R</p>
    </section>

    <!-- Members contribution -->
    <section>
      <!-- creating definition lists, terms, and descriptions -->
        <h2>Members contribution to this project:</h2>
        <dl>
            <dt><strong>Member 1: </strong>Shudhit Hemrajani</dt>
            <dd>About Page, CSS</dd>

            <dt><strong>Member 2: </strong>Nicholas Kan</dt>
            <dd>Application Page, CSS</dd>

            <dt><strong>Member 3: </strong>Shafiullah Mohamed Hakkim</dt>
            <dd>Home Page, CSS</dd>

            <dt><strong>Member 4: </strong>Toan Nguyen Nhu Duc</dt>
            <dd>Job Description Page, CSS</dd>
        </dl>
    </section>

    <!-- Group Image -->
    <section class="group-image-section">
      <div class="group-image-container">
        <h2>Group Image:</h2>
        <figure class="group-img">
          <figcaption>Our group:</figcaption>
          <img src="styles/images/group.png" alt="Group Members">
        </figure>
      </div>
    </section>

    <!-- Members Interests -->
    <section>
      <!-- Creating a Table, Table Rows, Table Headers, and Table Data to enter in information -->
        <h2 class="table-title"> Our Interests:</h2>
        <!-- Adding a 1 pixel wide border -->
        <table class="interests">
            <tr>
                <th>Name</th>
                <th>Interests</th>
            </tr>

            <!-- Member 1 -->
            <tr>
                <td rowspan="3">Shudhit Hemrajani</td> <!-- Spans 3 rows -->
                <td>Badminton</td>
            </tr>
              <tr>
                <td>Gaming</td>
              </tr>
              <tr>
                <td>F1</td>
              </tr>

             <!-- Member 2 -->
             <tr>
                <td rowspan="3">Nicholas Kan</td> <!-- Spans 3 rows  -->
                <td>Sports</td>
            </tr>
              <tr>
                <td>Gym</td>
              </tr>
              <tr>
                <td>Coding</td>
              </tr>

             <!-- Member 3 -->
             <tr>
                <td rowspan="3">Shafiullah Mohamed Hakkim</td> <!-- Spans 3 rows -->
                <td>Cricket</td>
            </tr>
              <tr>
                <td>Driving</td>
              </tr>
              <tr>
                <td>Travel</td>
              </tr>
             <!-- Member 4 -->
             <tr>
                <td rowspan="4">Toan Nguyen Nhu Duc</td> <!-- Spans 4 rows -->
                <td>Soccer</td>
            </tr>
              <tr>
                <td>Video Games</td>
              </tr>
              <tr>
                <td>Solving Puzzles</td>
              </tr>
              <tr>
                <td>Coding</td>
              </tr>
        </table>
    </section>

    <!-- Our group profile -->
    <section>
      <h2 class="about-head">Get to know us more! - Our Group Profile:</h2>
      <p class="group-profile-box">
        Shudhit Hemrajani: <br>
        Demographics:<br>
        DOB: 15/05/2006<br>
        Nationality: Indian<br>
        Gender: Male<br>
        Hometown: Dubai, United Arab Emirates<br>
        Favourite things to do: Basketball, soccer, volleyball, music - rnb
      </p>
      <p class="group-profile-box">
        Nicholas Kan: <br>
        Demographics:<br>
        18 years old<br>
        Nationality: Malaysian/Vietnamese<br>
        Gender: Male<br>
        Hometown: Cranbourne, Victoria<br>
        Favourite things to do: Watch F1, Play games
      </p>
      <p class="group-profile-box">
        Shafiullah Mohamed Hakkim <br>
        Demographics:<br>
        19 years old<br>
        Nationality: Indian<br>
        Gender: Male<br>
        Hometown: Chennai, Tamilnadu, India<br>
        Favourite things to do: Cars, Travelling, Gadgets
      </p>
      <p class="group-profile-box">
        Toan Nguyen Nhu Duc<br>
        Demographics:<br>
        DOB: 28/09/2006<br>
        Nationality: Vietnamese<br>
        Gender: Male<br>
        Hometown: Hanoi, Vietnam<br>
        Favourite things to do: Video games - Elden Ring
      </p>
    </section>

    <!-- Footer -->
    <footer>
      <p>&copy; 2025 TechNetwork Software Solutions. All rights reserved.</p>
      <p><a href="https://shudhithemrajani.atlassian.net/jira/software/projects/TGP/boards/35">Jira Project Link</a></p>
  </footer>
</body>
</html>