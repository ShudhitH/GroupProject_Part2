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
      <h3>1. Modular Layout using PHP Includes</h3>
      <p>We used PHP <code>include()</code> for header, nav, and footer to avoid repetition and ease updates.</p>
    </section>

    <section>
      <h3>2. “Other Skills” Validation</h3>
      <p>If the “Other Skills” checkbox is selected, we ensure that the text input is not empty.</p>
    </section>

    <section>
      <h3>3. Sortable EOI Records</h3>
      <p>The HR manager can sort records by first name, job reference, or status using a dropdown menu.</p>
    </section>

    <section>
      <h3>4. Login Lockout</h3>
      <p>This is to improve the security, login access is locked after three failed attemptss.</p>
    </section>
  </main>
  <?php include("footer.inc"); ?>
</body>
</html>
