CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `nim` int(8) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `smt` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
);