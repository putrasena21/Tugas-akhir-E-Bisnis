<?php include 'header.php'; ?>
<?php
$sql_berita = "SELECT berita.gambar FROM berita WHERE berita.id_berita='$_GET[id]'";

$qry_berita = $koneksi->query($sql_berita) or die ($koneksi->error);

$num = $qry_berita->num_rows;

$data = $qry_berita->fetch_assoc();
?>
<div class="container-fluid body">
	<div class="row">
		<div class="col-lg-2 sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="col-lg-10 main-content">
			<div class="panel panel-default">
				<div class="panel-body">
<?php
if ($num==0) {
	header('location:berita-data.php');
} else {
	$del_sql = "DELETE FROM berita WHERE berita.id_berita='$_GET[id]'";

	$del_qry = $koneksi->query($del_sql);

	if ($del_qry) {
		unlink('../images/'.$data['gambar']);
		echo "<meta http-equiv='refresh' content='0;url=berita-data.php'>";
		echo "<h3 class='page-header'><i class='fa fa-refresh fa-spin'></i> Data berhasil dihapus</h3>";
	} else {
		echo $koneksi->error;
	}
}?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>