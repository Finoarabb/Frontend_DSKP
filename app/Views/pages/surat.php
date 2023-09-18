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
                            <th scope="col">No Surat</th>
                            <th scope="col"><?= $tipe === 'masuk' ? 'Asal' : 'Tujuan'; ?></th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($surat as $srt): ?>
                             <tr>
                        <td> <?=$srt['no_surat'];?> </td>
                        <td><?= $srt['asal']; ?></td>
                        <td><?= $srt['tanggal'];?></td>
                        <td>
                        <div class="d-flex justify-content-center">
                        <div class="mr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button class="btn btn-act"><i class="fas fa-ellipsis-v"></i></button>
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
<?php $this->endSection(); ?>