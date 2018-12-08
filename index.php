<?php
	require_once "init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Spaghetti delivery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<section class="overlay">
<div class="overlay-content">Spaghetti. Love.</div>
<div id="order" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
	        <div class="modal-header">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title text-center">BUY SPAGHETTI</h4>
	        </div>
	        <div class="modal-body">
	          	<form class="form-horizontal" id="send-order">
					<div id="msg"></div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name<span class="require">*</span></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="name" />
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email<span class="require">*</span></label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="phone" id="phone"/>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address<span class="require">*</span></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="address" id="address" placeholder="Street number, postcode, city" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="spaghetti" class="col-sm-2 control-label">Spaghetti<span class="require">*</span></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="spg" id="spg" value=''/>
						</div>
					</div>
					<div class="form-group">
						<label for="payment" class="col-sm-2 control-label">Payment method<span class="require">*</span></label>
						<div class="col-sm-10">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									  <span class="input-group-addon">
										<input type="radio" name="payment" value="PayPal" required>
									  </span>
									  <input type="text" class="form-control" value="PayPal" disabled="disable">
									</div><!-- /input-group -->
								</div><!-- /.col-lg-12 -->	
								<div class="col-lg-12">
									<div class="input-group">
									  <span class="input-group-addon">
										<input type="radio" name="payment" value="cash" required>
									  </span>
									  <input type="text" class="form-control" value="Cash On Delivery" disabled="disable">
									</div><!-- /input-group -->
								</div><!-- /.col-lg-12 -->	
							</div>
						</div>
					</div>
					<div class="form-group">   
					    <div class="controls">
					    	<label for="message" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-10"> 
								<textarea rows="5" cols="100" name="message" class="form-control" id="message" style="resize:none" /></textarea>
							</div>
					    </div>
					 </div>
					 <div class="form-group">
					 	<button type="submit" class="btn btn-primary center-block" id="submit">
					 		SEND FORM
					 	</button>
					 </div>	
				</form>
	        </div>
        </div>
	</div>
</div>
			
<div class="col-md-6 col-md-offset-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="text-center">
				<span class="badge badge-pill v">v</span> vegetarian
				<span class="badge badge-pill s">s</span> special home-made
			</div>
		</div>
		<div class="panel-body">
			<?php 
			foreach($spag as $sp)
			{
				echo 
				"<div class='col-lg-4 col-md-6 col-sm-6'>
				 	<div class='thumbnail'>
					 	<div class='wrapper'>
				 			<img src='img/". $sp['img'] ."' width='100%' alt='". $sp['alt'] ."'/>
				 			<div class='text-over-img'>
				 				<p>". $sp['ingredients'] ."</p>
				 			</div>
				 		</div>
				 		<div class='spag-title'>". $sp['name'] ."
				 		<span class='badge badge-pill ". $sp['tag'] ."'>". $sp['tag'] ."</span></div>
				 		<div class='info text-center'>". $sp['ingredients'] ."</div>
				 		<div class='price'> €". $sp['price'] ."</div>
				 		<button value='". $sp['name'] ."' class='btn btn-success buy-btn' data-toggle='modal' data-target='#order'>BUY</button>
				 	</div>
			 	</div>";
			} 
			?>
		</div>
		<div class="panel-footer">
			<article>
				<p>This is a sample website from <a href="https://funnyreino.com" target="_blank">FunnyReino</a>. Photos used in this site are free-to-use resources from <a href="http://unsplash.com" target="_blank">unsplash</a> and <a href="http://stocksnap.io" target="_blank">stocksnap</a>.</p>
			</article>
		</div>
	</div>		
</div>
</body>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>
