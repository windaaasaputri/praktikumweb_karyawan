<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Data Bagian Karyawan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <?php
            include_once "../database/database.php";

            $id = $_GET['id'];
            echo $id;
            $findSQL = "SELECT * FROM bagian WHERE id = ?";
            $database = new Database();
            $connection = $database->getConnection();
            $statement = $connection->prepare($findSQL);
            $statement->bindParam(1, $id);
            $statement->execute();
            $data = $statement->fetch();

            if (isset($_POST['button_simpan'])) {
                $id = $_POST['id'];
                $nik = $_POST['nik'];
                $nama_karyawan = $_POST['nama_karyawan'];
                $alamat = $_POST['alamat'];
                $divisi = $_POST['divisi'];
                $level = $_POST['level'];
                $jabatan = $_POST['jabatan'];

                $updateSQL = "UPDATE `bagian` SET `nik` = ?, `nama_karyawan` = ?, `alamat` = ?, `divisi` = ?, `level` = ?, `jabatan` = ? WHERE `bagian`.`id` = ?";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama_karyawan);
                $statement->bindParam(3, $alamat);
                $statement->bindParam(4, $divisi);
                $statement->bindParam(5, $level);
                $statement->bindParam(6, $jabatan);
                $statement->bindParam(7, $id);
                $statement->execute();

                header('Location: main.php?page=bagian');
            }
            ?>
        </div>
    </div>
    <div>
        <form action="" method="post">
            <!-- <div class="mb-3">
                <label for="id" class="form-label">Id Bagian</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            </div> -->
            <input type="hidden"  id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $data['nama_karyawan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Karyawan</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>" required>
            </div>
                
            <div class="mb-3">
                <label for="divisi" class="form-label">Divisi</label>
                <select class="form-select" aria-label="Default select example" name="divisi" required>
                    <option value="">Pilih Divisi</option>
                    <option value="HRD" <?php echo ($data['divisi'] == 'HRD') ? " selected" : "" ?>>HRD</option>
                    <option value="Marketing" <?php echo ($data['divisi'] == 'Marketing') ? " selected" : "" ?>>Marketing</option>
                    <option value="IT" <?php echo ($data['divisi'] == 'IT') ? " selected" : "" ?>>IT</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" aria-label="Default select example" name="level" required>
                    <option value="">Pilih Level</option>
                    <option value="Manager" <?php echo ($data['level'] == 'Manager') ? " selected" : "" ?>>Manager</option>
                    <option value="Staf" <?php echo ($data['level'] == 'Staf') ? " selected" : "" ?>>Staf</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="jabatan" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="HR Manager" <?php echo ($data['jabatan'] == 'HR Manager') ? " selected" : "" ?>>HR Manager</option>
                    <option value="Digital Marketing" <?php echo ($data['jabatan'] == 'Digital Marketing') ? " selected" : "" ?>>Digital Marketing</option>
                    <option value="Developer" <?php echo ($data['jabatan'] == 'Developer') ? " selected" : "" ?>>Developer</option>
                    <option value="Front-End Dev" <?php echo ($data['jabatan'] == 'Front-End Dev') ? " selected" : "" ?>>Front-End Dev</option>
                    <option value="Software Engineer" <?php echo ($data['jabatan'] == 'Software Engineer') ? " selected" : "" ?>>Software Engineer</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main>