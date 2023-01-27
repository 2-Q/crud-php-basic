<?php
// memanggil file konseksi
include('./connection.php');

/**
 * mengambil data dari database
 */
$book = [];
if ($_GET['book_id']) {
    $book_id = $_GET['book_id'];
    $getBooks = mysqli_query($connection, "SELECT * FROM books WHERE id = $book_id");
    $book = mysqli_fetch_assoc($getBooks);
}


/**
 * simpan data
 */
if (count($_POST)) {
    // persiapan varaibel
    $title = $_POST['title'];
    $content = $_POST['content'];
    $book_id = $_GET['book_id'];

    if ($book_id) { // jika ada book_id maka buat queary update
        $sql =  "UPDATE books SET title = '$title', content = '$content' WHERE id = $book_id";
    } else { // jika ada book_id maka buat queary insert
        $sql =  "INSERT INTO books (title, content) VALUES ('$title', '$content')";
    }
    // eksekusi query
    mysqli_query($connection, $sql);

    // kembali ke halaman index
    header('Location: ' . '/index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD basic PHP</title>
    <link rel="stylesheet" href="./asset-template-adminLTE/dist/css/adminlte.min.css">
</head>

<body>
    <div style="background-color: rgba(0,0,0,.1); min-height: 100vh;">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="text-center">
                                <h4 class="mb-0">Form Data Book</h4>
                            </div>
                        </div>
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control" id="title" name="title" placeholder="Enter the title book" value="<?= $book['title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Fill the content"><?= $book['content'] ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex align-items-center" style="gap: .5rem;">
                                    <a class="px-2 py-1" href="/index.php">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>