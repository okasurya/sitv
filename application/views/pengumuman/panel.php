<?php
    $this->load->view('template/header');
?>
    <link rel="stylesheet" href="<?=base_url()?>public/flexigrid/flexigrid.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>public/flexigrid/flexigrid.js"></script> 
    <?php date_default_timezone_set('Asia/Jakarta'); $time = date('D, d-M-Y'); ?>
    <h1><?=$title?><small> <?=$time?></small></h1>
    <div id="flex"></div>
    <script type="text/javascript">    
	var site_url = "<?=site_url(); ?>";
    <?php echo $js_grid; ?>
    function menu1(com,grid)
    {
        if (com=='Select All'){
            $('.bDiv tbody tr',grid).addClass('trSelected');
        }
        if (com=='Select None'){
            $('.bDiv tbody tr',grid).removeClass('trSelected');
        }
        if (com=='Approve'){
			if($('.trSelected',grid).length>0){
				$( "#persetujuan-ya" ).dialog({
				  resizable: false,
				  draggable: false,
				  height:200,
				  width: 400,
				  modal: true,
				  buttons: {
						"OK": function() {
								var items = $('.trSelected',grid);
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+",";
								}
								$.ajax({
								   type: "POST",
								   url: "<?php echo site_url("pengumuman/manajemen/setuju/");?>",
								   data: "ids="+itemlist,
								   success: function(data){
										$('#flex').flexReload();
										//alert(data);
								   }
								});
								$( this ).dialog( "close" );
						},
						"Batal": function() {
						  $( this ).dialog( "close" );
						}
						}
				  });
			} else {
				return false;
			}
        }
        if (com=='Reject'){
            if($('.trSelected',grid).length>0){
				$( "#persetujuan-tolak" ).dialog({
				  resizable: false,
				  draggable: false,
				  height:200,
				  width: 400,
				  modal: true,
				  buttons: {
						"OK": function() {
								var items = $('.trSelected',grid);
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+",";
								}
								$.ajax({
								   type: "POST",
								   url: "<?php echo site_url("pengumuman/manajemen/tolak/");?>",
								   data: "ids="+itemlist,
								   success: function(data){
										$('#flex').flexReload();
										//alert(data);
								   }
								});
								$( this ).dialog( "close" );
						},
						"Batal": function() {
						  $( this ).dialog( "close" );
						}
						}
				  });
			} else {
				return false;
			}
        }
        if (com=='Generate Playlist'){
			if($('.aprv',grid).length>0){
				var items = $('.aprv',grid);
				var itemlist ='';
				for(i=0;i<items.length;i++){
					itemlist+= items[i].id.substr(4)+",";
				}
				$.ajax({
					type: "POST",
					url: "<?php echo site_url("pengumuman/playlist/generate_multimedia/");?>",
					data: "ids="+itemlist,
					success: function(){
						var link_txt = site_url+"/pengumuman/playlist/download/";
						$("#txt_file").attr('href', link_txt);
						$( "#playlist-berhasil" ).dialog({
							resizable: false,
							draggable: false,
							height:200,
							width: 400,
							modal: true,
						});
					}
				});
			} else{
				$( "#playlist-gagal" ).dialog({
					resizable: false,
					draggable: false,
					height:200,
					width: 400,
					modal: true,
					buttons: {
						"OK": function() {
							$( this ).dialog( "close" );
						}
					}
				});
			}
		}
	}
    </script>
    <br>
    <?=form_open('pengumuman/manajemen/useforce')?>
    <input type="submit" value="Download" class="btn"/>
    <?=form_close()?>
    <div style="display:none;" >
        <div id="persetujuan-ya" title="Approve">
          <p><span class="ui-icon ui-icon-help" style="float: left; margin: 0 7px 20px 0;"></span><b>Ijinkan</b> pengumuman yang dipilih untuk tayang dalam SI TV ?</p>
        </div>
        <div id="persetujuan-tolak" title="Reject">
          <p><span class="ui-icon ui-icon-help" style="float: left; margin: 0 7px 20px 0;"></span><b>Tolak</b> pengumuman yang dipilih untuk tayang dalam SI TV ?</p>
        </div>
		<div id="playlist-berhasil" title="Download">
          <p><span class="ui-icon ui-icon-check " style="float: left; margin: 0 7px 20px 0;"></span>Playlist berhasil dibuat!<br>Download playlist untuk hari ini?
		  <br>
				<div align="center">
					<a id="txt_file" target="_blank" href="" ><img src="<?= base_url();?>public/images/icons/save.png" title="Save file"></a><br>
					<b>Save file</b>
				</div>
		  </p>
        </div>
		<div id="playlist-gagal" title="Gagal">
          <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Generate playlist <b>gagal</b>!</p>
        </div>
    </div>
<?php
    $this->load->view('template/footer');
?>
