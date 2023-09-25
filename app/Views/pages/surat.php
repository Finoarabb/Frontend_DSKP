<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div id="main-context">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row align-items-center justify-content-center mb-4">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Surat <?php echo $tipe ?></b>
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
                <table id="tabelsaya" class="table font-barlow text-black">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center">No Surat</th>
                            <th scope="col" class="text-center"><?= $tipe === 'masuk' ? 'Asal' : 'Tujuan'; ?></th>
                            <th scope="col" class="text-center">Tanggal</th>
                            <th scope="col" class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($surat as $srt) : ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?= $srt['no_surat']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?= $srt[$tipe === 'masuk' ? 'asal' : 'tujuan']; ?>
                                    </div>
                                </td>
                                <td><?= $srt['tanggal']; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="mr-3">
                                            <a class="nav-link dropdown-toggle p-0" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <button class="btn btn-act py-0"><i class="fas fa-ellipsis-v"></i></button>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#home">RIncian</a>
                                            </div>
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
<div class="row justify-content-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="#newSurat">
        <span>
            Tambahkan Surat
            <i class="fas fa-sm fa-plus ml-2"></i>
        </span>
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="newSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content px-3">
            <div class="modal-header border-0">
                <h4 class="modal-title text-black font-weight-bold" id="exampleModalLabel">Surat Masuk Baru</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <form action="srt<?= $tipe ?>" method="post" enctype="multipart/form-data" id="formSurat">
                    <div class="row">
                        <div class="col my-auto bg-secondary py-3 rounded" id="dropzone">

                            <input name="file" type="file" class="d-none" id="uploadFile" accept=".pdf, .jpg, .jpeg, .png" />
                            <div class="row">
                                <div class="col text-center text-warning">
                                    <i class="fas fa-4x fa-file-upload" id="file-icon"></i>
                                    <p id="file-ket">Upload dulu dokumennya.., dalam bentuk pdf/jpg ya</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="No Surat" />
                            </div>
                            <div class="form-group">
                                <label for="tipe"><?= $tipe === 'masuk' ? 'Asal' : 'Tujuan' ?></label>
                                <input type="text" class="form-control" id="tipe" name="<?= $tipe === 'masuk' ? 'asal' : 'tujuan' ?>" placeholder="<?= $tipe === 'masuk' ? 'asal' : 'tujuan' ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Surat</label>
                                <input type="text" class="form-control datepicker" name="tanggal" value="<?= date('d/m/Y') ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-end">
                <button class="btn btn-success" id="formSubmit">Tambahkan</button>
                <button class="btn btn-cancle" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $('#dropzone').on({
            dragover: function(e) {
                e.preventDefault();
                $(this).css('opacity', 0.6);
            },
            dragleave: function() {
                $(this).css('opacity', 1);
            },
            drop: function(e) {
                e.preventDefault();
                $(this).css('opacity', 1);

                const files = e.originalEvent.dataTransfer.files;
                $('#uploadFile')[0].files = files;
                $('#uploadFile').trigger('change');
            },
            click: function() {
                $('#uploadFile')[0].click();
            },
            mouseenter: function() {
                $(this).css('opacity', 0.6);
            },
            mouseleave: function() {
                $(this).css('opacity', 1);
            }
        });

        $('#uploadFile').change(function() {
            var file = this.files[0];
            let iconClass = 'fas fa-4x';
            const icon = $('#file-icon');
            icon.removeClass().addClass(iconClass);
            icon.parent().removeClass('text-danger');
            if (!icon.parent().hasClass('text-warning')) icon.parent().addClass('text-warning');
            if (typeof file === "undefined") {
                icon.addClass('fa-file-upload');
                $('#file-ket').text('Upload dulu dokumennya.., dalam bentuk pdf/jpg ya')
            } else {
                $('#file-ket').text(file.name);
                if (file.type.split('/')[0] === 'image') {
                    icon.addClass('fa-file-image');
                } else if (file.type === 'application/pdf') {
                    icon.addClass('fa-file-pdf');
                } else {
                    icon.parent().removeClass('text-warning').addClass('text-danger');
                    icon.addClass('fa-exclamation-triangle');
                    $('#file-ket').text('Format File yang digunakan salah mohon upload Kembali');
                };
            }
        });


        $('#formSubmit').click(function() {
            $('#formSurat').submit();
        })

        $('#formSurat').on('reset', function() {
            $('#uploadFile').trigger('change');
        });

        $(document).ready(function() {
            $('#newSurat').on('hidden.bs.modal', function() {
                if ($(this).attr('aria-hidden') === "true") {
                    $('#formSurat')[0].reset();
                }
            });
        });




        const msg = <?= json_encode($msg); ?>;
        let html = '';
        if (msg !== null && msg !== true) {
            $.each(msg, function(key, value) {
                html += `<b>${key}</b>: <span>${value}</span><br>`;
            });
            Swal.fire({
                title: 'Gagal Menambahkan surat',
                icon: 'error',
                html: html
            });
        };
        if (msg === true) Swal.fire({
            title: 'Surat berhasil ditambahkan',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
<?php $this->endSection(); ?>