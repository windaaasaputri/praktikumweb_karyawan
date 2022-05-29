<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Bagian Karyawan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            if (isset($_POST['button_simpan'])) {
                $nik = $_POST['nik'];
                $nama_karyawan = $_POST['nama_karyawan'];
                $alamat = $_POST['alamat'];
                $divisi = $_POST['divisi'];
                $level = $_POST['level'];
                $jabatan = $_POST['jabatan'];

                $insertSQL = "INSERT INTO bagian VALUES (NULL,'" . $nik . "','" . $nama_karyawan . "','". $alamat . "','" . $divisi . "','" . $level . "','" . $jabatan . "')";

                $insertSQL = "INSERT INTO bagian VALUES (NULL, ?, ?, ?, ?, ?, ?)";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($insertSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama_karyawan);
                $statement->bindParam(3, $alamat);
                $statement->bindParam(4, $divisi);
                $statement->bindParam(5, $level);
                $statement->bindParam(6, $jabatan);
                $statement->execute();

                header('Location: main.php?page=bagian');
            }

            ?>
        </div>
    </div>
    <div>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Karyawan</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            
            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <select class="form-select" aria-label="Default select example" name="divisi" required>
                    <option value="" selected>Pilih Divisi</option>
                    <option value="HRD">HRD</option>
                    <option value="Marketing">Marketing</option>
                    <option value="IT">IT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" aria-label="Default select example" name="level" required>
                    <option value="" selected>Pilih Level</option>
                    <option value="Manager">Manager</option>
                    <option value="Staf">Staf</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="jabatan" required>
                    <option value="" selected>Pilih Jabatan</option>
                    <option value="HR Manager">HR Manager</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Developer">Developer</option>
                    <option value="Front-End Dev">Front-End Dev</option>
                    <option value="Software Engineer">Software Engineer</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main>