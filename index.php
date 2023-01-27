<?php

/**
 * membuat koneksi ke database
 * mysqli_connect(host, username_db, password, nama_database)
 */
$connection = mysqli_connect("127.0.0.1", "root", "", "crud");


/**
 * menghapus data buku
 */
if ($_POST['book_id']) {
    $book_id = $_POST['book_id'];
    mysqli_query($connection, "DELETE FROM  books WHERE id = $book_id");
}


/**
 * mengambil data dari database
 */
$getBooks = mysqli_query($connection, "SELECT * FROM books");
$books = [];
while ($book = mysqli_fetch_assoc($getBooks)) {
    $books[] = $book;
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
                                <h4 class="mb-0">Book Lists</h4>
                                <small>Book of library in SMKN 1 Jenangan</small>
                            </div>
                        </div>
                        <div class="card-body card-body table-responsive">
                            <a href="/data.php" class="btn btn-sm btn-success px-3">Add New Book</a>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="min-width: 20rem;">Judul</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($books as $key => $book) :
                                    ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $book['title'] ?></td>
                                            <td class="d-flex justify-content-center align-items-center" style="gap: .25rem;">
                                                <a href="detail.php?book_id=<?= $book['id'] ?>" class="btn btn-sm btn-info">detail</a>
                                                <a href="data.php?book_id=<?= $book['id'] ?>" class="btn btn-sm btn-warning">edit</a>
                                                <form method="post" onsubmit="return confirm('Are u sure?')">
                                                    <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                                                    <button class="btn btn-sm btn-danger">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>