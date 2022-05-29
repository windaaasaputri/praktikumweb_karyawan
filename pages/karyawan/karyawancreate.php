<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Karyawan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            if (isset($_POST['button_simpan'])) {
                $nik = $_POST['nik'];
                $nama_karyawan = $_POST['nama_karyawan'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $status_menikah = $_POST['status_menikah'];

                $insertSQL = "INSERT INTO karyawan VALUES (NULL,'" . $nik . "','" . $nama_karyawan . "','"
                    . $jenis_kelamin . "','" . $status_menikah . "')";

                $insertSQL = "INSERT INTO karyawan VALUES (NULL, ?, ?, ?, ?)";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($insertSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama_karyawan);
                $statement->bindParam(3, $jenis_kelamin);
                $statement->bindParam(4, $status_menikah);
                $statement->execute();

                header('Location: main.php?page=karyawan');
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
            <div>
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin1" required>
                <label class="form-check-label" for="jenis_kelamin1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin2">
                <label class="form-check-label" for="jenis_kelamin2">
                    Perempuan
                </label>
            </div>
            <div class="mb-3">
                <label for="status_menikah" class="form-label">Status Menikah</label>
                <select class="form-select" aria-label="Default select example" name="status_menikah" required>
                    <option value="" selected>Pilih Status</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah Anak 0">Menikah Anak 0</option>
                    <option value="Menikah Anak 1">Menikah Anak 1</option>
                    <option value="Menikah Anak 2">Menikah Anak 2</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main>