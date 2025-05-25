<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Enhancements</title>
  <meta name="author" content="Shafiullah Mohamed Hakkim" />
  <link rel="stylesheet" href="styles/styles.css" />
</head>
<body>
  <?php include("header.inc"); ?>
  <?php include("nav.inc"); ?>

  <main>
    <h2>Enhancements</h2>

    <section>
      <h3>1. Similar Layout using PHP Includes</h3>
      <p>We used PHP <code>include()</code> for header, navigation, and footer to reduce repetition and keep layout same and clean across all pages.</p>
    </section>

    <section>
      <h3>2. “Other Skills” Validation</h3>
      <p>When the “Other Skills” checkbox is selected, users are required to enter text. This is done through both HTML and PHP validation.</p>
    </section>
    <section>
      <h3>3. EOI Sorting in Manager Page</h3>
      <p>The Enhancement made in the Manger page is ,The manager can sort EOI submissions by name, job reference number, or application status using a dropdown with dynamic SQL <code>ORDER BY</code>.</p>
    </section>
     <section>
      <h3>4. Manager Login System</h3>
      <p>The Enhancement made in Login system are ,Access to <code>manage.php</code> is restricted using a login form that verifies the details against the database. Prepared statements are used to prevent SQL injection.</p>
    </section>
    
  </main>

  <?php include("footer.inc"); ?>
</body>
</html>
