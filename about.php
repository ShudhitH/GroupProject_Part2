<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TechNetwork Software Solutions</title>
    <meta name="author" content="Shafiullah Mohamed Hakkim">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<main>
    <header>
        <h1>About our group:</h1>
    </header>

    <section>
        <h2>Our group name and class details:</h2>
        <ul>
            <li>TechNetwork Software Solutions (TNSS) - 2:30PM Wednesday</li>
        </ul>
    </section>

    <section>
        <h2>Student IDs</h2>
        <ul>
            <li>Shudhit Hemrajani - 105924419</li>
            <li>Nicholas Kan - 105924419</li>
            <li>Shafiullah Mohamed Hakkim - 105532757</li>
            <li>Toan Nguyen Nhu Duc - 105924419</li>
        </ul>
    </section>

    <section>
        <h2>Our Tutor’s Name:</h2>
        <p>Rahul</p>
    </section>

    <section>
        <h2>Members' Contributions to This Project</h2>
        <dl>
            <dt><strong>Shudhit Hemrajani</strong></dt>
            <dd>Group Leader, About Page, CSS, Created eoi Database </dd>

            <dt><strong>Nicholas Kan</strong></dt>
            <dd>Application Page, CSS,</dd>

            <dt><strong>Shafiullah Mohamed Hakkim</strong></dt>
            <dd>Home Page, PHP Modularisation, settings.php, Enhancements Page</dd>

            <dt><strong>Toan Nguyen Nhu Duc</strong></dt>
            <dd>Job Description Page, CSS, job Table, Job.php</dd>
        </dl>
    </section>

    <section>
        <h2>Our Group Photo</h2>
        <figure>
            <img src="images/group.png" alt="Group Photo" width="300">
            <figcaption>The TNSS Team</figcaption>
        </figure>
    </section>

    <section>
        <h2>Our Interests</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th colspan="2">Interests</th>
            </tr>

            <tr><td rowspan="3">Shudhit Hemrajani</td><td>Badminton</td></tr>
            <tr><td>Gaming</td></tr>
            <tr><td>F1</td></tr>

            <tr><td rowspan="3">Nicholas Kan</td><td>Sports</td></tr>
            <tr><td>Gym</td></tr>
            <tr><td>Coding</td></tr>

            <tr><td rowspan="3">Shafiullah Mohamed Hakkim</td><td>Cricket</td></tr>
            <tr><td>Driving</td></tr>
            <tr><td>Travel</td></tr>

            <tr><td rowspan="4">Toan Nguyen Nhu Duc</td><td>Soccer</td></tr>
            <tr><td>Video Games</td></tr>
            <tr><td>Solving Puzzles</td></tr>
            <tr><td>Coding</td></tr>
        </table>
    </section>
</main>

<?php include("footer.inc"); ?>

</body>
</html>
