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



    var_dump($_POST);
}
?>

<div class="container">
    <main class="form-signin w-50 m-auto">
        <form class="w-100 shadow rounded p-5" action="" method="post">
            <div>
                <label for="email">Email</label>
                <input for="text" name="email" id="email" class="form-control">
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <input for="text" name="lastname" id="lastname" class="form-control">
            </div>
            <div>
                <label for="firstname">Firstname</label>
                <input for="text" name="firstname" id="firstname" class="form-control">
            </div>
            <div>
                <label for="password">Password</label>
                <input for="text" name="password" id="password" class="form-control">
            </div>
            <div>
                <label for="passwordconf">Password Confirm</label>
                <input for="text" name="passwordconf" id="passwordconf" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </main>
</div>



<?php
require_once './partial/footer.php'
?>