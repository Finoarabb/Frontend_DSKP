<?php $this->extend('layout'); ?>
<?php $this->section('content'); ?>

<div id="main-context">
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="row align-items-center justify-content-center mb-4">
            <div class="col-sm-auto">
                <b class="h3 mb-0">Disposisi Masuk</b>
            </div>
            <div class="col border-top border-primary d-none d-sm-block"></div>
        </div>
        <table id="tabelsaya" class="table font-barlow text-black">
            <thead>
                <tr class="text-dark">
                    <th scope="col" class="text-center">Tanggal Terima Surat</th>
                    <th scope="col" class="text-center">No Surat</th>
                    <th scope="col" class="text-center">Asal Surat</th>
                    <th scope="col" class="text-center">Tanggal Surat</th>
                    <th scope="col" class="text-center">Perihal Surat</th>
                    <th scope="col" class="text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if (is_array($surat)) :
                    foreach ($surat as $srt) : ?>
                        <tr>
                                <td class="text-center"><?= $srt['created_at']; ?></td>
                            <td>
                                <?= $srt['no_surat']; ?>
                            </td>
                            <td>
                                <?= $srt['asal'] ?>
                            </td>
                            <td class="text-center"><?= $srt['tanggal'] ?></td>
                            <td class="text-center"><?= empty($srt['perihal']) ? '-' : $srt['perihal'] ?></td>
                            <td>
                                <div class="d-flex justify-content-center">                                                                            
                                    <a class="btn btn-primary" data-toggle="dropdown" id="action-dropdown"><i class="fa fa-fw fa-bars"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="viewSurat/<?= $srt['id']; ?>">Preview</i></a>
                                        </li>
                                            <li>
                                                <button class="dropdown-item viewDisposisi" value="<?= $srt['id']; ?>" data-toggle="modal" data-target="#dispmodal">
                                                    Proses
                                                </button>
                                            </li>
                                            <?php if(!empty($srt['lampiran'])): ?>
                                            <li>
                                                <a class="dropdown-item" href="<?= $srt['lampiran']; ?>">
                                                    Lampiran                                                
                                                </a>
                                            </li>
                                            <?php endif;?>
                                    </ul>

                                </div>
                            </td>
                        </tr>
                <?php endforeach;
                 endif;?>
            </tbody>
        </table>
    </div>
</div>
<script>
    var tipe = 'masuk';
    var baseurl = "<?=base_url();?>";
    var disp;
    $('.viewDisposisi').click(function(){
            $.ajax({
                method: 'GET',
                url:baseurl+'/disposedLetter/'+$(this).val(),
                dataType:'json'
            }).then((result)=>{
                disp =result;
                $('#dispmodal').modal('toggle');

            }).catch((error)=>{
                console.log(error);
            });
        })
</script>
<?php $this->endSection(); ?>