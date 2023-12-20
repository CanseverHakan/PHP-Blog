<?php
require_once './partial/header.php';
require_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $title = $_POST['titles'];
    $article = $_POST['articles'];
    $image = time() . '_' . $_FILES['images']['name'];

    if (empty($_POST['titles'])) {
        $errors['titles'] = 'Title cannot be empty';
    }

    if (strlen($_POST['titles']) <= 3 || strlen($_POST['titles']) >= 50) {
        $errors['titles'] = 'The title must contain between 3 and 50 characters';
    }

    if (empty($_POST['articles'])) {
        $errors['articles'] = 'Article cannot by empty';
    }

    if (strlen($_POST['articles'] <= 10)) {
        $errors['articles'] = 'Article is too short';
    }

    if (!empty($_FILES['images'])) {
        $ext = strtolower(pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION));
        $allowed_extension = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ext, $allowed_extension)) {
            $errors['images'] = 'Extension not allowed';
        }
    } else {
        $errors['images'] = 'Cannot be sent without image';
    }

    if ($_FILES['images']['size'] > 10000000) {
        $errors['images'] = 'Image size too large';
    }

    if (empty($errors)) {

        $insert = "INSERT INTO `articles`(`id_article`, `titre`, `contenu`, `date_creation`, `photo`, `auteur`) 
        VALUES ('','$title','$article','','$image','')";
        $query = $db->prepare($insert);
        $query->execute();
    }

    var_dump($errors);
}
?>

<h1 class="text-center">Add Article</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="titles">title</label>
                    <input for="text" name="titles" id="titles" class="form-control" placeholder="Title of the article"></input>
                    <textarea class="form-control" name="articles" id="article" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="images">image</label>
                    <input type="file" name="images" id="images" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once './partial/footer.php'
?>