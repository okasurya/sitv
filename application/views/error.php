<?php
    $sitedata['title'] = 'SI TV | Login';
    $this->load->view('template/header');
?>
    <h3><?=$content;?></h3>
    <form action="<?=site_url()?>">
        <input type="submit" value="Kembali ke menu awal" class="btn btn-danger">
    </form>
<?php
    $this->load->view('template/footer');
?>