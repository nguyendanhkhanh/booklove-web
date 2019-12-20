</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy; 2019 - 2020. Đại học Bách Khoa Hà Nội
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    <script src="public/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="public/assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="public/assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="public/assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="public/assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="public/assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="public/assets/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="public/assets/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="public/assets/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="public/assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="public/assets/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="public/assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="public/assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="public/assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="public/assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="public/assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="public/assets/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="public/assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="public/assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="public/assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="public/assets/admin/vendors/moment/min/moment.min.js"></script>
    <script src="public/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    
    <!-- Custom Theme Scripts -->
    <script src="public/assets/admin/build/js/custom.min.js"></script>

    <!-- DatePicker -->
	<script type="text/javascript" src="public/assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="public/assets/js/bootstrap-datepicker.vi.js"></script>
    <script>
        $(document).ready(function(){
        $.fn.datepicker.defaults.language = 'vi';
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var date_input=$('input[id="txtDate"]');
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
    <!-- Validate -->
    <script type="text/javascript" src="public/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="public/assets/js/messages_vi.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#frmProfile").validate({

          rules: {
          txtPass1: {
            equalTo: "#txtPass"
          }
        }
        });
        
      });
    </script>
  </body>
</html>