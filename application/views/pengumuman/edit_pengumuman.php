<?php
    $this->load->view('template/header');
?>
<h1>Edit Pengumuman <small><?=$title?></small></h1> 
            <?php if(! $status == '') : ?>
            <div class="alert alert-success">
               <?=$status?>
               <a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
            <?php endif; ?>
            <?php echo form_open_multipart('pengumuman/pengumuman/update', 'class="form-horizontal"');?>
            <div class="control-group">
                <label class="control-label" for="judul">Judul Pengumuman</label>
                <div class="controls">
                    <input type="text" id="judul" value="<?=$title?>" name="judul" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="deskripsi">Deskripsi Pengumuman</label>
                    <div class="controls">
                        <textarea id="deskripsi" name="deskripsi" required><?=$desc?></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="waktumulai">Mulai Pengumuman</label>
                    <div class="controls form-inline">
                        <input type="text" id="waktumulai" value="<?=$tanggalmulai?>" name="mulai" required>
                        <label for="jammulai">pukul</label>
                        <select name="jammulai" style="width: 55px">
                            <?php for($i=0; $i<24; $i++): ?>
                                <?php if(strlen($i)==1){
                                    $a = '0'.$i;
                                }else{$a = $i;} ?>
                                <option value='<?=$i?>' <?php if($i==$jammulai){echo 'selected';}?>><?=$a?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="menitmulai" style="width: 55px">
                            <?php $i = 0; while($i<60): ?>
                                    <?php if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;} ?>
                                    <option value='<?=$i?>' <?php if($i==$menitmulai){echo 'selected';}?>><?=$a?></option>');
                                    <?php $i = $i +5; ?>
                            <?php endwhile;?>
                        </select>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="waktuselesai">Selesai Pengumuman</label>
                    <div class="controls form-inline">
                        <input type="text" id="waktuselesai" value="<?=$tanggalselesai?>" name="selesai" required>
                        <label for="jamselesai">pukul</label>
                        <select name="jamselesai" style="width: 55px">
                            <?php for($i=0; $i<24; $i++): ?>
                                <?php if(strlen($i)==1){
                                    $a = '0'.$i;
                                }else{$a = $i;} ?>
                                <option value='<?=$i?>' <?php if($i==$jamselesai){echo 'selected';}?>><?=$a?></option>
                            <?php endfor; ?>
                        </select>
                        <select name="menitselesai" style="width: 55px">
                            <?php $i = 0; while($i<60): ?>
                                    <?php if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;} ?>
                                    <option value='<?=$i?>' <?php if($i==$menitselesai){echo 'selected';}?>><?=$a?></option>');
                                    <?php $i = $i +5; ?>
                            <?php endwhile;?>
                        </select>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="jenis">Jenis Pengumuman</label>
                <div class="controls">
                    <select id="jenis" name="jenis">
                        <option value="1" <?php if($idjenis==1){echo 'selected';}?>>Multimedia</option>
                        <option value="2" <?php if($idjenis==2){echo 'selected';}?>>Text</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="userfile">File Multimedia</label>
                <div class="controls form-inline">
                    <input type="file" id="userfile" name="userfile" value="<?=$file?>" size="30" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="submit"></label>
                <div class="controls">
                    <input type="submit" id="submit" value="Update" class="btn btn-danger"/>
                </div>
            </div>
            <?=form_close()?>
            
<script src="<?=base_url()?>public/jquery-ui/ui/jquery.ui.datepicker.js"></script>
<script>
$(function() {
    $( "#waktumulai" ).datepicker();
    $( "#waktuselesai" ).datepicker();
    $("#waktumulai").datepicker( "option", "dateFormat", "yy-mm-dd" );
    $("#waktuselesai").datepicker( "option", "dateFormat", "yy-mm-dd" );
});
</script>
<?php
    $this->load->view('template/footer');
?>