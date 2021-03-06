<?php

$searchBox = '
	<div class="menu_option">
		<form action="search.php" method="get">
				<input type="text" name="q" placeholder="Chemical Name, Formula, or UN Number" value="" data-type="search" data-clear-btn="true" />	
				<!-- input type="submit" value="Search" data-icon="search" -->
		</form>
	</div>
';

?>

<!DOCTYPE html> 
<html> 
<head>
	<title>HazmatIQ Guru</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="jm121/jquery.mobile-1.2.1.css" />    -->
	<link rel="stylesheet" href="jm121/jquery.mobile-1.2.1-fr.css" />
	<script src="jm121/jquery-1.8.3.min.js"></script>
	<script src="jm121/jquery.mobile-1.2.1.min.js"></script>
	
	<script>
		function resetSelect() { $('#elements').val(1);  $('#elements').selectmenu('refresh'); }
	</script>
	
	<style>
		td { text-align:center; }
		.arrow { font-size:30px;font-weight:bold;line-height:10px; }
		.w { margin-bottom:-2px;height:15px;width:15px; }
	</style>
</head>
<body>

<div data-role="page" id="home" data-theme="a">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div><?php include("hiq-logo.php"); ?><!-- /header -->

	<div data-role="content">
		<?php echo $searchBox; ?>
		
		<ul data-role="listview" data-inset="true">
			<li><a href="#start">Select to Start</a></li>
		</ul>
		
		<ul data-role="listview" data-inset="true">
			<li><a href="#charts">Select to view Charts</a></li>
		</ul>
	</div><!-- /content -->

</div><!-- /page -->


<div data-role="page" id="start" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right" onclick="resetSelect();">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div>

	<div data-role="content">
		<div style="width:100%;text-align:center;"><h1>Is first name of the chemical listed below?</h1></div>
		
		<div style="width:100%;text-align:center;">^^^</div>
		
		<div style="width:100%;height:290px;font-size:28px;overflow:scroll;text-align:center;background-image:url('images/background.png');background-size:100% 100%;" id="elements">
			<div>Aluminum <span style="color:red;">P</span></div>
			<div>Antimony</div>
			<div>Barium</div>
			<div>Beryllium</div>
			<div>Bismuth</div>
			<div>Calcium</div>
			<div>Cesium</div>
			<div>Chromium</div>
			<div>Cobalt</div>
			<div>Copper</div>
			<div>Germanium</div>
			<div>Hafnium</div>
			<div>Iron</div>
			<div>Lead</div>
			<div>Lithium</div>
			<div>Magnesium</div>
			<div>Manganese</div>
			<div>Mercury</div>
			<div>Molybdenum</div>
			<div>Nickel</div>
			<div>Osmium</div>
			<div>Potassium</div>
			<div>Radium</div>
			<div>Rhodium</div>
			<div>Rubidium</div>
			<div>Silver</div>
			<div>Sodium</div>
			<div>Strontium</div>
			<div>Tantalum</div>
			<div>Thallium</div>
			<div>Tin</div>
			<div>Titanium</div>
			<div>Tungsten</div>
			<div>Uranium</div>
			<div>Vanadium</div>
			<div>Yttrium</div>
			<div>Zinc</div>
			<div>Zirconium</div>
		</div>
		
		<div style="width:100%;text-align:center;">\/\/\/</div>
		
		<ul data-role="listview" data-inset="true">
			<li onclick="resetSelect();"><a href="#belowTheLine">Yes</a></li>
			<li onclick="resetSelect();"><a href="#aboveTheLine">No</a></li>
		</ul>
		
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="belowTheLine" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div>

	<div data-role="content">
		<div style="font-weight:bold; color:#0A90CF; font-size:32px; width:100%; text-align:center;">Below The Line SOP</div>
		<div style="width:100%; font-weight:bold;">
			<div style="font-style:italic; width:100%; text-align:center;">Dispatched &bull; 10 Second Size-Up</div>
			<div style="font-style:italic; width:100%; text-align:center;">Turnout/SCBA &bull; MOPP &bull; Level B &bull; Multi-Threat</div>
			<div style="width:400px; margin:auto;">
				<ul>
					<li>Solid - initial Hotzone 75'</li>
					<li>Dust heavier than air</li>
					<li>NO LEL-UEL <span class="arrow">&#8594;</span> CGI</li>
					<li>NO Flashpoint <span class="arrow">&#8594;</span> TempGun</li>
					<li>NO Flammable &bull; No CH <span class="arrow">&#8594;</span> FID</li>
					<li>NO Polymerize <span class="arrow">&#8594;</span> TempGun</li>
					<li>NO Ionizing Potential <span class="arrow">&#8594;</span> PID/FID</li>
					<li>YES Base & Fluorine <span class="arrow">&#8594;</span> pH X F X</li>
					<li>YES Radioactive <span class="arrow">&#8594;</span> Rad Meter</li>
					<li>YES Toxic - mg/m3 <span class="arrow">&#8594;</span> Dust Meter</li>
					<li>YES Water & Air Reactive <span class="arrow">&#8594;</span> TempGun</li>
					<li>YES FTIR & Raman</li>
				</ul>
			</div>

			<ul data-role="listview" data-inset="true">
				<li><a href="above.php?t=below">Continue...</a></li>
			</ul>
			
		</div>
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="aboveTheLine" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div>

	<div data-role="content">
		<div style="font-weight:bold; color:#EB1C23; font-size:32px; width:100%; text-align:center;">Above The Line SOP</div>
		<div style="width:100%; font-weight:bold;">
			<div style="font-style:italic; width:100%; text-align:center;">Dispatched &bull; 10 Second Size-Up</div>
			<div style="font-style:italic; width:100%; text-align:center;">Turnout/SCBA &bull; MOPP &bull; Level B &bull; Multi-Threat</div>
			<div style="width:400px; margin:auto;">
				<ul>
					<li>Solid - initial Hotzone 300'</li>
					<li>Vapors heavier than air</li>
					<li>YES LEL-UEL <span class="arrow">&#8594;</span> CGI</li>
					<li>YES Flashpoint <span class="arrow">&#8594;</span> TempGun</li>
					<li>YES Flammable &bull; No CH <span class="arrow">&#8594;</span> FID</li>
					<li>YES Polymerize <span class="arrow">&#8594;</span> TempGun</li>
					<li>YES Ionizing Potential <span class="arrow">&#8594;</span> PID/FID</li>
					<li>YES Base & Fluorine <span class="arrow">&#8594;</span> pH X F X</li>
					<li>YES Radioactive <span class="arrow">&#8594;</span> Rad Meter</li>
					<li>YES Toxic - Toxic-PPM <span class="arrow">&#8594;</span> PID/FID 3-30 Rule</li>
					<li>YES Water & Air Reactive <span class="arrow">&#8594;</span> TempGun</li>
					<li>YES FTIR & Raman</li>
				</ul>
			</div>
			
			<ul data-role="listview" data-inset="true">
				<li><a href="#aboveTheLine2">Continue...</a></li>
			</ul>
		</div>
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="aboveTheLine2" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div>

	<div data-role="content">
		<div style="font-weight:bold; color:#EB1C23; font-size:32px; width:100%; text-align:center;">Above The Line SOP</div>
		<div style="width:100%; font-weight:bold;">
		<div style="font-style:italic; width:100%; text-align:center;">Dispatched &bull; 10 Second Size-Up</div>
		<div style="font-style:italic; width:100%; text-align:center;">Turnout/SCBA &bull; MOOP &bull; Level B &bull; Multi-Threat</div>
		<!-- <div style="width:100%;text-align:center;"><span style="color:red;">P = Polymerize</span></div> -->
	
		<div style="width:100%;text-align:center;"><h1>Is any part of the name listed below?</h1></div>
		<div style="width:100%;text-align:center;color:red;">Flammable (CHar) Name Clues <br/> (P = Polymerize)</div>
		<br/>
		<table style="width:100%;">
			<tr>
				<td>Acet</td>
				<td>Dec</td>
				<td>Hex</td>
				
			</tr>
			<tr>
				<td>Pent</td>
				<td>Acr(yl) <span style="color:red;">P</span></td>
				<td>Eth</td>
				
			</tr>
			<tr>
				<td>Iso</td>
				<td>Phen</td>
				<td>Allyl <span style="color:red;">P</span></td>
			</tr>
			<tr>
				<td>Form</td>
				<td>Meth</td>
				<td>Prop</td>
			</tr>
			<tr>
				<td>Benz</td>
				<td>Fur</td>
				<td>Napht</td>
				
			</tr>
			<tr>
				<td>Vinyl <span style="color:red;">P</span></td>
				<td>But</td>
				<td>Gly</td>
			</tr>
			<tr>
				<td>Non</td>
				<td>Cyclo</td>
				<td>Hept</td>
			</tr>
			<tr>
				<td>Oct</td>
				<td>Benzene</td>
				<td>Toluene</td>
			</tr>
			<tr>
				<td>Xylene</td>
				<td>Styrene <span style="color:red;">P</span></td>
				<td>Cumene <br/> <span style="font-size:10px;">(Forms Peroxides)</span></td>
			</tr>
		</table>
			
		<ul data-role="listview" data-inset="true">
			<li><a href="above.php?t=above">Yes</a></li>
			<li><a href="#aboveTheLine3">No</a></li>
		</ul>
		
		</div>
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="aboveTheLine3" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>HazmatIQ Guru</h1>
	</div>

	<div data-role="content">
		<div style="font-weight:bold; color:#EB1C23; font-size:32px; width:100%; text-align:center;">First Name Corrosive Gas Clues</div>
		
		<div style="width:100%;text-align:center;"><h1>Is first name of the chemical listed below?</h1></div>
		<div style="width:100%; font-weight:bold;">
		
			<table style="width:100%;">
				<tr>
					<td colspan="4">DOT ERG Guide - <span style="color:#0A90CF;">118</span>, <span style="color:#EB1C23;">123</span>, <span style="color:#EB1C23;">124</span>, <span style="color:#EB1C23;">125</span></td>
				</tr>
				<tr>
					<td><span style="color:#0A90CF;">Ammonia</span></td>
					<td>Chlorine</td>
					<td>Nitrogen</td>
					<td>Sulfur</td>
				</tr>
				<tr>
					<td>Boron</td>
					<td>Cyanogen</td>
					<td>Nitrosyl</td>
					<td>Sulfuryl</td>
				</tr>
				<tr>
					<td>Bromine</td>
					<td><span style="color:yellow;">Fluorine</span></td>
					<td>Oxygen</td>
					<td>Selenium</td>
				</tr>
				<tr>
					<td>Carbonyl</td>
					<td>Hexafluoroacetone</td>
					<td>Perchloryl</td>
					<td>Silicone</td>
				</tr>
				<tr>
					<td>Dinitrogen</td>
					<td>Hydrogen</td>
					<td>Phosgene</td>
					<td>Tellerium</td>
				</tr>
				<tr>
					<td>Diphosgene</td>
					<td>Nitric</td>
					<td>Phosphorus</td>
					<td>Trifluoroacetyl</td>
				</tr>		
			</table>

			
			<ul data-role="listview" data-inset="true">
				<li><a href="above.php?t=above&id=2">Yes</a></li>
				<li><a href="above.php?t=above&id=3">No</a></li>
			</ul>
		</div>
	</div><!-- /content -->
</div><!-- /page -->

<div data-role="page" id="unknowns" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>Unknowns</h1>
	</div>

	<div data-role="content">
		<?php echo $searchBox; ?>
		
		<div style="font-weight:bold;">STANDARD OPERATING GUIDELINES FOR UKNOWN CHEMICALS (RED ONE)</div>
		<div>
			<p>Initial Isolation Zone 300 Feet</p>
			<p>Wear your turnout gear with self-contained breathing apparatus (SCBA).</p>
			<p style="font-weight:bold; width:100%; text-align:center;">Proceed with Caution</p>
			<p>Use the Stay Alive Five (SAF) Instruments to measure hazards:</p>
			<ul>
				<li>Radiation readings should be less than 2x Background</li>
				<li>Check for Rapidly Rising Temperature (RRT) with a Temperature Gun</li>
				<li>Combustible Gas Indicator (CGI) readings should be less than 10% LEL</li>
				<li>F Paper should have no color change; a <span style="color:yellow;font-weight:bold; -webkit-text-fill-color: yellow; -webkit-text-stroke-width: thin; -webkit-text-stroke-color: black;">YELLOW</span> color change indicates the presence of Fluorine <span style="color:red;font-weight:bold;">NoGo</span></li>
				<li>pH Paper change in Air indicates a Corrosive Gas</li>
			</ul>
		</div>
	</div><!-- /content -->
</div><!-- /page -->


<div data-role="page" id="charts" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">		
		<ul data-role="listview" data-inset="true">
			<li><a href="#chart1">Chart 1</a></li>
			<li><a href="#chart2">Chart 2</a></li>
			<li><a href="#chart3">Chart 3</a></li>
			<li><a href="#chart4">Chart 4</a></li>
			<li><a href="#chart5">Chart 5</a></li>
			<li><a href="#chart6">Chart 6</a></li>
			<li><a href="#chart7">Chart 7</a></li>
		</ul>	
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart1" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart1.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart2" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart2.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart3" data-theme="a" data-add-back-btn="true">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home" class="ui-btn-right">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart3.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart4" data-theme="a">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart4.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart5" data-theme="a">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart5.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart6" data-theme="a">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">
		<div style="height:100%;width:100%;"><img src="images/charts/chart6.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

<div data-role="page" id="chart7" data-theme="a">

	<div data-role="header">
		<a href="#home" data-role="button" data-icon="home">Home</a>
		<h1>Charts</h1>
	</div>

	<div data-role="content">		
		<div style="height:100%;width:100%;"><img src="images/charts/chart7.png" style="height:100%;width:100%;" /></div>
	</div><!-- /content -->

</div><!-- /page -->

</body>
</html>