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
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($users as $usr) : ?>
                            <tr>
                                <td> <?= $usr['nama']; ?> </td>
                                <td><?= $usr['role']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <button class="btn btn-primary dropdown-toggle p-1" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>Role</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <?php $rolelist = ['supervisor', 'pimpinan', 'admin', 'operator', 'staff'];
                                                foreach ($rolelist as $role) :
                                                    if ($role === $usr['role']) continue;
                                                ?>
                                                    <button class="dropdown-item" onclick="confirmChangeRole(<?= $usr['id'];?>,`<?=$usr['nama'];?>`,`<?=$role?>`)"><?= $role; ?></button>
                                                <?php endforeach; ?>
                                            </div>
                                            <button class="btn btn-cancle p-1" onclick="confirmDelete(<?=$usr['id'];?>,`<?=$usr['nama'];?>`)">
                                                <span>Delete</span><i class="fas fa-fw fa-trash"></i>
                                            </button>
                                            <form method="post" class="d-none" hidden id="deleteForm">                                                
                                            </form>
                                            <form method="post" class="d-none" hidden id="changeRoleForm">
                                                <input name="role" id="roleInput" hidden value=""/>                                                
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<script>
    function confirmDelete(id, name) {
        Swal.fire({
            html: 'Anda yakin menghapus user <b>'+name+'</b> ?',
            icon: 'warning',
            confirmButtonText: 'Yakin',
            showCancelButton:true,
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteForm').attr('action', 'deleteUser/' + id);
                $('#deleteForm').submit();                
            }
        })
    }
    function confirmChangeRole(id, name,role) {
        Swal.fire({
            html: 'Anda yakin mengubah user <b>'+name+'</b> menjadi <b>'+role+'</b>?',
            icon: 'warning',
            confirmButtonText: 'Yakin',
            showCancelButton:true,
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#changeRoleForm').attr('action', 'changeRole/' + id);
                $('#roleInput').attr('value',role);
                $('#changeRoleForm').submit();                
            }
        })
    }    
</script>
<?php $this->endSection(); ?>