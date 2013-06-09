<?php
    $data['title'] = $title;
    $this->load->view('template/header', $data);
?>
    <?php echo $error;?>
<?php
    $this->load->view('template/footer');
?>