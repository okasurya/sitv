<?php
    $this->load->view('template/header');
?>
            <h1><?=$title?></h1> 
            <?php if(! $status == '') : ?>
            <div class="alert alert-success">
               <?=$status?>
               <a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
            <?php endif; ?>
            <?php echo form_open_multipart('pengumuman/pengumuman/tambah_pengumuman', 'class="form-horizontal"');?>
            <div class="control-group">
                <label class="control-label" for="judul">Judul Pengumuman</label>
                <div class="controls">
                    <input type="text" id="judul" placeholder="Judul" name="judul" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="deskripsi">Deskripsi Pengumuman</label>
                    <div class="controls">
                        <textarea id="deskripsi" placeholder="Deskripsi" name="deskripsi" required></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mulai Pengumuman</label>
                    <div class="controls form-inline">
                        <input type="text" id="waktumulai" placeholder="Tanggal" name="mulai" required>
                        <label for="jammulai">pukul</label>
                        <select name="jammulai" style="width: 55px">
                            <?php
                                for($i=0; $i<24; $i++){
                                    if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;}
                                    echo('<option value='.$i.'>'.$a.'</option>');
                                }
                            ?>
                        </select>
                        <select name="menitmulai" style="width: 55px">
                            <?php
                                $i = 0;
                                while($i<60){
                                    if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;}
                                    echo('<option value='.$i.'>'.$a.'</option>');
                                    $i = $i +5;
                                }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">Selesai Pengumuman</label>
                    <div class="controls form-inline">
                        <input type="text" id="waktuselesai" placeholder="Tanggal" name="selesai" required>
                        <label for="jamselesai">pukul</label>
                        <select name="jamselesai" style="width: 55px">
                            <?php
                                for($i=0; $i<24; $i++){
                                    if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;}
                                    echo('<option value='.$i.'>'.$a.'</option>');
                                }
                            ?>
                        </select>
                        <select name="menitselesai" style="width: 55px">
                            <?php
                                $i = 0;
                                while($i<60){
                                    if(strlen($i)==1){
                                        $a = '0'.$i;
                                    }else{$a = $i;}
                                    echo('<option value='.$i.'>'.$a.'</option>');
                                    $i = $i +5;
                                }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="jenis">Jenis Pengumuman</label>
                <div class="controls">
                    <select id="jenis" name="jenis">
                        <option value="1">Multimedia</option>
                        <option value="2">Text</option>
                    </select>
                </div>
            </div>
            <div class="control-group" id="filefield">
                <label class="control-label" for="userfile">File Multimedia</label>
                <div class="controls">
                    <input type="file" id="userfile" name="userfile" size="30">   
                </div>
            </div>
            <script>
                $("#jenis").click(function (event){
                    if($(this).val() == 1){
                        $("#filefield").show();
                    }else{
                        $("#filefield").hide();
                    }
                });
            </script>
            <div class="control-group">
                <label class="control-label" for="submit"></label>
                <div class="controls">
                    <input type="submit" id="submit" value="Submit" class="btn btn-primary"/>
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
