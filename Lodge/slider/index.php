<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	
	<link href="css/styles.css" type="text/css" media="all" rel="stylesheet" />

	<!-- Skitter Styles -->
	<link href="css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
	
	<!-- Skitter JS -->
	<script type="text/javascript" language="javascript" src="js/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>
	
	<!-- Init Skitter -->
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'clean',
				numbers_align: 'center',
				progressbar: true, 
				dots: true, 
				preview: true
			});
		});
	</script>
</head>
<body>

		<div id="content">
			<div class="border_box">
				<div class="box_skitter box_skitter_large">
					<ul>
						<li><a href="#cube"><img src="images/example/001.jpg" class="cube" /></a><div class="label_text"><p>cube</p></div></li>
						<li><a href="#cubeRandom"><img src="images/example/002.jpg" class="cubeRandom" /></a><div class="label_text"><p>cubeRandom</p></div></li>
						<li><a href="#block"><img src="images/example/003.jpg" class="block" /></a><div class="label_text"><p>block</p></div></li>
						<li><a href="#cubeStop"><img src="images/example/004.jpg" class="cubeStop" /></a><div class="label_text"><p>cubeStop</p></div></li>	
					</ul>
				</div>
			</div>
		</div>

</body>
</html>