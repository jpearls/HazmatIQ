<?php

include 'dosearch.php'; 

$searchBox = '
	<div class="menu_option">
		<form action="search.php" method="get">
				<input type="text" name="q" placeholder="Name, Formula, or UN Number" value="' . $query . '" data-type="search" data-clear-btn="true" />	
				<!-- input type="submit" value="Search" data-icon="search" -->
		</form>
	</div><br /><br />
';

?>

<!DOCTYPE HTML>
<html>
<head> 
	<title>HazmatIQ Guru</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="jm121/jquery.mobile-1.2.1.css" />
	<script src="jm121/jquery-1.8.3.min.js"></script>
	<script src="jm121/jquery.mobile-1.2.1.min.js"></script>
</head> 
<body> 

<div data-role="page" id="home" data-theme="a">

	<div data-role="header">
		<a href="javascript:void(0);" class="ui-btn-left ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-left ui-btn-up-a" data-rel="back" data-icon="arrow-l" data-theme="a" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Back</span><span class="ui-icon ui-icon-arrow-l ui-icon-shadow">&nbsp;</span></span></a>
		<a href="http://sv.federalresources.com/hazmatiq/" data-role="button" data-icon="home" class="ui-btn-right" data-rel="external">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div><?php include("hiq-logo.php"); ?><!-- /header -->

	<div data-role="content">
		<?php echo $searchBox; ?>

		<?php echo $display; ?>
		
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>