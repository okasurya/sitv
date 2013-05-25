<?php
    $this->load->view('template/header');
?>        
            <div class="alert alert-info">
                Selamat datang <strong><?=$this->session->userdata('username')?></strong>, di website SI TV !
                <a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/fullcalendar/fullcalendar.css" />
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/fullcalendar/fullcalendar.print.css" />
            <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/fullcalendar/cupertino/theme.css" />
        
            <script src="<?=base_url()?>public/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
            <script src="<?=base_url()?>public/fullcalendar/gcal.js" type="text/javascript"></script>
            <script src="<?=base_url()?>public/fullcalendar/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
            
            <script type='text/javascript'>
            <?php
                            $base_url = base_url();
            ?>
                    $(document).ready(function() {

                            var date = new Date();
                            var d = date.getDate();
                            var m = date.getMonth();
                            var y = date.getFullYear();

                            $('#calendar').fullCalendar({
                                    header: {
                                        left: 'prev,next today',
                                        center: 'title',
                                        right: 'month,agendaWeek,agendaDay'
                                    },
                                    selectable: false,
                                    selectHelper: true,
                                    select: function(start, end, allDay) {
                                            var title = prompt('Jadwal Penayangan Pengumuman:');
                                            if (title) {
                                                    calendar.fullCalendar('renderEvent',
                                                            {
                                                                    title: title,
                                                                    start: start,
                                                                    end: end,
                                                                    allDay: allDay
                                                            },
                                                            true // make the event "stick"
                                                    );
                                            }
                                            calendar.fullCalendar('unselect');
                                    },
                                    editable: false,
                                    events: [
                                            <?php
                                                    foreach ($jadwal->result() as $row){
                                                            //$data[''] = $row->NAMA_BATCH;
                                                            $bulan_entry = $row->BULAN_MULAI-1;
                                                            $bulan_selesai = $row->BULAN_SELESAI-1;
                                                            echo "
                                                            {
                                                            title: '".$row->JUDUL_PENGUMUMAN."',
                                                            start: new Date(".$row->TAHUN_MULAI.", ".$bulan_entry.", ".$row->TANGGAL_MULAI.", ".$row->JAM_MULAI.", ".$row->MENIT_MULAI."),
                                                            end: new Date(".$row->TAHUN_SELESAI.", ".$bulan_selesai.", ".$row->TANGGAL_SELESAI.", ".$row->JAM_SELESAI.", ".$row->MENIT_SELESAI."),
                                                            url: '".site_url('pengumuman/pengumuman/detail_pengumuman')."/".$row->ID_PENGUMUMAN."',
                                                            allDay: false
                                                            },
                                                            ";
                                                    }
                                            ?>
                                    ]
                            });
                            

                    });
            </script>
            <div id='calendar'></div>
<?php
    $this->load->view('template/footer');
?>