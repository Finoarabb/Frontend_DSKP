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
                                </tr> -->


                        <!-- <tr>
                                            <td>
                                                <span class="folder" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-link="sCqAp17bpDT0MO1MmzvfcKVeGy3ghNOj" href="#"><i
                                                        class="fas fa-fw fa-folder"></i><span>Surat Keputusan Ketua
                                                        DPM</span></span>
                                                <div class="klikkanan dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="https://dpm.stis.ac.id/dpm/prazip/sCqAp17bpDT0MO1MmzvfcKVeGy3ghNOj?namafolder=Surat Keputusan Ketua DPM"><i class="fas fa-download fa-sm fa-fw text-gray-400 mr-2"></i>Download</a>
                                                    <a class="dropdown-item"
                                                        href="https://dpm.stis.ac.id/dpm/arsipdokumen/sCqAp17bpDT0MO1MmzvfcKVeGy3ghNOj"><i
                                                            class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                </div>
                                            </td>
                                            <td>2022-09-11 14:57:09pm</td>
                                            <td>File Folder</td>
                                            <td>
                                                <div class="dropdown no-arrow dropright text-right m-1">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                        <a class="dropdown-item"
                                                            href="https://dpm.stis.ac.id/dpm/arsipdokumen/sCqAp17bpDT0MO1MmzvfcKVeGy3ghNOj"><i
                                                                class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Notula Sidang                                                                                                    
                                            </td>
                                            <td>2022-09-11 14:57:19pm</td>
                                            <td>File Folder</td>
                                            <td>
                                                <div class="dropdown no-arrow dropright text-right m-1">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                        <a class="dropdown-item"
                                                            href="https://dpm.stis.ac.id/dpm/arsipdokumen/AQ7eFkgXECZq8qGVbw7d0O4UtaBSOxd0"><i
                                                                class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <span class="folder" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-link="5rt4iJK3AyKn2UzM8NSTf6uFN8CBzdRf" href="#"><i
                                                        class="fas fa-fw fa-folder"></i><span>Peraturan
                                                        Papera</span></span>
                                                <div class="klikkanan dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="https://dpm.stis.ac.id/dpm/prazip/5rt4iJK3AyKn2UzM8NSTf6uFN8CBzdRf?namafolder=Peraturan Papera"><i class="fas fa-download fa-sm fa-fw text-gray-400 mr-2"></i>Download</a>
                                                    <a class="dropdown-item"
                                                        href="https://dpm.stis.ac.id/dpm/arsipdokumen/5rt4iJK3AyKn2UzM8NSTf6uFN8CBzdRf"><i
                                                            class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                </div>
                                            </td>
                                            <td>2022-09-11 15:06:18pm</td>
                                            <td>File Folder</td>
                                            <td></td>
                                            <td>
                                                <div class="dropdown no-arrow dropright text-right m-1">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                        <a class="dropdown-item"
                                                            href="https://dpm.stis.ac.id/dpm/arsipdokumen/5rt4iJK3AyKn2UzM8NSTf6uFN8CBzdRf"><i
                                                                class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <span class="folder" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-link="Gk0aB0Po0LUsf17jjmdc9VyQxik4iZAZ" href="#"><i
                                                        class="fas fa-fw fa-folder"></i><span>AD/ART Imapolstat
                                                        22/23</span></span>
                                                <div class="klikkanan dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="https://dpm.stis.ac.id/dpm/prazip/Gk0aB0Po0LUsf17jjmdc9VyQxik4iZAZ?namafolder=AD/ART Imapolstat 22/23"><i class="fas fa-download fa-sm fa-fw text-gray-400 mr-2"></i>Download</a>
                                                    <a class="dropdown-item"
                                                        href="https://dpm.stis.ac.id/dpm/arsipdokumen/Gk0aB0Po0LUsf17jjmdc9VyQxik4iZAZ"><i
                                                            class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                </div>
                                            </td>
                                            <td>2022-12-06 12:15:13pm</td>
                                            <td>File Folder</td>
                                            <td></td>
                                            <td>
                                                <div class="dropdown no-arrow dropright text-right m-1">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                        <a class="dropdown-item"
                                                            href="https://dpm.stis.ac.id/dpm/arsipdokumen/Gk0aB0Po0LUsf17jjmdc9VyQxik4iZAZ"><i
                                                                class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>
                                                <span class="folder" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-link="jBsPciDPCfNToWBsstGHy3BvSpJXdLpm" href="#"><i
                                                        class="fas fa-fw fa-folder"></i><span>SIDANG UMUM
                                                        II</span></span>
                                                <div class="klikkanan dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="https://dpm.stis.ac.id/dpm/prazip/jBsPciDPCfNToWBsstGHy3BvSpJXdLpm?namafolder=SIDANG UMUM II"><i class="fas fa-download fa-sm fa-fw text-gray-400 mr-2"></i>Download</a>
                                                    <a class="dropdown-item"
                                                        href="https://dpm.stis.ac.id/dpm/arsipdokumen/jBsPciDPCfNToWBsstGHy3BvSpJXdLpm"><i
                                                            class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                </div>
                                            </td>
                                            <td>2023-03-08 19:35:04pm</td>
                                            <td>File Folder</td>
                                            <td></td>
                                            <td>
                                                <div class="dropdown no-arrow dropright text-right m-1">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                        aria-labelledby="dropdownMenuLink">
                                                        <div class="dropdown-header">Dropdown Header:</div>
                                                        <a class="dropdown-item"
                                                            href="https://dpm.stis.ac.id/dpm/arsipdokumen/jBsPciDPCfNToWBsstGHy3BvSpJXdLpm"><i
                                                                class="fas fa-eye fa-sm fa-fw text-gray-400 mr-2"></i>View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


</div>
<?= $this->endSection() ?>