<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div id="main-context">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row align-items-center justify-content-center mb-4">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Utamas</b>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span>Surat Keputusan Kepala BPS</span>
                            </td>
                            <td>2023-08-29 09:59:19</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="mr-3">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <button class="btn btn-act"><i class="fas fa-ellipsis-v"></i></button>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                            <a class="dropdown-item" href="#home">Aksi 1</a>
                                            <div class="dropdown-divider"></div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span>Mekanisme Jarkoman</span>
                            </td>
                            <td>2022-10-07 13:47:24</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <span>Ketetapan DPM</span></span>
                            </td>
                            <td>2022-03-20 19:26:01</td>
                            <td></td>
                        </tr>
                        <!-- <table id="tabelsayu" class="table d-none">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col" class="col-lg">Nama</th>
                                    <th scope="col" class="col-lg">Tanggal</th>
                                    <th scope="col" class="col-lg">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>AD/ART Imapolstat 21/22</span>
                                    </td>
                                    <td>2021-12-29 09:59:19</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="mr-3">
                                                <button class="btn btn-arsip file-act"><i class="fas fa-eye"></i></button>
                                            </div>
                                            <button class="btn btn-arsip file-download"><i class="fas fa-download"></i></button>
                                        </div>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
            </div>
        </div>

    </div>


</div>
<?php $this->endSection();?>
