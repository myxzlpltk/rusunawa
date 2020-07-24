CREATE VIEW `view_tagihan` AS
	(
		SELECT
			`id_tagihan`,
			`nama_tagihan`,
			`status`,
			DATE_FORMAT(`tanggal_tenggat`, '%e %M %Y') AS `tanggal_tenggat`,
			CONCAT('Rp. ', REPLACE(FORMAT(`nominal`, 0), ',', '.')) AS `nominal`,
			`p`.`nama`,
			`p`.`id_user`,
		FROM `tagihan` `t`
		INNER JOIN `user` `u` 
			ON `t`.`id_user` = `u`.`id_user`
		INNER JOIN `pelanggan` `p` 
			ON `p`.`id_user` = `u`.`id_user`
	)


CREATE VIEW `view_pembayaran` AS
	(
		SELECT
		`id`,
		`id_tagihan`,
		CONCAT('Rp. ', REPLACE(FORMAT(`nominal_bayar`, 0), ',', '.')) AS `nominal_bayar`,
		DATE_FORMAT(`pertanggal`, '%e %M %Y') AS `pertanggal`,
		DATE_FORMAT(`tanggal`, '%e %M %Y %H:%i') AS `tanggal`
		FROM `pembayaran`
	)

CREATE VIEW `view_pelanggan` AS (
	SELECT 
		`id_user`,
		`nama`,
		`telepon`,
		(
			SELECT COUNT(*) AS `numrows` 
			FROM `tagihan` 
			WHERE `tagihan`.`id_user` = `pelanggan`.`id_user` AND `tagihan`.`status` = 'aktif'
		) AS `total_tagihan` 
	FROM `pelanggan`)

CREATE VIEW `view_petugas` AS (
	SELECT 
		`id_user`,
		`nama`,
		`telepon`,
		(
			SELECT COUNT(*) AS `numrows` 
			FROM `laporan` 
			WHERE `laporan`.`id_user` = `petugas`.`id_user`
		) AS `total_laporan` 
	FROM `petugas`)

CREATE VIEW `view_laporan` AS
	(
		SELECT
			`l`.`id_laporan`,
			`l`.`id_user`,
			`p`.`nama`,
			`j`.`nama` AS `jenis`,
			CONCAT((
				SELECT COUNT(*) AS `numrows` 
				FROM `detail_laporan` 
				WHERE `detail_laporan`.`id_laporan` = `l`.`id_laporan`
			), ' Berkas') AS `total_laporan`,
			DATE_FORMAT(`tanggal`, '%e %M %Y %H:%i:%s') AS `tanggal`,
			`l`.`isVerified`
		FROM `laporan` AS `l`
		INNER JOIN `user` AS `u` 
			ON `l`.`id_user` = `u`.`id_user`
		INNER JOIN `petugas` AS `p` 
			ON `p`.`id_user` = `u`.`id_user`
		INNER JOIN `jenis` AS `j` 
			ON `j`.`id_jenis` = `l`.`id_jenis`
	)