</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> All Rights Reserved
    </div>
    <div class="footer-right">
        Development By <a href="https://mirfanpermana.showwcase.com" class="text-decoration-none">
            Muhammad Irfan Permana
        </a>
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url() ?>/asset/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/asset/js/popper.js"></script>
<script src="<?= base_url() ?>/asset/js/tooltip.js"></script>
<script src="<?= base_url() ?>/asset/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/asset/js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url() ?>/asset/js/moment.min.js"></script>
<script src="<?= base_url() ?>/asset/js/stisla.js"></script>

<script src="<?= base_url() ?>/asset/js/datatables.min.js"></script>
<script src="<?= base_url() ?>/asset/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/asset/js/dataTables.select.min.js"></script>
<script src="<?= base_url() ?>/asset/js/select2.full.min.js"></script>

<script src="<?= base_url() ?>/asset/js/scripts.js"></script>
<script>
    $(".datatable").dataTable({
        "ordering": false
    });
</script>
<?php if (isset($totalPinjam) && isset($totalPinjam) && isset($totalPinjam)) : ?>
    <script src="<?= base_url() ?>/asset/js/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Total Pinjam', 'Terpinjam', 'Belum Kembali'],
                datasets: [{
                    label: 'Buku Tanah',
                    data: [<?= $totalPinjam ?>, <?= $terpinjam ?>, <?= $belumKembali ?>],
                    backgroundColor: [
                        'rgb(99,237,122)',
                        'rgb(103,119,239)',
                        'rgb(255,164,38)'
                    ],
                    borderColor: [
                        'rgb(99,237,122)',
                        'rgb(103,119,239)',
                        'rgb(255,164,38)'
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: "'Nunito' sans-serif"
                            }
                        }
                    }
                }
            }
        });
    </script>
<?php endif; ?>
</body>

</html>