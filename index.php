
<?php include ('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.registerbtn:disabled {
  background-color: #505050;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover:enabled {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.alamat{
  width: 100%;
  height: 50pt;
}
</style>
</head>
<body>

<form action="?reg=tambah" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>SASKARA WIDADA MAHSA ARIF.</p>
    <hr>
    
    <label for="Nama lengkap"><b id="Nama">Nama lengkap</b></label>
    <input name="nama_lengkap" type="text" onclick="GantiTulisanNama()" placeholder="Nama Lengkap"  required>

    <label for="Email"><b id="Email">Email</b></label>
    <input name="email" type="text" onclick="GantitTulisanEmail()" placeholder="Enter Email"  required>

    <label for=""><b>Jurusan</b></label>
    <select name="jurusan" id="jurusan">
        <option >Pilih Jurusan</option>
        <option >Teknik Informatika</option>
        <option >Teknik Industri</option>
        <option >Teknik Mesin</option>
        <option >Teknik Electro</option>
        <option >Teknik Sipil</option>
    </select>
    <br><br>

    <label for=""><b>Alamat</b></label><br>
    <textarea name="alamat" id ="" class="alamat" placeholder="Masukkan Alamat"></textarea>
    <br>

    <label for="psw"><b>Password</b></label>
    <input name="password" type="password" onkeyup="EnableDisable()" placeholder="Enter Password"  id="password" required>

    <label for="pass-repeat"><b>Repeat Password</b></label>
    <input type="password" onkeyup="EnableDisable()" placeholder="Repeat Password" id="password1">
    <hr>

    <div class="checkbox">
               
        <div class="input">
    <label for="">Show Password</label>
       
    <input type="checkbox" onclick="showPassword()">
    
    </label>
        <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button class="registerbtn" id="btnSubmit" type="submit">Register</button>

  </div>  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

<!-- Registrasi -> menambah ke database -->
<?php

    if (isset($_GET['reg'])) {
        if ($_GET['reg'] == 'tambah') {
        $nama   = $_POST['nama_lengkap'];
        $email  = $_POST['email'];
        $jurusan= $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];

            $database= "INSERT INTO `registrasi` (`nama_lengkap`, `email`, `jurusan`, `alamat`, `password`) VALUES ('$nama', '$email', '$jurusan', '$alamat', '$password')";
            
            $simpan = mysqli_query(
                $mysql, $database
            );
            if ($simpan) {
                echo '<script language="javascript">
                alert ("Registrasi Berhasil Di Lakukan!");
                window.location="index.php";
                </script>';
                exit();
            }else{
                echo '<script language="javascript">
                alert ("Registrasi Gagal!");
                window.location="index.php";
                </script>';
                exit();
            }
        }
    }
?>














</body>
 <script>

function showPassword() {
  var x = document.getElementById("password");
  var y = document.getElementById("password1");
  if (x.type === "password" || x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}

</script>

<script>
function GantiTulisanNama()
{
    document.getElementById("Nama").innerHTML = "Masukkan Nama Lengkap Yang Benar" ;
    document.getElementById("Nama").style.color = "purple" ;
    
}
</script>

    
<script>
function GantitTulisanEmail()
{
    document.getElementById("Email").innerHTML = "Masukkan Email Yang Valid";
    document.getElementById("Email").style.color = "purple";
}


function validasiPassword()
{
    var x = document.getElementsById("password");
    var y = document.getElementsById("password1");


    if( x.value === y.value)
    {
        y.value= true;
    }else{
        document.getElementById("register").disabled = true;
    }
}


function EnableDisable() {
        //Reference the Button.
        var btnSubmit = document.getElementById("btnSubmit");
        //Verify the TextBox value.
        if (password.value.trim() != password1.value.trim()) {
            //Enable the TextBox when TextBox has value.
            btnSubmit.disabled = true;
        } else {
            //Disable the TextBox when TextBox is empty.
            btnSubmit.disabled = false;
        }
    };


 </script>

</html>