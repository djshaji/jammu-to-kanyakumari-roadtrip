<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jammu to Kanyakumari Road Trip</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font - Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
      }
    </style>
</head>
<body>
  <div class="container">

  <?php
    if (! isset($_GET['file'])) {
      ?>
      <h1 class="mt-5">Jammu to Kanyakumari Road Trip</h1>
      <p class="lead">Welcome to the documentation of my road trip from Jammu to Kanyakumari. Please select a day to view the details:</p>
      <ul class="list-group">
      <?php
        $files = glob ("routes/*.md");
        foreach ($files as $file) {
          $day = basename($file, ".md");
          echo '<li class="list-group-item"><a href="day.php?file=' . urlencode($file) . '">' . htmlspecialchars(ucwords(str_replace('-', ' ', $day))) . '</a></li>';
        }
      ?>
      </ul>
      <?php
    } else {
      echo "<div class='display-4 mt-5 mb-3 alert alert-info'>$_GET[file]</div>";
      require "../Parsedown.php";
      $Parsedown = new Parsedown();
      $filename = $_GET['file'] ?? 'jammu-to-kanyakumari-roadtrip.md';
      $markdown = file_get_contents($filename);
      echo $Parsedown->text($markdown);
    }
  ?>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>