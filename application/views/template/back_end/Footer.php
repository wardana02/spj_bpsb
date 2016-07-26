
     </div><!-- ./wrapper -->
                                 

 <!-- REQUIRED JS SCRIPTS -->
    
    

    <!-- Bootstrap 3.3.2 JS -->
    <script src=<?=base_url("assets/backend/adminlte/bootstrap/js/bootstrap.min.js");?> type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src=<?=base_url("assets/backend/adminlte/dist/js/app.min.js");?> type="text/javascript"></script>
   <!-- Slimscroll -->
    <script src=<?=base_url("assets/backend/adminlte/plugins/slimScroll/jquery.slimscroll.min.js");?> type="text/javascript"></script>
    

    <script src=<?=base_url("assets/timeline/js/main.js");?> type="text/javascript"></script>
    <script src=<?=base_url("assets/timeline/js/modernizr.js");?> type="text/javascript"></script>

    <!--Pop Up Confirmation

    <script src=<?=base_url("assets/confirmation/jquery-1.9.1.min.js");?>></script>-->
    <script src=<?=base_url("assets/confirmation/jquery.confirm.js");?>></script>
    <script src=<?=base_url("assets/confirmation/run_prettify.js");?>></script>
    <script> $("#simpleConfirm").confirm();</script>


<!--file include Bootstrap js dan datepickerbootstrap.js-->

    <script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
     $('.datepicker').datetimepicker({
            language:  'id',
            weekStart: 1,
            todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
        });
    </script> 



    <script type="text/javascript" src=<?=base_url("assets/popup-image/js/jquery.lightbox-0.5.min.js");?>></script>
    <script type="text/javascript">
    $(function() {
      $('#gallery a').lightBox();
    });
    </script>



     <!-- Slider -->
    <script src=<?=base_url("assets/slider/responsiveslides.min.js");?> type="text/javascript">
    </script>
      
    <script>
      // You can also use "$(window).load(function() {"
      $(function () {

        // Slideshow 1
        $("#slider1").responsiveSlides({
          maxwidth: 800,
          speed: 1000
        });
      });
    </script>


    <!-- Password validation  -->
    <script src=<?=base_url("assets/validation/js/jquery.validate.min.js");?>></script>
    <script src=<?=base_url("assets/validation/js/additional-methods.min.js");?>></script>
    <link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
    <script>
    // just for the demos, avoids form submit 082134368854e QK7X
    jQuery.validator.setDefaults({
      success: "valid"
    });
    $( "#myform" ).validate({
      rules: {
        password: "required",
        repassword: {
          equalTo: "#password"
        }
      }
    });
    </script>



    <!-- Highchart -->
    <script src=<?=base_url("assets/highchart/js/highcharts.js");?>></script>
    <script src=<?=base_url("assets/highchart/js/modules/data.js");?>></script>
    <script src=<?=base_url("assets/highchart/js/modules/exporting.js");?>></script>

       <script type="text/javascript">
        $(function () {

          Highcharts.setOptions({
              colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', 
                    '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
          });
            $('#adah_chart').highcharts({
                data: {
                    table: 'datatable'
                },
                credits: {
                    text: 'SPJ BPSB Jateng',
                    href: 'http://spj-bpsbjateng.hol.es'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Monitoring Anggaran Perjalanan Dinas BPSB <?php echo $this->session->userdata('tahun')?>'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Angka Dalam Satuan Puluh Juta'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + 'Juta, Pada ' + this.point.name;
                    }
                }
            });
        });
      </script>

    <!-- date-range-picker -->
    <script src=<?=base_url("assets/backend/adminlte/plugins/daterangepicker/daterangepicker.js");?> type="text/javascript"></script>
     
     <!-- InputMask -->
     <script src=<?=base_url("assets/backend/adminlte/plugins/input-mask/jquery.inputmask.js");?> type="text/javascript"></script>
     <script src=<?=base_url("assets/backend/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js");?> type="text/javascript"></script>
     <script src=<?=base_url("assets/backend/adminlte/plugins/input-mask/jquery.inputmask.extensions.js");?> type="text/javascript"></script>
   
    <!-- DATA TABES SCRIPT -->
          
    <script src="<?php echo base_url() ?>assets/backend/adminlte/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/backend/adminlte/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

       <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('DDDD M, YYYY') + '-' + end.format('DDDD M, YYYY'));
        }
        );

      
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

    <style type="text/css">
        ${demo.css}
    </style>

    <script type="text/javascript">
        function runScript(e){
        
            if(e.keyCode<48 || e.keyCode>57){
                return false
            }        
        }
    
    </script>

  </body>
</html>



