<?php
// memanggil file konseksi
include('./connection.php');

/**
 * mengambil data dari database
 */
$book = null;
if ($_GET['book_id']) {
    $book_id = $_GET['book_id'];
    $getBooks = mysqli_query($connection, "SELECT * FROM books WHERE id = $book_id");
    $book = mysqli_fetch_assoc($getBooks);
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
                                <h4 class="mb-0">Book Detail</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($book) : ?>
                                <h3><?= $book['title'] ?></h3>
                                <p><?= $book['content'] ?></p>
                            <?php else : ?>
                                <div class="text-center pt-3 pb-5">Data Tidak ditemukan</div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <a class="px-2 py-1" href="/index.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>