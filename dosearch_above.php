<?php

include 'lib/dbconnect.php';

$display = '';

if(!isset($_GET['id'])) {
	//echo 'Query!';
	$sql = "SELECT id, number, name FROM above ORDER BY number";
} else {
	//echo 'Id!';
	$id = $_GET['id'];
	$sql = 'SELECT * FROM above WHERE id = "' . $id . '"';
	$query = "";
}

$result = mysql_query($sql, $connection) or die(mysql_error());
$num_results = mysql_num_rows($result);
//echo $num_results;  //For Troubleshooting results

if($num_results == 0) {
		$display .= '
			<tr>
				<td>
					<span class="query_result">NO RESULTS</span>
				</td>
			</tr>
		';
} else if($num_results > 1) {

	$display = '
		<div style="width:100%;text-align:center;"><h1>Choose the second name of the chemical listed below.</h1></div>
		
		<ul data-role="listview" data-inset="true">
	';
	
	while ($row = mysql_fetch_array($result)) {
		$display .= '
			<li><a href="above.php?t=above&id=' . $row['id'] . '">Red ' . $row['number'] . '. ' . $row['name'] . '</a></li>
		';
	}
	
	$display .= '</ul>';
	
} else {

	while ($data = mysql_fetch_array($result)) {
	
		$hazards = $data['hazards'];
		$hazards = preg_replace('/WW/', '<img src="images/hmiq_w.png" style="margin-bottom:-4px;height:22px;width:22px;">', $hazards, 1);
		$hazards = preg_replace('/AA/', '<img src="images/hmiq_a.png" style="margin-bottom:-4px;height:22px;width:22px;">', $hazards, 1);
		$hazards = preg_replace('/PP/', '<span style="color:red;">P</span>', $hazards, 1);
		
		$corrosive = $data['corrosive'];
		$corrosive = preg_replace('/Y/', '<span style="color:yellow;">X</span>', $corrosive);
		$corrosive = preg_replace('/B/', '<span style="color:blue;">X</span>', $corrosive);
		$corrosive = preg_replace('/R/', '<span style="color:red;">X</span>', $corrosive);
		
		$kiss = $data['kiss'];
		$kiss = preg_replace('/B/', '<span style="color:blue;">X</span>', $kiss);
		
		$lel_a = $data['lel_a'];
		$lel_a = preg_replace('/Y/', '<span style="color:yellow;">X</span>', $lel_a);
		$lel_a = preg_replace('/B/', '<span style="color:blue;">X</span>', $lel_a);
		$lel_a = preg_replace('/R/', '<span style="color:red;">X</span>', $lel_a);

		$lel_b = $data['lel_b'];
		$lel_b = preg_replace('/Y/', '<span style="color:yellow;">X</span>', $lel_b);
		$lel_b = preg_replace('/B/', '<span style="color:blue;">X</span>', $lel_b);
		$lel_b = preg_replace('/R/', '<span style="color:red;">X</span>', $lel_b);

		$display = '
			<div style="width:100%; text-align:center;">
				<span style="color:#F00;font-size:32px;font-weight:bold;">Red ' . $data['number'] . '. ' . $data['name'] . '</span>		
			</div>
			
			<div style="width:100%; text-align:center; margin:10px; font-weight:bold; font-size: 22px;">
				' . $hazards . '
			</div>
			
			<div style="width:100%;">
				<table style="width:300px; border:1px solid red;margin:auto;background-color:#E6937C;" border="1"> <!-- background-color:#E6937C; -->
					<tr>
						<th colspan="4">Red Lights&trade;</th>
					</tr>
					<tr>
						<th><span style="font-size:12px;">Gamma 2xBG</span></th>
						<th><span style="font-size:12px;">Gas <span style="color:yellow;">X</span><span style="color:blue;">X</span><span style="color:red;">X</span></span></th>
						<th><span style="font-size:12px;">Increase Temp</span></th>
						<th><span style="font-size:12px;">10% T.O. <br/> 1% Plastic</span></th>
					</tr>
					<tr>
						<th>Rad <br/> <span style="font-size:12px;">radiation</span></th>
						<th><span style="font-size:12px;line-height:12px;">wet &bull; dry <br/> F &bull; pH <br/> corrosive</span></th>
						<th>TempGun <br/> <span style="font-size:12px;">reaction</span></th>
						<th>CGI <br/> <span style="font-size:12px;">LEL/O<sub>2</sub></span></th>
					</tr>
					<tr>
						<th>' . $data['radioactive'] . '</th>
						<th>' . $corrosive . '</th>
						<th>' . $data['tempgun'] . '</th>
						<th>' . $data['cgi'] . '</th>
					</tr>
				</table>
			</div>
			<br/>
			<div style="width:100%;">
				<table style="width:300px; border:1px solid green;margin:auto;background-color:#94C789;" border="1">  <!-- background-color:#94C789; -->
					<tr>
						<th colspan="4">No Red Lights&trade;</th>
					</tr>
					<tr>
						<th colspan="4">Toxic Meters</th>
					</tr>
					<tr>
						<th>PID <br/> <span style="font-size:12px;">&le; 10.6 eV</span></th>
						<th>FID <br/> <span style="font-size:12px;">CHar</span></th>
						<th>Freons <br/> <span style="font-size:12px;">(F, Cl, Br, I)</span></th>
						<th>Tube/Chip</th>
					</tr>
					<tr>
						<th>' . $data['pid'] . '</th>
						<th>' . $data['fid'] . '</th>
						<th>' . $data['freons'] . '</th>
						<th>' . $data['tube_chip'] . ' <br/> ' . $data['tube_chip_notes'] . '</th>
					</tr>
				</table>
			</div>
			<br/>
			<div style="width:100%;">
				<table style="width:300px; border:1px solid red;margin:auto;background-color:#E6937C;" border="1">  <!-- background-color:#E6937C; -->
					<tr>
						<th>KIss&trade; Explosive</th>
					</tr>
					<tr>
						<th>' . $kiss . ' <br/> ' . $data['kiss_notes'] . '</th>
					</tr>
				</table>
			</div>
			<br/>
			<div style="width:100%;">
				<table style="width:300px; border:1px solid black;margin:auto;background-color:#EEEEEE;" border="1">
					<tr>
						<th colspan="4">F &bull; LEL Reading</th>
					</tr>
					<tr>
						<th><span style="color:yellow;">x</span>10%</th>
						<th>1%</th>
						<th><span style="color:yellow;">x</span>1%</th>
						<th><span style="color:yellow;">x</span>1%</th>
					</tr>
					<tr>
						<th><span style="font-size:12px;">Turn out w/</span><br/>SCBA</th>
						<th>A <br/><br/></th>
						<th>B <br/> <span style="font-size:12px;">MTS</span></th>
						<th>C <br/> <span style="font-size:12px;">MOPP</span></th>
					</tr>
					<tr>
						<th>' . $data['lel_scba'] . ' <br/> ' . $data['lel_scba_notes'] . '</th>
						<th>' . $lel_a . ' <br/> ' . $data['lel_a_notes'] . '</th>
						<th>' . $lel_b . ' <br/> ' . $data['lel_b_notes'] . '</th>
						<th>' . $data['lel_c'] . ' ' . $data['lel_c_notes'] . '</th>
					</tr>
				</table>
			</div>
		';
	}
}

?>