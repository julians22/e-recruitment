<!-- start page -->
<div class="container">
	<h4><strong>Form E-Recruitment</strong></h4>
	<div class="row">
		<div class="column column-50 float-right">
			<form action="<?= base_url('index.php/home/insert'); ?>" method="post">
				<fieldset>
					<label for="nama">Nama Lengkap</label>
					<input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap Calon Karyawan">
					<label for="email">Alamat Email</label>
					<input type="text" name="email" id="email" placeholder="Masukkan Email Calon Karyawan">
					<label for="posisi">Posisi Yang Dilamar</label>
					<input type="text" name="posisi" id="posisi" placeholder="Masukkan Posisi Yang Dilamar Oleh Calon Karyawan">
					<label for="no">Nomor Telepon</label>
					<input type="number" name="no" id="no">
					<label for="datepicker">Tanggal Hadir</label>
					<input type="text" name="tanggal" id="datepicker" autocomplete="off">
				</fieldset>
				<input class="button button-blue" type="submit" value="Kirim">
				<input class="button button-red" type="reset" value="Reset">
			</form>
		</div>
	</div>
	<table>
		<tr>
			<th>Nama Calon</th>
			<th>Email</th>
			<th>No Telpon</th>
			<th>Posisi yang dilamar</th>
			<th>Tanggal Hadir</th>
		</tr>
		<?php foreach ($calon as $c) : ?>
			<tr>
				<td><?= $c['nama_lengkap']; ?></td>
				<td><?= $c['email']; ?></td>
				<td><?= $c['telepon']; ?></td>
				<td><?= $c['posisi']; ?></td>
				<td><?= formatHariTanggalView($c); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
