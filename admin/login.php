<!DOCTYPE html>
<html lang="en">
  <?php
  require('../head.php');
  ?>
  <body>
  	<!-- body code goes here -->
	<?php
	if($_SESSION['logged']) header('location: index.php');  
	require('navbar.php');
	//Form validation
	if(isset($_POST['ok'])){
		// Did user really put text in textboxes?
		if(isset($_POST['name']) && isset($_POST['password'])){
			//Check if password is correct
			if($_POST['password'] == $system->adminpass){
				//Is this hairdresser exists?
				$query = $system->pdo->prepare("SELECT * FROM `hairdressers` WHERE `name` = ?");
				$query->execute(array($_POST['name']));
				if($query->rowCount() > 0){
					$_SESSION['logged'] = true;
					header('location: index.php');
				}else $error = 2;
			}else $error = 1;
		}
	}
	?>
	<div class="container-fluid">
		<?php
		if(isset($error)){
			if($error > 0){
				switch($error){
					case 1:
						echo "<div class='alert alert-danger'>
							<strong>Klaida!</strong> Slaptažodis neteisingas
						</div>";
						break;
					case 2: 
						echo "<div class='alert alert-danger'>
							<strong>Klaida!</strong> Vartotojas ".$_POST['name']." neegzistuoja
						</div>";
						break;
				}
			}
		}
		?>
		<div class="card">
            <div class="card-body">
            	<h4 class="card-title">Prisijungimas</h4>
                <form method="POST">
					<div class="form-group">
						<label for="name">Kirpėjos vardas</label>
						<input class="form-control" id="name" type="text" name="name" required>
					</div>
					<div class="form-group">
						<label for="password">Slaptažodis</label>
						<input class="form-control" id="password" type="password" name="password" required>
					</div>
					<button type="submit" name="ok" class="btn btn-primary">Prisijungti</button>
				</form>
            </div>
		</div> 
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="../js/jquery-3.2.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.0.0.js"></script>
  </body>
</html>