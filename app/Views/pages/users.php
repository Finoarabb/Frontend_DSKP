<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div id="main-context">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row align-items-center justify-content-center mb-4">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Users</b>
            </div>
            <div class="col border-top border-primary d-none d-sm-block"></div>
        </div>
        <div>
            <button id="back-btn" class="btn btn-arsip d-none"><i class="fas fa-lg fa-arrow-left"></i></button>
        </div>
        <div class="row font-barlow">
            <div class="col-lg">
                <input type="text" id="message" data-flashdata="" hidden>
                <div class="row">
                    <div class="col-lg">

                    </div>
                </div>
                <table id="tabeluser" class="table font-barlow text-black">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Username</th>
                            <th scope="col" class="text-center">Password</th>
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($users as $usr) : ?>
                            <tr>
                                <td> <?= $usr['nama']; ?> </td>
                                <td> <?= $usr['username']; ?> </td>
                                <td><?= $usr['password']; ?></td>
                                <td><?= $usr['role']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <button class="btn btn-primary dropdown-toggle px-1 py-0" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>Role</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <?php $rolelist = ['supervisor', 'kepala', 'admin', 'operator', 'staff'];
                                                foreach ($rolelist as $role) :
                                                    if ($role === $usr['role']) continue;
                                                ?>
                                                    <button class="dropdown-item" onclick="confirmChangeRole(<?= $usr['id']; ?>,`<?= $usr['nama']; ?>`,`<?= $role ?>`)"><?= $role; ?></button>
                                                <?php endforeach; ?>
                                            </div>
                                            <button class="btn btn-cancle px-1 py-0" onclick="confirmDelete(<?= $usr['id']; ?>,`<?= $usr['nama']; ?>`)">
                                                <span>Delete</span><i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>

                <form method="post" class="d-none" hidden id="deleteForm">
                </form>
                <form method="post" class="d-none" hidden id="changeRoleForm">
                    <input name="role" id="roleInput" hidden value="" />
                </form>
                <div class="row justify-content-center">
                    <button class="btn btn-primary mb-3" onclick="tambahUser()">Tambahkan User<i class="fas fa-sm fa-plus ml-2"></i></button>
                </div>

            </div>
        </div>
    </div>

</div>


<script>
    function confirmDelete(id, name) {
        Swal.fire({
            html: 'Anda yakin menghapus user <b>' + name + '</b> ?',
            icon: 'warning',
            confirmButtonText: 'Yakin',
            showCancelButton: true,
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteForm').attr('action', 'deleteUser/' + id);
                $('#deleteForm').submit();
            }
        })
    }

    function confirmChangeRole(id, name, role) {
        Swal.fire({
            html: 'Anda yakin mengubah user <b>' + name + '</b> menjadi <b>' + role + '</b>?',
            icon: 'warning',
            confirmButtonText: 'Yakin',
            showCancelButton: true,
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#changeRoleForm').attr('action', 'changeRole/' + id);
                $('#roleInput').attr('value', role);
                $('#changeRoleForm').submit();
            }
        })
    }

    function tambahUser() {
        Swal.fire({
            title: 'Tambah User Baru',
            html: `<form id="userForm" action="user" method="post" enctype="application/json">
                        <div class="form-row">
                            <div class="col-md-9 mb-3">
                                <input type="text" class="form-control" name="nama" required placeholder="Nama">
                            </div>
                            <div class="col-md-3 mb-3">
                                <select class="custom-select" id="role" name="role" required>
                                    <option value="admin">Admin</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="kepala">Pimpinan</option>
                                    <option value="staff" selected>Staff</option>
                                    <option value="operator">Operator</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="password" class="form-control" name="confirmPassword" placeholder="Password" required>
                            </div>
                        </div>
                    </form>`,
            showCancelButton: true,
            confirmButtonText: 'Tambah User',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#userForm').submit();
            }
        })
    }

    $(document).ready(function() {

        const msg = <?= json_encode($msg); ?>;
        let html = '';
        if (msg !== null && msg !== true) {
            $.each(msg, function(key, value) {
                html += `<b>${key}</b>: <span>${value}</span><br>`;
            });
            Swal.fire({
                title: 'Gagal Menambahkan User',
                icon: 'error',
                html: html
            });
        };
        if (msg === true) Swal.fire({
            title: 'User berhasil ditambahkan',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
<?php $this->endSection(); ?>