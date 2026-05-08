<?php include "koneksi.php"; ?>
<?php ob_start(); ?>
<?php $page = $_GET['page'] ?? 'home'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Personal Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body style="
background:#f1f5f9;
display:flex;
flex-direction:column;
min-height:100vh;
">

<?php include "header.php"; ?>
<?php include "menu.php"; ?>

<div class="container-fluid px-4" style="flex:1;">

  <div class="row g-4 mt-1">

    <div class="col-md-3">
      <?php include "sidebar.php"; ?>
    </div>

    <div class="col-md-9">

      <div class="p-4 rounded-4 shadow-sm" style="background:white;">
        <?php include "main.php"; ?>
      </div>

    </div>

  </div>

</div>

<?php include "footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>