<?php
session_start();
$_SESSION['menu'] = "Dealer";
include "../includes/header.php";
include "../includes/koneksi.php";
?>

<?php
if (isset($_SESSION['level'])) {
?>
    <!-- Ini tampilan untuk ADMIN -->
    <div class="container vh-custom">
        <h1>Selamat Datang <b><?= $_SESSION['username']; ?></b></h1>
        <hr>

        <!-- Awal Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dealer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="input_dealer.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nama Dealer</label>
                                    <input type="text" name="nama_dealer" id="" class="form-control">
                                </div>
                                <div class="col-lg-12">
                                <label>Nomor Telepon</label>
                                </div>
                               <div class="input-group has-validation">
                                <span class="input-group-text">+62</span>
                              
                                
                                <input 
                                    type="text"
                                    name="no_telp"
                                    class="form-control"
                                  
                                    maxlength="13"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    required
                                >
                            </div>

                                <div class="col-12">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" class="form-control" required></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal -->
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Dealers</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
           
            
                    <th colspan='2'>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_dealer";
                $sql_eksekusi =  mysqli_query($koneksi, $sql);
                $nomor = 1;
                while ($data = mysqli_fetch_array($sql_eksekusi)) {
                    echo "<tr>";
                    echo "  <td>" . $nomor++ . "</td>";
                    echo "  <td>" . $data['nama_dealer'] . "</td>";
                    echo "  <td>" . $data['no_telp'] . "</td>";
                    echo "  <td>" . $data['alamat'] . "</td>";
                   
                ?>
                    <td>
                        <!-- awal modal ubah -->
                        <!-- Button trigger modal -->
                       <button type="button" class="btn btn-warning form-control"
                data-bs-toggle="modal"
                data-bs-target="#modalubah<?= $data['id_dealer']; ?>">
                ubah
            </button>

                <div class="modal fade" id="modalubah<?= $data['id_dealer']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="ubah_dealer.php" method="post">

                                <input type="hidden" name="id_dealer" value="<?= $data['id_dealer']; ?>">

                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Ubah Dealer <?= $data['nama_dealer']; ?> | ID <?= $data['id_dealer']; ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Nama Dealer</label>
                                        <input type="text" name="nama_dealer"
                                            class="form-control"
                                            value="<?= $data['nama_dealer']; ?>" required>
                                    </div>

                                <div class="mb-3">
                                    <div class="col-lg-12">
                                    <label>Nomor Telepon</label>
                                        
                                    </div>
                                    <div class="input-group has-validation">
                                <span class="input-group-text">+62</span> 
                              
                                        
                                       
                                        <input type="text" name="no_telp"
                                            class="form-control"
                                            value="<?= $data['no_telp']; ?>"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                           
                                            required>
                                    </div>


                                    <div class="mb-3">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </td>
            <!-- akhir modal ubah -->

                    <!-- Awal Modal Hapus -->
                    <!-- Button trigger modal -->
                    <td>
                        <button type="button" class="btn btn-danger form-control" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $nomor; ?>">
                            Hapus
                        </button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="modalhapus<?= $nomor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus kategori <b><?= $data['nama_dealer']; ?></b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="hapus_dealer.php?id_dealer=<?= $data['id_dealer']; ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Hapus -->
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
    <!-- AKHIR ADMIN -->
<?php
} else {
?>
    <!-- Ini tampilan untuk UMUM -->
    <div class="container vh-custom">
        <h1>Website ini adalah website Official dari Wimcycle</h1>
    </div>
    <!-- AKHIR UMUM -->
<?php
}
?>

<?php
include "../includes/footer.php";
?>