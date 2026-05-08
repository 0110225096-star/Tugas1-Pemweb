<?php
// INSERT
if(isset($_POST['simpan'])){
    if(!isset($_SESSION['user'])){
        echo "<div class='alert alert-danger'>Silakan login terlebih dahulu untuk menambah data</div>";
    } else {
        $nama = $_POST['nama'];
        mysqli_query($conn, "INSERT INTO level (nama) VALUES ('$nama')");
        header("Location: index.php?page=level");
        exit;
    }
}

// DELETE
if(isset($_GET['hapus'])){
    if(!isset($_SESSION['user'])){
        echo "<div class='alert alert-danger'>Silakan login terlebih dahulu untuk menghapus data</div>";
    } else {
        $id = $_GET['hapus'];
        mysqli_query($conn, "DELETE FROM level WHERE id='$id'");
        header("Location: index.php?page=level");
        exit;
    }
}

// EDIT
$edit = null;
if(isset($_GET['edit'])){
    if(!isset($_SESSION['user'])){
        echo "<div class='alert alert-danger'>Silakan login terlebih dahulu untuk mengedit data</div>";
    } else {
        $id = $_GET['edit'];
        $edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM level WHERE id='$id'"));
    }
}

// UPDATE
if(isset($_POST['update'])){
    if(!isset($_SESSION['user'])){
        echo "<div class='alert alert-danger'>Silakan login terlebih dahulu untuk mengupdate data</div>";
    } else {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        mysqli_query($conn, "UPDATE level SET nama='$nama' WHERE id='$id'");
        header("Location: index.php?page=level");
        exit;
    }
}
?>

<div class="card shadow">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Data Level</h5>
  </div>

  <div class="card-body">

    <!-- FORM -->
    <?php if(isset($_SESSION['user'])): ?>
    <form method="POST" class="mb-3">
        <?php if($edit): ?>
            <input type="hidden" name="id" value="<?= $edit['id']; ?>">
        <?php endif; ?>

        <div class="input-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama Level"
                value="<?= $edit ? $edit['nama'] : '' ?>" required>

            <?php if($edit): ?>
                <button type="submit" name="update" class="btn btn-warning">Update</button>
                <a href="index.php?page=level" class="btn btn-secondary">Batal</a>
            <?php else: ?>
                <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
            <?php endif; ?>
        </div>
    </form>
    <?php else: ?>
    <div class="alert alert-info">Silakan <a href="?page=login" class="alert-link">login</a> untuk menambah/edit/hapus data</div>
    <?php endif; ?>

    <!-- TABLE -->
    <table class="table table-striped table-hover shadow-sm">
        <thead>
            <tr class="table-primary">
                <th>No</th>
                <th>Nama Level</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM level");

        while($row = mysqli_fetch_assoc($data)):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                    <?php if(isset($_SESSION['user'])): ?>
                    <a href="index.php?page=level&edit=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?page=level&hapus=<?= $row['id']; ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                    <?php else: ?>
                    <small class="text-muted">Login untuk edit/hapus</small>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>

    </table>

  </div>
</div>