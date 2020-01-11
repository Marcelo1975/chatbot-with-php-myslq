<?php
include "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 'on');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

	<title></title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	
	<span id="ref">
		<div class="square">
			<center><h2>Chat Messages</h2></center>
			<br/>
	
			<?php
			$query = "SELECT * FROM chats ORDER BY datemsg DESC";
			$res = mysqli_query($conn, $query);
			while ($data = mysqli_fetch_array($res)) {
				$user = $data['user']; 
				$chatbot = $data['chatbot'];
				$datemsg = $data['datemsg'];
			?>

			<div class="container1" style="margin-right: 400px;">
				<img src="user.png" alt="Avatar" style="width: 100%;">
				<p><?php echo $user; ?></p>
				<span class="time-right"><?php echo date('d/m/Y H:i:s', strtotime($datemsg)); ?></span>
			</div>
			
			<div class="container1 darker" style="margin-left: 400px;">
				<img src="support.png" alt="Avatar" class="right" style="width: 100%;">
				<p style="float: right;"><?php echo $chatbot; ?></p>
				<span class="time-left"><?php echo date('d/m/Y H:i:s', strtotime($datemsg)); ?></span>
			</div>

		<?php }; ?>

			<div class="sticky">
				<div class="row">
					<div class="col-md-12">
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="msg" />
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" onclick="send()">Send</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</span>
	<br/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>
		function send() 
		{
			var text = $('#msg').val();
			console.log(text);

			$.ajax({
				type:"POST",
				url:"result.php",
				data:{text:text},
				success:function(data)
				{
					$("#ref").load(" #ref");
				}
			});
		}
	</script>
	
</body>
</html>












