<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دفترچه تلفن</title>
    <link rel="stylesheet" href="bs/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="bs/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/myStyle.css">
    <script src="bs/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">دفترچه تلفن</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="test.php">تست</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="even.php">اعداد زوج</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h3 class="alert alert-success text-center p-2 fw-bold fs-4">
        به دفترچه تلفن خوش آمدید.
    </h3>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header text-center text-success bg-success-subtle fs-3 fw-bold">فرم ثبت نام</div>
                <div class="card-body">
                    <form action="ContactController.php" method="post" enctype="multipart/form-data">
                        <div class="d-flex flex-row flex-wrap gap-3 mb-3">
                            <div class="">
                                <label for="firstName" class="form-label">نام*</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>

                            <div class="">
                                <label for="lastName" class="form-label">نام خانوادگی*</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>

                            <div class="">
                                <label for="mobile" class="form-label">موبایل*</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" required>
                            </div>

                            <div class="">
                                <label for="phone" class="form-label">تلفن ثابت</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>

                            <div class="col">
                                <label for="address" class="form-label">آدرس</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="">
                                <label for="photo" class="form-label">عکس پروفایل</label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                       accept=".jpeg, .jpg, .png">
                            </div>
                            <button type="submit" class="btn btn-success align-self-end">ثبت</button>
                        </div>

                    </form>
                    <?php if (isset($_GET['insert'])) { ?>
                        <p class="alert alert-success text-center fw-semibold"><?= $_GET['insert'] ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="alert alert-danger text-center fw-semibold"><?= $_GET['error'] ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <form class="d-flex m-4" action="#" method="post">
        <input class="form-control me-2 d-inline-block" type="search" placeholder="جستجو" aria-label="جستجو">
        <button class="btn btn-outline-success" type="submit">جستجو</button>
    </form>
    <div class="container d-flex flex-row flex-wrap gap-2 justify-content-center">
        <?php
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $databaseName = "Phonebook";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $databaseName);

        if ($conn->connect_error) {
            die("خطا در اتصال به پایگاه داده: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM contacts";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $index = 1;
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <div class="card-header text-success bg-success-subtle fw-bolder fs-5 text-center"><?= $row['firstName'] . ' ' . $row['lastName'] ?>
                    </div>
                    <div class="card-body d-flex flex-row gap-2">
                        <img class="img-fluid img-thumbnail rounded-5 profile" src="photos/<?= $row['photo'] ?>"
                             alt="profile">
                        <div class="d-flex flex-column">
                            <p>تلفن همراه: <?= $row['mobile'] ?></p>
                            <p>تلفن ثابت: <?= $row['phone'] ?></p>
                            <p>آدرس: <?= $row['address'] ?></p>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <p class="alert alert-warning text-center fw-semibold">هیچ مخاطبی ذخیره نشده است.</p>
        <?php } ?>
    </div>

</div>
</body>
</html>