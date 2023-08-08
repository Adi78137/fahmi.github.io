<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-widht,initial-scale=1.0">
        <title>Pemesanan nasi kotak</title>
        <style>
            body {
                font-family: arial, sans-serif;
            }
            h1 {
                text-align: center;
            }
            form {
                width:300xp;
                margin:0 auto;
            }
            label, input, select {
                display:block;
                margin-bottom:10px;
            }
            input[type="submit"] {
                margin-top:10px;
            }
            .result {
                display:grid;
                align-items:center;
                justify-content:center;
                margin-top:20px;
                padding:10px;
                border:1px solid #ccc;
                background-color:#f9f9f9;
            }
            .form-group:{
                margin-bottom:10px;
                display:flex;
                align-items:center;
            }
            .form-group label{
                flex:1;
                margin-right:10px;
            } 
            .form-group input,
            .form-group select {
                flex:2;
                width:100%;
                padding:6px;
                font-size:16px;
            }
        </style>

    </head>
    <body>
        <form method="post" action="">
            <h1>Form pemesanan nasi kotak</h1>
            <br>
            <label for="">Cabang :</label>
            <select name="branch" id="">
                <option value="pilih cabang">--Pilih Cabang--</option>
                <option value="cempaka">Cempaka</option>
                <option value="bandung">Bandung</option>
                <option value="jakarta">Jakarta</option>
            </select>
            <br>
            <label for="">Nama Pelanggan :</label>
            <input type="text" name="name"><br>
            <label for="">Nomor Hp :</label>
            <input type="text" name="PhoneNumber"><br>
            <label for="">Jumlah Kotak :</label>
            <input type="text" name="quantity"><br>
            <input type="submit" name="submit" value="Pesan"><br>
        </form>
        

<?php
if (isset($_POST['submit'])){
    $_branch = $_POST['branch'];
    $name = $_POST['name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $quantity = $_POST['quantity'];
    $priceperitem = 50000;
    $discountperitem = 50000; //diskon per item jika lebih dari 10 pesanan
    $minimumquantityfordiskon = 10; //jumlah minimal pesanan untuk mendapatkn diskon

    $totalPriceBeforeDiscount = $priceperitem * $quantity;
    $totalDiscount = 0;

    if($quantity > $minimumquantityfordiskon) {
        $totalDiscount = $discountperitem * floor($quantity / $minimumquantityfordiskon);
    }
    $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;
    echo "<div class='result'>";
    echo "<strong>Pesanan Anda Telah Diterima :</strong><br>";
    echo "<strong>Cabang :</strong>" . $_branch . "<br>";
    echo "<strong>Nama :</strong>" . $name . "<br>";
    echo "<strong>Nomor Hp :</strong>" . $PhoneNumber . "<br>";
    echo "<strong>Jumlah Kotak :</strong>" . $quantity . "<br>";
    echo "<strong>Tagihan Awal Sebelum Diskon :</strong> Rp" .number_format($totalPriceBeforeDiscount, 0, ',', '.') . "<br>";

    if($totalDiscount > 0) {
        echo "<strong>Diskon :</strong> Rp" .number_format($totalDiscount, 0, ',', '.') . "<br>";
    }
    echo "<strong>Tagihan Akhir Sesudah Diskon :</strong> Rp" .number_format($totalPriceAfterDiscount, 0, ',', '.') . "<br>";
    echo "</div>" ;
}
?>
    </body>
</html>