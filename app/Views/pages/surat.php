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
                            <?php if ($tipe === 'masuk') : ?>
                                <th scope="col" class="text-center">Tanggal Terima Surat</th>
                            <?php endif; ?>
                            <th scope="col" class="text-center"><?= $tipe === 'masuk' ? 'No Surat' : 'Tanggal Surat'; ?></th>
                            <th scope="col" class="text-center"><?= $tipe === 'masuk' ? 'Asal Surat' : 'No Surat'; ?></th>
                            <th scope="col" class="text-center"><?= $tipe === 'masuk' ? 'Tanggal Surat' : 'Tujuan Surat' ?></th>
                            <th scope="col" class="text-center">Perihal Surat</th>
                            <th scope="col" class="text-center">Tindakan</th>
                            <!-- <th scope="col" class="text-center">Status</th> -->
                            
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($surat)) :
                            foreach ($surat as $srt) : ?>
                                <tr>
                                    <?php if ($tipe === 'masuk') : ?>
                                        <td class="text-center"><?= $srt['created_at']; ?></td>
                                    <?php endif; ?>
                                    <td class="<?= $tipe !== 'masuk' ? 'text-center' : ''; ?>">
                                        <?= $tipe === 'masuk' ? $srt['no_surat'] : $srt['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?= $tipe === 'masuk' ? $srt['asal'] : $srt['no_surat']; ?>
                                    </td>
                                    <td class="<?= $tipe === 'masuk' ? 'text-center' : ''; ?>"><?= $tipe === 'masuk' ? $srt['tanggal'] : $srt['tujuan']; ?></td>
                                    <td class="<?= empty($srt['perihal']) ? 'text-center' : '' ?>"><?= empty($srt['perihal']) ? '-' : $srt['perihal'] ?></td>
                                    <td>
                                        <div class="d-flex <?= $tipe === 'masuk' && in_array($me['role'], ['supervisor', 'kepala', 'operator']) ? 'justify-content-end' : 'justify-content-center' ?>">
                                            <?php if ($tipe === 'masuk') : ?>
                                                <?php if ($me['role'] === 'supervisor') : ?>
                                                    <?php if ($srt['status'] == 1) : ?>
                                                        <button class="btn btn-secondary btn-danger mr-2 supervisor" data-toggle="1" value="<?= $srt['id'] ?>">Disimpan</button>
                                                    <?php elseif ($srt['status'] == 2) : ?>
                                                        <button class="btn btn-secondary btn-success mr-2 supervisor" data-toggle="2" value="<?= $srt['id'] ?>">Diteruskan</button>
                                                    <?php elseif ($srt['status'] == 3) : ?>
                                                        <button class="btn btn-success mr-2 disabled">Disimpan</button>
                                                    <?php elseif ($srt['status'] == 5) : ?>
                                                        <button class="btn btn-success mr-2 disabled">Didisposisikan</button>
                                                    <?php else : ?>
                                                        <button class="btn btn-info mr-2" id="approval" onclick="Approval(<?= $srt['id'] ?>)"> <i class="fas fa-fw fa-check"></i></button>
                                                    <?php endif; ?>

                                                <?php elseif ($me['role'] === 'operator') : ?>
                                                    <?php if ($srt['status'] == 1) : ?>
                                                        <button class="btn btn-secondary btn-danger mr-2" data-toggle="1" value="<?= $srt['id'] ?>">Disimpan</button>
                                                    <?php elseif ($srt['status'] == 2) : ?>
                                                        <button class="btn btn-secondary btn-success mr-2" data-toggle="2" value="<?= $srt['id'] ?>">Diteruskan</button>
                                                    <?php elseif ($srt['status'] == 3) : ?>
                                                        <button class="btn btn-success mr-2 disabled">Disimpan</button>
                                                    <?php elseif ($srt['status'] == 5) : ?>
                                                        <button class="btn btn-success mr-2 disabled">Didisposisikan</button>
                                                    <?php else : ?>
                                                        <button class="btn btn-info mr-2" id="approval" onclick="Approval(<?= $srt['id'] ?>)"> <i class="fas fa-fw fa-check"></i></button>
                                                    <?php endif; ?>


                                                <?php elseif ($me['role'] === 'kepala') : ?>
                                                    <?php if ($srt['status'] == 3) : ?>
                                                        <button class="btn btn-danger mr-2 btn-secondary kepala" data-toggle="3" value="<?= $srt['id'] ?>">Disimpan</button>
                                                    <?php elseif ($srt['status'] == 5) : ?>
                                                        <button class="btn btn-success mr-2 disposeId" data-toggle="5" value="<?= $srt['id'] ?>">
                                                            Didisposisikan
                                                            <span>
                                                                <i class="fas fa-fw fa-check"></i>
                                                            </span>
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-info mr-2 disposeId" value="<?= $srt['id'] ?>" data-toggle="2"> <i class="fas fa-fw fa-check"></i></button>
                                                    <?php endif; ?>


                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a class="btn btn-primary" data-toggle="dropdown" id="action-dropdown"><i class="fa fa-fw fa-bars"></i></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="viewSurat/<?= $srt['id']; ?>">Lihat Surat</i></a>
                                                </li>
                                                <?php if (!empty($srt['lampiran'])) : ?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?= $srt['lampiran']; ?>">
                                                            Lampiran
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if (($me['role'] === 'staff' || $me['role'] === 'kepala'|| $me['role'] === 'supervisor') && $srt['status'] == '5') : ?>
                                                    <li>
                                                        <button class="dropdown-item viewDisposisi" value="<?= $srt['id']; ?>">
                                                            Lihat Disposisi
                                                        </button>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if (in_array($me['role'], ['admin', 'operator']) && $srt['status'] == 0) : ?>
                                                    <li>
                                                        <button class="dropdown-item edit" value="<?= $srt['id']; ?>" data-toggle="modal" data-target="#newSurat">
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item" onclick="confirmDelete(<?= $srt['id']; ?>,`<?= $srt['no_surat']; ?>`)">
                                                            Hapus
                                                        </button>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>

                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php if ($me['role'] === 'operator' || $me['role'] === 'admin') : ?>
    <div class="row justify-content-center mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#newSurat" id="newbtn">
            <span>
                Tambahkan Surat
                <i class="fas fa-sm fa-plus ml-2"></i>
            </span>
        </button>
    </div>
<?php endif; ?>
<form class="d-none" id="agreementForm" action="approveLetter" method="post" enctype="application/json">
    <input type="text" hidden name="sid" id="sid" value="" />
    <input type="number" min="1" max="4" hidden name="status" id="status" value="" />
</form>
<form method="post" class="d-none" hidden id="deleteForm">
    <input type="hidden" id="tipeSurat" name="tipe" />
</form>

<!-- Modal -->
<div class="modal fade" id="newSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 700px;">
        <div class="modal-content px-3">
            <div class="modal-header border-0">
                <h4 class="modal-title text-black font-weight-bold" id="exampleModalLabel">Surat <?= ucfirst($tipe); ?> Baru</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <form action="srt<?= $tipe ?>" method="post" enctype="multipart/form-data" id="formSurat">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 px-0" for="no_surat">Nomor Surat</label>
                        <div class="col">
                            <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="No Surat" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 px-0" for="tipe"><?= $tipe === 'masuk' ? 'Asal' : 'Tujuan' ?></label>
                        <div class="col">
                            <input type="text" name="<?= $tipe === 'masuk' ? 'asal' : 'tujuan' ?>" id="tipe" class="form-control" placeholder="<?= $tipe === 'masuk' ? 'asal' : 'tujuan' ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 px-0" for="perihal">Perihal</label>
                        <div class="col">
                            <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Perihal" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 px-0" for="lampiran">Lampiran</label>
                        <div class="col">
                            <input type="text" name="lampiran" id="lampiran" class="form-control" placeholder="Lampiran" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text pr-4" for="tanggal">Tanggal Surat</label>
                                </div>
                                <input type="text" class="form-control bg-transparent" id="tanggal" name="tanggal" value="<?= date('d/m/Y') ?>" placeholder="Tanggal Surat" readonly>
                                <div class="input-group-append ">
                                    <button class="datepicker input-group-text bg-primary btn btn-primary calender" value="1">
                                        <i class="fa fa-fw fa-calendar text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <?php if($tipe==='masuk'): ?>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="created_at">Tanggal Terima</label>
                                </div>
                                <input type="text" class="form-control bg-transparent" id="created_at" name="created_at" value="<?= date('d/m/Y') ?>" placeholder="Tanggal Terima" readonly>
                                <div class="input-group-append ">
                                    <button class="datepicker input-group-text bg-primary btn btn-primary calender" value="2">
                                        <i class="fa fa-fw fa-calendar text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="file">File</label>
                                </div>
                                <input name="file" type="file" hidden id="uploadFile" accept=".pdf, .jpg, .jpeg, .png" />
                                <input name="test" type="text" class="form-control bg-transparent" id="filename" readonly />
                                <div class="input-group-append">
                                    <button class="input-group-text btn btn-primary bg-primary inputFile">
                                        <i class="fa fa-fw fa-file text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-end">
                <button class="btn btn-success" id="formSubmit">Tambahkan Surat</button>
                <button class="btn btn-cancle" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>
    var tipe = '<?= $tipe; ?>';
    baseurl = "<?= base_url() ?>";
    const surat = <?= json_encode($surat); ?>;
    var disp;
    $('.edit').click(function(e) {
        const sid = $(this).val();
        let srt = []
        e.preventDefault();
        $('#formSubmit').text('Update Surat');
        $('#newSurat .modal-title').text('Edit Surat');
        surat.forEach(function(val, i) {
            if (val['id'] == sid)
                srt = surat[i]
        });
        console.log(srt);
        $('#tipe').val(srt.tujuan == '' ? srt.asal : srt.tujuan);
        $('#no_surat').val(srt.no_surat);
        $('#lampiran').val(srt.lampiran);
        $('#perihal').val(srt.perihal);
        date = new Date(srt.tanggal)
        $('#tanggal').val(`${date.getDate()}/${date.getMonth()+1}/${date.getFullYear()}`)
        $('#formSurat').attr('action', 'editLetter/' + sid);
    })
    $('#newbtn').click(function() {
        $('#newSurat .modal-title').text('Surat ' + tipe + ' Baru');
        $('#formSurat').attr('action', 'srt' + tipe);
        $('#formSubmit').text("Tambahkan Surat");
    })

    function confirmDelete(id, no_surat) {
        Swal.fire({
            html: 'Anda yakin menghapus Surat <b>' + no_surat + '</b> ?',
            icon: 'warning',
            confirmButtonText: 'Yakin',
            showCancelButton: true,
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#tipeSurat').val(tipe);
                $('#deleteForm').attr('action', 'deleteLetter/' + id);
                $('#deleteForm').submit();
            }
        })
    }

    $('.kepala').hover(function() {
        $(this).toggleClass('btn-danger', 'btn-secondary');
        $(this).html() == 'Batalkan <span> <i class="fa fa-fw fa-times"></i></span>' ?
            $(this).html('Disimpan') :
            $(this).html('Batalkan <span> <i class="fa fa-fw fa-times"></i></span>');
    }).click(function() {
        Swal.fire({
            title: 'Batalkan Aksi?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Batalkan'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#agreementForm #sid').val($(this).val());
                $('#agreementForm #status').val(2);
                $('#agreementForm').submit();
            }
        });
    });
    $(document).ready(function() {
        $('.datepicker').click(function(e) {
            e.preventDefault();
        })
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,

        }).on('changeDate', function(selected) {
            $(this).val() == 1 ?
                $('#tanggal').val(selected.format('dd/mm/yyyy')) :
                $('#created_at').val(selected.format('dd/mm/yyyy'));

        });
        $('.inputFile').click(function(e) {
            e.preventDefault();
            $('#uploadFile').trigger('click');
        })
        $('#uploadFile').on('change', function() {
            a = $(this).val();
            $('#filename').val(a.split('\\').pop());
        })
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
        const disposed = <?= json_encode($disposed); ?>;
        if (disposed !== '' && disposed !== null) {
            Swal.fire({
                title: disposed,
                icon: 'error',
            });
        };
        if (disposed === '') Swal.fire({
            title: 'Disposisi berhasil ditambahkan',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });

        $('.supervisor').hover(function() {
            var jenis = $(this).data('toggle') == '1' ? 'btn-danger' : 'btn-success';
            $(this).toggleClass(jenis, 'btn-secondary');
            $(this).html() == 'Batalkan <span> <i class="fa fa-fw fa-times"></i></span>' ?
                $(this).html($(this).data('toggle') == '1' ? 'Disimpan' : 'Diteruskan') :
                $(this).html('Batalkan <span> <i class="fa fa-fw fa-times"></i></span>');
        }).click(function() {
            Swal.fire({
                title: 'Batalkan Aksi?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#agreementForm #sid').val($(this).val());
                    $('#agreementForm #status').val(0);
                    $('#agreementForm').submit();
                }
            });
        })


        $('.viewDisposisi').click(function() {
            $.ajax({
                method: 'GET',
                url: baseurl + '/disposedLetter/' + $(this).val(),
                dataType: 'json'
            }).then((result) => {
                disp = result;
                $('#dispmodal').modal('toggle');

            }).catch((error) => {
                console.log(error);
            });
        })
    });

    <?php if ($me['role'] === 'supervisor') : ?>

        function Approval(id) {
            Swal.fire({
                title: 'Tindakan',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Teruskan'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#agreementForm #sid').val(id);
                    $('#agreementForm #status').val(2);
                    $('#agreementForm').submit();
                } else if (result.isDenied) {
                    $('#agreementForm #sid').val(id);
                    $('#agreementForm #status').val(1);
                    $('#agreementForm').submit();
                }
            });
        };
    <?php endif; ?>

    <?php if ($me['role'] === 'kepala') : ?>

        $('.disposeId').click(async function Dispose() {
            var user = '';
            var id = $(this).val();
            var disposed = $(this).attr('data-toggle') == '5'
            await $.ajax({
                method: 'GET',
                url: '<?= base_url() ?>/disposableUser/' + id,
                async: false,
                headers: {
                    'Authorization': 'Bearer <?= $token; ?>'
                },
                dataType: 'json'
            }).then((result) => {
                user = result;
            }).catch((e) => {
                console.log(e);
            });

            const selectOptions = user.map(u => '<option value="' + u.id + '">' + u.nama + '</option>').join(' ')

            Swal.fire({
                title: 'Disposisikan Surat',
                icon: 'warning',
                html: `<form action="disposeLetter" method="post" id="disposeForm">
                        <input value="${id}" name="sid" hidden>
                        <textarea name="pesan" class="form-control w-100 mb-2 " placeholder="Pesan"></textarea>
                        <select class="form-control" ref="selectAll" multiple name="disposalTarget[]" id="disposalTarget">
                        <optgroup data-selectall="true" data-selectalltext="Disposisi ke semua staff">
                        ${selectOptions}
                        </optgroup>
                        </select>                        
                        </form>`,
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: disposed ? 'Batalkan' : 'Simpan',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Disposisikan'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (!$('#disposalTarget').val().length || $('textarea').val() == '') {
                        Swal.fire({
                            title: 'Field harus terisi',
                            icon: 'error'
                        })
                    } else $('#disposeForm').submit();
                }
                if (result.isDenied) {
                    $('#agreementForm #sid').val(id);
                    $('#agreementForm #status').val(3);
                    if (disposed)
                        $('#agreementForm #status').val(2);
                    $('#agreementForm').submit();
                }
            })
            var dp = new SlimSelect({
                select: '#disposalTarget',
                settings: {
                    allowDeselect: true,
                    hideSelected: true,
                    placeholderText: 'Tujuan Disposisi',
                }
            })
        });
    <?php endif; ?>
</script>
<?php $this->endSection(); ?>