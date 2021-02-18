<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2><b>Hallo <?= session()->get('nama'); ?></b></h2>
            <h4>Anda Menggunakan Hak Akses <?= session()->get('role'); ?></h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data User</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $user; ?></p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Pelanggan</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $pelanggan; ?></p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Pemasok</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $pemasok; ?></p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Transaksi</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $transaksi; ?></p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Produk</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $produk; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Donut Chart -->
    <div class="row">
    <div class="col-xl">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                <!-- tyling for the donut chart can be found in the
                <code>/js/demo/chart-pie-demo.js</code> file. -->
            </div>
        </div>
    </div>
    </div>
    
</div>



<!-- Page level plugins -->
<script src="/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="/assets/js/demo/chart-area-demo.js"></script> -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["User", "Pelanggan", "Pemasok", "Transaksi", "Produk"],
    datasets: [{
      data: [<?= $user; ?>, <?= $pelanggan; ?>, <?= $pemasok; ?>, <?= $transaksi; ?>, <?= $produk; ?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#76b9ca', '#05b4gc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','white','#90v4cga'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>
<!-- <script src="/assets/js/demo/chart-bar-demo.js"></script> -->
<?= $this->endSection(); ?>
