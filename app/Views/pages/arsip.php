<div class="widget">
    <div class="widget-header">
        <h5>JUDUL APLIKASI SURAT</h5>
    </div>
    <div class="widget-content">
        <p><button class="btn btn-success" id="cmdTambah"><i class="icon-plus icon-white"></i>Tambah Data</button></p>
        <p>
        <form class="form-horizontal" id='frmArsip' method="POST" action="ARSIP/arsip_upload.php" enctype="multipart/form-data">
            <legend>Menambah Data Arsip</legend>
            <input type="hidden" name="tmp" id="tmp">
            <input type="hidden" name="MODE" id="MODE" value="ADD">
            <div class="control-group">
                <label class="control-label" for="txtID">ID</label>
                <div class="controls">
                    <input type="text" id="txtID" name="txtID" placeholder="Kode Arsip" required="required">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="cmbKategori">Kategori</label>
                <div class="controls">
                    <select id="cmbKategori" name="cmbKategori">
                        <option value="Surat Masuk">Surat Masuk</option>
                        <option value="Surat Keluar">Surat Keluar</option>
                        <option value="Dokumen">Dokumen</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tgl Arsip</label>
                <div class="controls">
                    <label class="">
                        <input type="date" id="txtTgl" name="txtTgl" placeholder="Tanggel file arsip" />
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Subjek / Perihal</label>
                <div class="controls">
                    <label class="">
                        <input type="text" class="input-xxlarge" id="txtSubjek" name="txtSubjek" placeholder="Subjek atau Judul Arsip" />
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="txtRingkasan">Ringkasan Isi Arsip</label>
                <div class="controls">
                    <textarea id="txtRingkasan" rows="4" class="input-xxlarge" name="txtRingkasan" placeholder="Keterangan Singkat"></textarea>
                </div>
            </div>
            <div class="control-group" id='lampiranView'>
                <label class="control-label">File Lampiran</label>
                <div class="controls">
                    <label class="control-label">
                        <input type="file" id="upload" name="upload[]" multiple>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Semua Lampiran</label>
                <div class="controls" id='lampiranEdit'>

                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <a id="cmdSimpan" class="btn btn-info">Simpan</a>
                </div>
            </div>
        </form>
        <hr>
        </p>
    </div>