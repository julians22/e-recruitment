<?php 
	function formatHariTanggalEmail($tanggal_hadir)
	{
		$arrayHari = [
			"Minggu",
			"Senin",
			"Selasa",
			"Rabu",
			"Kamis",
			"Jum'at",
			"Sabtu"
		];

		$convertHari = date('w', strtotime($tanggal_hadir));
		$hari = $arrayHari[$convertHari];

		$tanggal = date('j', strtotime($tanggal_hadir));

		$arrayBulan = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		];

		$convertBulan = date('n', strtotime($tanggal_hadir));
		$bulan = $arrayBulan[$convertBulan];

		$tahun = date('Y', strtotime($tanggal_hadir));

		return "$hari, $tanggal/$bulan/$tahun";
	}

function formatHariTanggalView($c)
{
	$arrayHari = [
		"Minggu",
		"Senin",
		"Selasa",
		"Rabu",
		"Kamis",
		"Jum'at",
		"Sabtu"
	];

	$convertHari = date('w', strtotime($c['tanggal_hadir']));
	$hari = $arrayHari[$convertHari];

	$tanggal = date('j', strtotime($c['tanggal_hadir']));

	$arrayBulan = [
		1 => 'Januari',
		2 => 'Februari',
		3 => 'Maret',
		4 => 'April',
		5 => 'Mei',
		6 => 'Juni',
		7 => 'Juli',
		8 => 'Agustus',
		9 => 'September',
		10 => 'Oktober',
		11 => 'November',
		12 => 'Desember'
	];

	$convertBulan = date('n', strtotime($c['tanggal_hadir']));
	$bulan = $arrayBulan[$convertBulan];

	$tahun = date('Y', strtotime($c['tanggal_hadir']));

	return "$hari, $tanggal-$bulan-$tahun";
}

?>
