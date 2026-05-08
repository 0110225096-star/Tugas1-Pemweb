<?php
if(isset($_SESSION['user'])){
    echo '<div class="alert alert-success">Anda sudah login sebagai <strong>' . htmlspecialchars($_SESSION['user']['nama']) . '</strong> (' . htmlspecialchars($_SESSION['user']['role'] ?? 'User') . ').</div>';
    echo '<a href="logout.php" class="btn btn-danger">Logout</a>';
    return;
}

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['user'] = $data;
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Login gagal, username atau password salah.</div>";
    }
}
?>

<div class="card shadow-sm rounded-4">
  <div class="card-body">
    <h5 class="card-title mb-4">Silakan Login</h5>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>