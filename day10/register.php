<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['success']);


/**
 * If page is opened directly (GET request),
 * clear old form values
 */
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     unset($_SESSION['old']);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <?php include "partial/header.php" ?>

    <section>
        <div class="container mt-5 col-md-6">
            <h1>Registration Form</h1>

            <!-- ERROR ALERT -->
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error) { ?>
                            <li><?= $error ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <!-- SUCCESS ALERT -->
            <?php if ($success) { ?>
                <div class="alert alert-success">
                    <?= $success ?>
                </div>
            <?php } ?>

            <form action="process.php" method="POST">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"
                        value="<?= $_SESSION['old']['name'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"
                        value="<?= $_SESSION['old']['email'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>College</label>
                    <input type="text" class="form-control" name="college"
                        value="<?= $_SESSION['old']['college'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label>Branch</label>
                    <input type="text" class="form-control" name="branch"
                        value="<?= $_SESSION['old']['branch'] ?? '' ?>">
                    <input type="hidden" name="id_hidden" value="1">
                </div>

                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <?php include "partial/footer.php" ?>
</body>

</html>