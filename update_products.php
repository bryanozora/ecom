<?php
    include 'includes/connection.php';
?>

<?php
    if(isset($_POST['submit'])){
        $nama = $_POST['inNama'];
        $deskripsi = $_POST['inDesc'];
        $harga = $_POST['inHar'];
        $id = $_GET['id'];
        
        $sql = "UPDATE products SET nama_product = ?, deskripsi_product = ?, harga = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nama, $deskripsi, $harga, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: admin.php");
    }
?>