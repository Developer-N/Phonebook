<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اعداد زوج</title>
    <link rel="stylesheet" href="bs/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="bs/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/myStyle.css">
    <script src="bs/bootstrap.bundle.min.js"></script>
</head>
<body class="container container-fluid">
<a href="index.php" class="fs-1 text-success">
    <i class="bi bi-house"></i>
</a>
<div class="card text-center">
    <div class="card-header text-success bg-success-subtle">
        <h1>اعداد زوج</h1>
    </div>
    <div class="card-body row">
        <?php
        for ($i = 0; $i <= 100; $i += 2) { ?>
            <p class="col fs-3 fw-bold text-success"><?= $i ?></p>
        <?php } ?>
    </div>
</div>
</body>
</html>