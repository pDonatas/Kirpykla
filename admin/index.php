<?php
require('../head.php');
?>
  <body>
	<?php
	if(!$_SESSION['logged']) header("location: login");
	require('navbar.php');
    ?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3>Paskutinės rezervacijos</h3>
				<table id="table_id" class="display">
					<thead>
						<tr>
							<th>Vardas</th>
							<th>Data</th>
							<th>Veiksmas</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = $system->pdo->query("SELECT * FROM `reservations`");
						foreach($query as $row){
							echo '
						<tr>
							<td>'.$row['client_name'].'</td>
							<td>'.date("Y-m-d H:i", $row['date']).'</td>
							<td>';
							if(date("d", $row['date']) >= date("d"))
							echo '<a href="admin/cancel.php?id='.$row['id'].'">Atšaukti</a>';
							echo '</td>
						</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
	<?php
	require('../foot.php');  
	?>
    <script>
		$(document).ready( function () {
			$('#table_id').DataTable();
		} );
    </script>
  </body>
</html>
