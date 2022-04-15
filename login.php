<?php
  session_start();
  include "__+config/koneksi.php";
  if(@$_SESSION['admin'] || @$_SESSION['member']){
    header("location:index.php");
  }else{
?>

<!DOCTYPE html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tabungan Dan Pengeluaran Siswa</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="img/logo.png" sizes="16x16" type="imgae/png">

  </head>
<html lang="en">
  <head>
  
<section id="welcome">
    <div class="jumbotron">
      <h1 class="display-6 text-center">Tabungan Dan Pengeluaran Siswa</h1>
      <p class="lead text-center">SMP NEGERI 1 JAKARTA.</p>
    </div>
</section>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            
            <button class="btn btn-primary btn-block" type="submit" name="masuk">Login</button>
          </form>
          <div class="text-center">
            <span class="d-block small mt-3"> Belum Punya Akun ? <a href="register.php">Daftar</a><br  />
             Lupa Username / Password? <a href="lupa-password.php">Disini</a></span>
          </div>
          <?php 
				if (isset($_POST['masuk'])) {
					$username = addslashes($_POST['username']);
					$password = addslashes($_POST['password']);

					$result = $conn->query("SELECT * FROM user WHERE username = '$username'");

					if ($result->rowCount() === 1) {
						// cek password
							$row = $result->fetch(PDO::FETCH_OBJ);
							if (password_verify($password,$row->password)) {
								
						// cek level
							if ($row->level == "Admin") {
                @$_SESSION['admin'] = $row->kode;
                header("location:index.php");
							}else if ($row->level == "Member") {
								@$_SESSION['member'] = $row->kode;
								header("location:index.php");
							}

						}else {
						echo "<script>alert('Password Salah!');</script>";
					  }
					}else {
						echo "<script>alert('Username Salah!');</script>";
					}
				}
			 ?>
        </div>
      </div>
    </div>
<!-- Content -->
<section id="content">
  <div class="container">
    <div class="buttom">
        
		
	 
		<br><p>JIKA ANDA MERUPAKAN SISWA BARU</p>
        <h6>Mohon untuk melakukan laporan kepada Wali Kelas atau Ketua kelas untuk dapat dibantu dengan syarat : </h6>
        <p>1). Kartu Pelajar
        <br>2). Kartu NISN</p></br>
       
      </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>
</html>

<?php
  }
?>