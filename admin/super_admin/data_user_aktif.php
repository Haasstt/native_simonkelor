<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <a>User Account Aktif</a>
    </div>
    <div class="container">
        <button class="btn btn-success text-white me-2" onClick="handleShow()">
            Tambah Data
        </button>
        <?php
        // Data pengguna statis
        $pengguna = array(
            array("ID" => 1, "Nama" => "John Doe", "Email" => "johndoe@example.com"),
            array("ID" => 2, "Nama" => "Jane Smith", "Email" => "janesmith@example.com"),
            array("ID" => 3, "Nama" => "Mike Johnson", "Email" => "mikejohnson@example.com"),
        );

        // Tampilkan data pengguna dalam tabel
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nama</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        foreach ($pengguna as $data) {
            echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Nama'] . "</td>";
            echo "<td>" . $data['Email'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
