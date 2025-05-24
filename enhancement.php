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
      <p>We used PHP <code>include()</code> for header, navigation, and footer to reduce repetition and keep layout consistent across all pages.</p>
    </section>

    <section>
      <h3>2. “Other Skills” Validation</h3>
      <p>When the “Other Skills” checkbox is selected, users are required to enter text. This is enforced through both HTML and PHP validation.</p>
    </section>
    
  </main>

  <?php include("footer.inc"); ?>
</body>
</html>
