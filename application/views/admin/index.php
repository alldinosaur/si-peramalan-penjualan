<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pemasukan Hari Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $tanggal = date('Y-m-d');
                        $transaksi = $this->db
                            ->query(
                                "SELECT sum(transaksi_nominal) AS total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'"
                            )
                            ->result_array();
                        ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                </div>    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pemasukan Bulanan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $bulan = date('m');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan_bulanan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_bulanan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_bulanan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>               
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pemasukan Tahun Ini
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
                            $tahun = date('Y');
                            $transaksi = $this->db
                                ->query(
                                    "SELECT sum(transaksi_nominal) AS total_pemasukan_tahunan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'"
                                )
                                ->result_array();
                            ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_tahunan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_tahunan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                            </div>
                        </div>
                        </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Seluruh Pemasukan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_seluruh_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'"
                        )
                        ->result_array(); ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_seluruh_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_seluruh_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pengeluaran Hari Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $tanggal = date('Y-m-d');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and transaksi_tanggal='$tanggal'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pengeluaran Bulan Ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                    $bulan = date('m');
                    $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_pemasukan_bulanan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and month(transaksi_tanggal)='$bulan'"
                        )
                        ->result_array();
                    ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_bulanan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_bulanan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>          
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran Tahun Ini
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php
                            $tahun = date('Y');
                            $transaksi = $this->db
                                ->query(
                                    "SELECT sum(transaksi_nominal) AS total_pemasukan_tahunan FROM transaksi WHERE transaksi_jenis='Pengeluaran' and year(transaksi_tanggal)='$tahun'"
                                )
                                ->result_array();
                            ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_pemasukan_tahunan']) {
                        echo 'Rp. ' .
                            number_format($m['total_pemasukan_tahunan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Seluruh Pengeluaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php $transaksi = $this->db
                        ->query(
                            "SELECT sum(transaksi_nominal) AS total_seluruh_pemasukan FROM transaksi WHERE transaksi_jenis='Pengeluaran'"
                        )
                        ->result_array(); ?>
                    <?php foreach ($transaksi as $m): ?>
                    <?php if ($m['total_seluruh_pemasukan']) {
                        echo 'Rp. ' .
                            number_format($m['total_seluruh_pemasukan']) .
                            ' ,-';
                    } else {
                        echo 0;
                    } ?>                    
                <?php endforeach; ?>  
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->
<h2 class="h3 mb-4 text-gray-800">Tabel Pendapatan</h2>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger role"="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <div class="col-12">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalPendapatan">Tambah Pendapatan</a>
						<table class="table table-hover table-bordered">
							<tr>
								<th>Bulan</th>
								<th>Data Aktual</th>
								<th>Data Perkiraan</th>
								<th>Error</th>
								<th>Abs Error</th>
								<th>Abs Error %</th>
                                <th>MAPE</th>
							</tr>
							<?php
		                    //untuk menentukan nilai peramalan pertama
							$resultquery = $this->db->query("SELECT SUM(nilai) AS nilai_total from pendapatan");
							$hasilsum = $resultquery->row_array();

							$resultquery = $this->db->query("SELECT * from pendapatan");
							$d_perkiraan = "";
							$count = $resultquery->num_rows();
							$loop = 0;
							$sum_abs_err = 0;
							$sum_abs_err_percent = 0;
							$mape = 0;
                            // print_r($hasilsum);
                            // print_r($resultquery->row_array()["nilai"]);
                            // print_r($count);

                            // die;

							foreach($resultquery->result_array() as $row)
							{
			                    //inisiasi data perkiraan pertama
								if ($d_perkiraan === "") {
									$d_perkiraan = $resultquery->row_array()["nilai"];
								}
								else {
									$d_perkiraan = $h_perkiraan;
								}

								$array_perkiraan[] = $d_perkiraan;

			                    //rumus error
								$error = $row["nilai"]-$d_perkiraan;


			                    //rumus absolute error
								$abs_err = abs($error);
								$sum_abs_err = $sum_abs_err+$abs_err;

			                    //rumus absolute error %
								$abs_err_percent = abs((($row["nilai"]-$d_perkiraan)/$row["nilai"])*100);
								$sum_abs_err_percent = $sum_abs_err_percent+$abs_err_percent;

                                //rumus MAPE
								$mape = $sum_abs_err_percent/$count;

								echo "<tr>";
								echo "<td>{$row['bulan']}</td>
								<td>".number_format($row['nilai'],3)."</td>
								<td>".number_format($d_perkiraan,3)."</td>
								<td>".number_format($error,3)."</td>
								<td>".number_format($abs_err,3)."</td>
								<td>".number_format($abs_err_percent,3)."%</td>
                                <td>".number_format($mape,3)."</td>";
								echo "</tr>";

			                    //rumus single exponential smoothing
								$h_perkiraan = $d_perkiraan+0.5*($row["nilai"]-$d_perkiraan);

			                    //jika data sudah ditampilkan semua, lakukan peramalan untuk bulan berikutnya
								$loop = $loop+1;
								if ($loop == $count) {
									echo "</table></div>";
									$d_aktual_next = $row["nilai"];
									$d_perkiraan_next = $d_perkiraan;
									$d_ft = $d_perkiraan_next+0.5*($d_aktual_next-$d_perkiraan_next);

				                    //rumus MAPE
									$rata_abs_error_percent = $sum_abs_err_percent/$count;

									?>
								</div>
								<h5 class="alert alert-info"><b>Perkiraan untuk bulan berikutnya adalah <?php echo number_format($d_ft,3);?><b></h4>
								<?php
							}

						}
						?>

                        <h2 class="h3 mb-4 text-gray-800">Grafik Peramalan Bulan Berikutnya</h2>
						<!-- Grafik -->
						<div class="t">
							<canvas id="speedChart"></canvas>
						</div>
						<script>
							var speedCanvas = document.getElementById("speedChart");

							Chart.defaults.global.defaultFontFamily = "Times New Roman";
							Chart.defaults.global.defaultFontSize = 15;

							var dataFirst = {
								label: "Aktual",
								data: [<?php
									$resultquery = $this->db->query("SELECT nilai FROM pendapatan");

									foreach($resultquery->result_array() as $data_aktual){
										echo "".$data_aktual['nilai'].", ";
									}
									?>],

									lineTension: 0.3,
									fill: false,
									borderColor: '#FFD662',
									backgroundColor: '#FFD662',
									pointBorderColor: '#FFD662',
									pointBackgroundColor: '#FFD662',
									pointRadius: 5,
									pointHoverRadius: 15,
									pointHitRadius: 30,
									pointBorderWidth: 2,
									pointStyle: 'rect'
								};

								var dataSecond = {
									label: "Perkiraan",
									data: [<?php
										foreach ($array_perkiraan as $arper) {
											echo "".$arper.", ";
										}
										echo "".$d_ft."";
										?>],

										lineTension: 0.3,
										fill: false,
										borderColor: '#007bff',
										backgroundColor: '#007bff',
										pointBorderColor: '#007bff',
										pointBackgroundColor: '#007bff',
										pointRadius: 5,
										pointHoverRadius: 15,
										pointHitRadius: 30,
										pointBorderWidth: 2
									};

									var speedData = {
										labels: [<?php
											$querybulan = $this->db->query("SELECT bulan FROM pendapatan");

											foreach($querybulan->result_array() as $data_bulan) {
												echo "\"$data_bulan[bulan]\", ";
											}
											echo "\"Bulan berikutnya\"";
											?>],
						                    //labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
						datasets: [dataFirst, dataSecond]
					};

					var chartOptions = {
						legend: {
							display: true,
							position: 'top',
							labels: {
								boxWidth: 80,
								fontColor: 'black'
							}
						}
					};

					var lineChart = new Chart(speedCanvas, {
						type: 'line',
						data: speedData,
						options: chartOptions
					});

				</script>

			</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="ModalPendapatan" tabindex="-1" aria-labelledby="ModalPendapatanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalSektorLabel">Tambah Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(
                    'Admin/Admin/insert'
                ) ?>" method="POST">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control" required="required">
                          <option value="">-Pilih-</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">Februari</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pendapatan</label>
                        <input type="number" class="form-control" id="nilai" placeholder="Rp" name="nilai">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>