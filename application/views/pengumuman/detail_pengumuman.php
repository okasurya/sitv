<?php
    foreach  ($detail->result() as $row){
        $id = $row->ID_PENGUMUMAN;
        $title = $row->JUDUL_PENGUMUMAN;
        $desc = $row->DESKRIPSI_PENGUMUMAN;
        $mulai = $row->TANGGAL_MULAI;
        $jammulai = $row->JAM_MULAI;
        $menitmulai = $row->MENIT_MULAI;
        $selesai = $row->TANGGAL_SELESAI;
        $jamselesai = $row->JAM_SELESAI;
        $menitselesai = $row->MENIT_SELESAI;
        $jenis = $row->ID_JENIS_PENGUMUMAN;
        $fileurl = $row->LOKASI_FILE_PENGUMUMAN;
        $id_pengisi = $row->ID_PENGISI_PENGUMUMAN;
    }
    
    $sitedata['title'] = 'Detail Pengumuman: '.$title;
    $this->load->view('template/header', $sitedata);
?>
    <h1>Detail Pengumuman <small><?=$row->JUDUL_PENGUMUMAN;?></small></h1>
    <form class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="deskripsi">Deskripsi Pengumuman</label>
            <div class="controls">
                <textarea id="deskripsi" readonly><?=$desc?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="tanggalmulai">Waktu Mulai</label>
            <div class="controls">
                <input type="text" id="tanggalmulai" value="<?=$mulai?>" readonly>
                <?php 
                    if (strlen($jammulai) < 2){$jammulai = '0'.$jammulai;} 
                    if (strlen($menitmulai) < 2){$menitmulai = '0'.$menitmulai;} 
                    $waktumulai = $jammulai.':'.$menitmulai;
                ?>
                <strong><input type="text" id="waktumulai" value="<?=$waktumulai?>" style="font-weight: bold; width: 50px;" readonly></strong>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="tanggalselesai">Waktu Selesai</label>
            <div class="controls">
                <input type="text" id="tanggalselesai" value="<?=$selesai?>" readonly>
                <?php 
                    if (strlen($jamselesai) < 2){$jamselesai = '0'.$jamselesai;} 
                    if (strlen($menitselesai) < 2){$menitselesai = '0'.$menitselesai;} 
                    $waktuselesai = $jamselesai.':'.$menitselesai;
                ?>
                <input type="text" id="waktuselesai" value="<?=$waktuselesai?>" style="font-weight: bold; width: 50px;" readonly>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="jenis">Jenis Pengumuman</label>
            <div class="controls">
                <input type="text" id="jenis" value="<?php if($jenis == 1){ echo 'Multimedia';} else{echo 'Text';}?>" readonly>
            </div>
        </div>
        <?php if (($this->session->userdata('role') == 1) or ($this->session->userdata('user_id')== $id_pengisi)): ?>
         <div class="control-group">
            <label class="control-label" for="file">File</label>
            <div class="controls">
                <?= anchor(base_url('uploads/'.$fileurl), 'Download', 'class="btn btn-inverse"'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="tombol"></label>
            <div class="controls">
                <?= anchor(site_url('pengumuman/pengumuman/edit_pengumuman/'.$id), 'Edit', 'id="tombol" class="btn btn-info"');?>
            </div>
        </div>
        <?php endif; ?>
    </form>    
<?php
    $this->load->view('template/footer');
?>