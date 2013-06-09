<?php
    $this->load->view('template/header');
?>
<h1>Edit Pengumuman <small><?=$title?></small></h1> 
            <?php if(! $status_p == NULL) : ?>
            <div class="alert alert-success">
               <?=$status_p?> <a href="<?=site_url('home')?>"> Kembali ke menu awal</a>
               <a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
            <?php endif; ?>
            <?php echo form_open_multipart('pengumuman/pengumuman/update', 'class="form-horizontal"');?>
            <div class="control-group">
                <label class="control-label" for="judul">ID</label>
                <div class="controls">
                    <input type="text" id="id" value="<?=$id?>" name="id" readonly>
                </div>
            </div>
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
                        <input type="text" id="waktumulai" value="<?=$tanggalmulai?>" placeholder="<?=$tanggalmulai?>" name="mulai">
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
                        <input type="text" id="waktuselesai" value="<?=$tanggalselesai?>" placeholder="<?=$tanggalselesai?>" name="selesai">
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
            <?php if($idjenis==2): ?>
                <style> 
                    #filefield{
                        display: none;
                    }
                </style>
            <?php endif; ?>
            <div class="control-group" id="filefield">
                <label class="control-label" for="userfile">File Multimedia</label>
                <div class="controls form-inline">
                    <input type="file" id="userfile" name="userfile" value="<?=$file?>" size="30" >
                    <?php if(!$file == '') :?>
                    <!--<a href="<?=site_url();?>/pengumuman/pengumuman/delete_file/<?=$id?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete file</a>-->
                    <?php endif; ?>
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
                    <input type="submit" id="submit" value="Update" class="btn btn-primary "/> <a href="<?=site_url('pengumuman/pengumuman/delete').'/'.$id?>" class="btn btn-danger"><i class="icon-trash icon-white"></i> Hapus</a>
                </div>
            </div>
            <?=form_close()?>           
            <script>
                $(function() {
                    $( "#waktumulai" ).datepicker();
                    $( "#waktuselesai" ).datepicker();
                    $("#waktumulai").datepicker( "option", "dateFormat", "yy-mm-dd" );
                    $("#waktuselesai").datepicker( "option", "dateFormat", "yy-mm-dd" );
                });
            </script>
			<div style="display:none;" >
			<div id="tanya-hapus" title="Approve">
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><b>Hapus</b> pengumuman ini?</p>
			</div>
			<div id="persetujua
<?php
    $this->load->view('template/footer');
?>