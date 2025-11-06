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
        background: linear-gradient(135deg, #f8fafc 0%, #e3f6f5 100%);
        color: #4b4b4b;
      }
      .container {
        background: #fdf6fb;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(180, 180, 200, 0.08);
        padding: 2.5rem 2rem;
        margin-top: 2.5rem;
      }
      .list-group-item {
        background: #e3f6f5;
        color: #4b4b4b;
        border: none;
        border-radius: 10px;
        margin-bottom: 0.5rem;
        transition: background 0.2s;
      }
      .list-group-item:hover {
        background: #f7d9e3;
        color: #3a3a3a;
      }
      .alert-info {
        background: #f7d9e3;
        color: #4b4b4b;
        border: none;
        border-radius: 12px;
      }
      h1, .display-4 {
        color: #7f9cf5;
        font-weight: 600;
      }
      a {
        color: #7f9cf5;
        text-decoration: none;
        font-weight: 500;
      }
      a:hover {
        color: #e57399;
        text-decoration: underline;
      }
    </style>
</head>
<body>
  <div class="container">

  <?php
    if (! isset($_GET['file'])) {
      ?>
      <img class="img-fluid " src="no-destination.jpg" alt="Road Trip" class="img-fluid mb-4">      
      <h1 class="mt-3">Jammu to Kanyakumari Road Trip</h1>
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