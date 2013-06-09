<?php
    $sitedata['title'] = 'SI TV | Login';
    $this->load->view('template/header');
?>
<?php if(! $status == '') : ?>
<div class="alert">
   <?=$status?>
   <a href="#" class="close" data-dismiss="alert">&times;</a>
</div>
<?php endif; ?>
<div class="hero-unit">
    <h1>Selamat Datang !</h1>
    <p><br><br></p>
</div>
<?php
    $this->load->view('template/footer');
?>