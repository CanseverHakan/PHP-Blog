<?php
require_once './partial/header.php';
require_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $mail = $_POST['email'];
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $passw = $_POST['password'];
    $passwconf = $_POST['passwordconf'];

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email cannot be empty';
    }

    $regex = '/^[\w.-]+@([\w-]+\.)+[\w-]{2,4}$/';

    if (preg_match($regex, $mail)) {
        echo ' ';
    } else {
        $errors['email'] = 'Email invalid';
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Lastname cannot be empty';
    }

    if (strlen($_POST['lastname']) <= 2 || strlen($_POST['lastname']) >= 20) {
        $errors['lastname'] = 'The Lastname must contain between 2 and 50 characters';
    }

    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'firstname cannot be empty';
    }

    if (strlen($_POST['firstname']) <= 2 || strlen($_POST['lastname']) >= 20) {
        $errors['firstname'] = 'The First must contain between 2 and 50 characters';
    }

    if (strlen($passw) < 8 || strlen($passw) > 50) {
        $errors['password'] = "The Password must contain between 8 and 50 characters";
    }

    if ($passw != $passwconf) {
        $errors['password'] = "Passwords are not the same";
    }

    $hashedPassword = password_hash($passw, PASSWORD_DEFAULT);

    if (empty($errors)) {
        $member = "INSERT INTO `member`(`id_member`, `email`, `lastname`, `firstname`, `password`) 
        VALUES ('','$mail','$lname','$fname','$hashedPassword')";
        $query = $db->prepare($member);
        $query->execute();
        header('Location: login.php');
    }
}
?>

<div class="container">
    <main class="form-signin w-50 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">REGISTER</h1>
        <form class="w-100 shadow rounded p-5" action="" method="post">
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
                <div class="text-danger"><?= $errors['email'] ?? '' ?></div>
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control">
                <div class="text-danger"><?= $errors['lastname'] ?? '' ?></div>
            </div>
            <div>
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control">
                <div class="text-danger"><?= $errors['firstname'] ?? '' ?></div>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="text-danger"><?= $errors['password'] ?? '' ?></div>
            </div>
            <div>
                <label for="passwordconf">Password Confirm</label>
                <input type="password" name="passwordconf" id="passwordconf" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </main>
</div>



<?php
require_once './partial/footer.php'
?>