<?php
include 'Library.php';

$library = new Library();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Perpustakaan Sederhana</h1>

    <nav>
        <ul>
            <li><a href="#borrow">Peminjaman Buku</a></li>
            <li><a href="#return">Pengembalian Buku</a></li>
            <li><a href="#history">Histori Transaksi</a></li>
        </ul>
    </nav>

    <section id="register-section">
        <h2>Registrasi Member</h2>
        <form action="" method="post">
            <!-- Form registrasi -->
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="register" value="Daftar">
    </form>
    </section>

    <section id="borrow-section">
        <h2>Peminjaman Buku</h2>
        <form action="" method="post">
            <!-- Form peminjaman -->
    <form action="" method="post">
        <label for="member_id">ID Member:</label>
        <input type="text" name="member_id" required>
        <br>
        <label for="book_id">ID Buku:</label>
        <input type="text" name="book_id" required>
        <br>
        <input type="submit" name="borrow" value="Pinjam">
    </form>
    </section>

    <section id="return-section">
        <h2>Pengembalian Buku</h2>
        <form action="" method="post">
            <!-- Form pengembalian -->
    <form action="" method="post">
        <label for="member_id_return">ID Member:</label>
        <input type="text" name="member_id_return" required>
        <br>
        <label for="book_id_return">ID Buku:</label>
        <input type="text" name="book_id_return" required>
        <br>
        <input type="submit" name="return" value="Kembali">
    </form>
    </section>

    <section id="history-section">
        <h2>Histori Transaksi</h2>
        <form action="" method="post">
            <!-- Form melihat histori -->
    <form action="" method="post">
        <label for="member_id_history">ID Member:</label>
        <input type="text" name="member_id_history" required>
        <br>
        <input type="submit" name="view_history" value="Lihat Histori">
    </form>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["register"])) {
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $member_id = $library->registerMember($nama, $email, $password);

        if ($member_id) {
            $memberDetails = $library->getMemberDetails($member_id);
            echo "<p>Registrasi berhasil! ID Member Anda: $member_id, Nama: {$memberDetails['nama']}, Email: {$memberDetails['email']}</p>";
        } else {
            echo "<p>Registrasi gagal.</p>";
        }
        } elseif (isset($_POST["borrow"])) {
            $member_id = $_POST["member_id"];
            $book_id = $_POST["book_id"];

            $transaction_id = $library->borrowBook($member_id, $book_id);
            echo "<p>Peminjaman berhasil! ID Transaksi: $transaction_id</p>";
        } elseif (isset($_POST["return"])) {
            $member_id = $_POST["member_id_return"];
            $book_id = $_POST["book_id_return"];
            $member_id_history = $_POST["member_id_history"];

            // Tampilkan histori transaksi untuk member tertentu
            echo "<h3>Histori Transaksi untuk Member $member_id_history</h3>";
            echo "<ul>";

            $transactionHistory = $library->getTransactionHistory($member_id_history);

        if (!empty($transactionHistory)) {
            foreach ($transactionHistory as $transaction) {
                $type = ($transaction['tipe_transaksi'] == 'pinjam') ? 'Peminjaman' : 'Pengembalian';
                $book_id = $transaction['book_id'];
                $transaction_date = $transaction['tanggal_transaksi'];

                $memberDetails = $library->getMemberDetails($member_id_history);
                $memberName = $memberDetails ? $memberDetails['nama'] : "Tidak Diketahui";

                echo "<li>$type Buku ID $book_id pada $transaction_date oleh $memberName</li>";
            }
        } else {
            echo "<li>Histori transaksi tidak ditemukan untuk Member $member_id_history</li>";
        }

        echo "</ul>";
    }
}
    ?>

</body>

</html>
    
