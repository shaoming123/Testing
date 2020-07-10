<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>blogger</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<link rel="stylesheet" href="blog.css">

</head>

<body onload="startTime()" data-spy="scroll" data-target="#navbarResponsive">
	<header > 
		<div style="float: right; font-size: 50px; border: 1px solid black;
		margin: 10px 50px;" id="txt"></div>
	</header>

	<br><br><br>
<div id="clients" class="offset">
	<div class="container text-center">
			<div class="row">
				<div class="col-md-4">
					 
           
           <div id="uploaded_image">  
				</div>
			</div>
				<div class="col-md-8">
					
					<h3></h3>
						
					<p>Because oil is priced in dollars the surge in oil prices for the past few years has been offset by the strong euro which traded as high as $1.33 at one point in the cycle</p>
				</div>
		
	
				</div>
	
	


</div>
		

</body>
<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--- End of Script Source Files -->

</body>
</html>

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}




 </script>  
</script>