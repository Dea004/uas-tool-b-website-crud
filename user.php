<?php
include 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM mahasiswa");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card card-end">
        <div class="card-header">
            Halaman Admin
        </div>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary me-2 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Mahasiswa </button>

            </div>
        </div>

        <!-- Modal Tambah User -->
        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fulscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- formulir tambah mahasiswa -->
                        <form class="needs-validation" novalidate action="proses_input_user.php" method="POST">
                            <div class="row">
                                <div class="form-floating  mb-3">
                                    <input type="text" class="form-control" id="floatingInputNIM" placeholder="Your NIM" name="NIM" required>
                                    <label for="floatingInput"> NIM </label>
                                    <div class="invalid-feedback">
                                        Masukkan NIM.
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputNama" placeholder="Your Name" name="Nama" required>
                                    <label for="floatingInput"> Nama </label>
                                    <div class="invalid-feedback">
                                        Masukkan Nama.
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputKelas" placeholder="Your Class" name="Kelas" required>
                                    <label for="floatingInput"> Kelas </label>
                                    <div class="invalid-feedback">
                                        Masukkan Kelas.
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputNoTlp" placeholder="08xxxxxx" name="NoTlp" required>
                                <label for="floatingInput"> No.Tlp </label>
                                <div class="invalid-feedback">
                                    Masukkan No.Tlp.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputemail" placeholder="name@example.com" name="email" required>
                                <label for="floatingInput"> Email </label>
                                <div class="invalid-feedback">
                                    Masukkan Email.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="proses_input_user_validate" value="12345">Add Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Modal User -->
        <?php
        foreach ($result as $row) {
            if (isset($row['NIM'])) {
        ?>
                <!-- Modal View -->
                <div class="modal fade" id="ModalView<?php echo $row['NIM'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fulscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                            <input readonly type="text" class="form-control" id="floatingInputNIM" placeholder="Your NIM" name="NIM" value="<?php echo $row['NIM'] ?>">
                                            <label for="floatingInput"> NIM </label>
                                            <div class="invalid-feedback">
                                                Masukkan NIM.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input readonly="text" class="form-control" id="floatingInputNama" placeholder="Your Name" name="Nama" value="<?php echo $row['Nama']; ?>">
                                            <label for="floatingInput"> Nama </label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input readonly type="text" class="form-control" id="floatingInputKelas" placeholder="Your Class" name="Kelas" value="<?php echo $row['Kelas']; ?>">
                                            <label for="floatingInput"> Kelas </label>
                                            <div class="invalid-feedback">
                                                Masukkan Kelas.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input readonly type="text" class="form-control" id="floatingInputNoTlp" placeholder="08xxxxxx" name="NoTlp" value="<?php echo $row['NoTlp']; ?>">
                                        <label for="floatingInput"> No.Tlp </label>
                                        <div class="invalid-feedback">
                                            Masukkan No.Tlp.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input readonly type="text" class="form-control" id="floatingInputemail" placeholder="name@example.com" name="email" value="<?php echo $row['email']; ?>">
                                        <label for="floatingInput"> Email </label>
                                        <div class="invalid-feedback">
                                            Masukkan Email.
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal View -->

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['NIM'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fulscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses_edit_user.php" method="POST">
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInputNIM" placeholder="Your NIM" name="NIM" required value="<?php echo $row['NIM'] ?>">
                                            <label for="floatingInput"> NIM </label>
                                            <div class="invalid-feedback">
                                                Masukkan NIM.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInputNama" placeholder="Your Name" name="Nama" required value="<?php echo $row['Nama']; ?>">
                                            <label for="floatingInput"> Nama </label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama.
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInputKelas" placeholder="Your Class" name="Kelas" required value="<?php echo $row['Kelas']; ?>">
                                            <label for="floatingInput"> Kelas </label>
                                            <div class="invalid-feedback">
                                                Masukkan Kelas.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputNoTlp" placeholder="08xxxxxx" name="NoTlp" required value="<?php echo $row['NoTlp']; ?>">
                                        <label for="floatingInput"> No.Tlp </label>
                                        <div class="invalid-feedback">
                                            Masukkan No.Tlp.
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInputemail" placeholder="name@example.com" name="email" required value="<?php echo $row['email']; ?>">
                                        <label for="floatingInput"> Email </label>
                                        <div class="invalid-feedback">
                                            Masukkan Email.
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="proses_edit_user_validate" value="12345">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['NIM'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fulscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses_delete_user.php" method="POST">
                                    <input type="hidden" name="NIM" value="<?php echo isset($row['NIM']) ? $row['NIM'] : ''; ?>">
                                    <div class="col-lg-12">
                                        Apakah Anda yakin ingin menghapus data Mahasiswa <b><?php echo $row['Nama'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="proses_delete_user" value="12345">Hapus</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->

            <?php
            }
        }
        if (empty($result)) {
            echo "Data user tidak ada";
        } else {
            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">No.Tlp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; //variabel untuk nomor urut
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $row['NIM'] ?></td>
                                <td><?php echo $row['Nama'] ?></td>
                                <td><?php echo $row['Kelas'] ?></td>
                                <td><?php echo $row['NoTlp'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td class="d-flex">
                                    <!-- Tombol "View" -->
                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo isset($row['NIM']) ? $row['NIM'] : ''; ?>"><i class="bi bi-eye-fill"></i></button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo isset($row['NIM']) ? $row['NIM'] : ''; ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo isset($row['NIM']) ? $row['NIM'] : ''; ?>">
                                        <i class="bi bi-archive"></i>
                                    </button>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Your validation script here
    });

    // Example all the forms we want to apply
    (() => {
        'use strict';

        // Fetch all the forms we want to apply 
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach((form, index) => {
            console.log(`Form index: ${index}`);
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    // Show custom error messages
                    form.querySelectorAll('.form-control').forEach(input => {
                        input.reportValidity();
                    });
                }

                form.classList.add('was-validation');
            }, false);

            // Add event listeners for each input to dynamically show/hide error messages
            form.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', () => {
                    input.setCustomValidity('');
                    if (!input.checkValidity()) {
                        input.setCustomValidity('Masukkan ' + input.placeholder);
                    }
                });
            });
        });
    })();
</script>