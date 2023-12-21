<?php
require_once './partial/header.php';
require_once './db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }
    $email = $_POST['email'];

    $query = "SELECT * FROM member WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['user']['id_member'] = $user['id_member'];
            $_SESSION['user']['email'] = $user['email'];
            header('Location: index.php');
            exit();
        } else {
            $errors['password'] = 'Password invalid';
        }
    } else {
        $errors['email'] = 'Email not found';
    }
}



?>

<div class="container">
    <main class="form-signin w-50 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">LOGIN</h1>
        <form class="w-100 shadow rounded p-5" action="" method="post">
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
                <div class="text-danger"><?= $errors['email'] ?? '' ?></div>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="text-danger"><?= $errors['password'] ?? '' ?></div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </main>
</div>

<?php
require_once './partial/footer.php';

?>