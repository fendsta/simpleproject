<?php
// koneksi dengan databse
$conn = mysqli_connect("localhost", "root", "root", "Penjualan");


// fungsi mengambil data dalam database
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}




// fungsi untuk registrasi 
function register($data)
{
  global $conn;
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["Password"]);
  $password2 = mysqli_real_escape_string($conn, $data["Password2"]);
  //cek username udh ada blom
  $result = mysqli_query($conn, "SELECT email FROM Users WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script> 
          alert ('email sudah terdaftar!');
          </script>";
    return false;
  }
  //cek konfirmasi password
  if ($password !== $password2) {
    echo "<script> 
          alert ('password tidak sesuai');
          </script>";
    return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  //masukkan kedalam database
  mysqli_query($conn, "INSERT INTO Users VALUES ('0', '$email', '$password')");

  return mysqli_affected_rows($conn);
}
