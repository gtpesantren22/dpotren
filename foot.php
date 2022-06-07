<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="./plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="./plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="./plugins/d3v3/index.js"></script>
<script src="./plugins/topojson/topojson.min.js"></script>
<script src="./plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="./plugins/raphael/raphael.min.js"></script>
<script src="./plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="./plugins/chartist/js/chartist.min.js"></script>
<script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

<script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

<script src="./js/dashboard/dashboard-1.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "ajax/get_provinsi.php",
            cache: false,
            success: function(msg) {
                $("#provinsi").html(msg);
            }
        });

        $("#provinsi").change(function() {
            var provinsi = $("#provinsi").val();
            $.ajax({
                type: 'POST',
                url: "ajax/get_kabupaten.php",
                data: {
                    provinsi: provinsi
                },
                cache: false,
                success: function(msg) {
                    $("#kabupaten").html(msg);
                }
            });
        });

        $("#kabupaten").change(function() {
            var kabupaten = $("#kabupaten").val();
            $.ajax({
                type: 'POST',
                url: "ajax/get_kecamatan.php",
                data: {
                    kabupaten: kabupaten
                },
                cache: false,
                success: function(msg) {
                    $("#kecamatan").html(msg);
                }
            });
        });

        $("#kecamatan").change(function() {
            var kecamatan = $("#kecamatan").val();
            $.ajax({
                type: 'POST',
                url: "ajax/get_kelurahan.php",
                data: {
                    kecamatan: kecamatan
                },
                cache: false,
                success: function(msg) {
                    $("#kelurahan").html(msg);
                }
            });
        });

        $("#t_formal").change(function() {
            var t_formal = $("#t_formal").val();
            $.ajax({
                type: 'POST',
                url: "ajax/get_kelas.php",
                data: {
                    t_formal: t_formal
                },
                cache: false,
                success: function(msg) {
                    $("#k_formal").html(msg);
                }
            });
        });

        $("#komplek").change(function() {
            var komplek = $("#komplek").val();
            $.ajax({
                type: 'POST',
                url: "ajax/get_kamar.php",
                data: {
                    komplek: komplek
                },
                cache: false,
                success: function(msg) {
                    $("#kmr").html(msg);
                }
            });
        });
    });
</script>
</body>

</html>