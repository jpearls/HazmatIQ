<?php

include 'lib/dbconnect.php';

$display = '';

if(!isset($_GET['id'])) {
	//echo 'Query!';
	$query = $_GET['q'];
	$query_esc = AddSlashes($query);
	$sql = "SELECT id, name FROM chemicals WHERE (name LIKE '%$query_esc%') OR (synonyms LIKE '%$query_esc%') OR (un_number LIKE '%$query_esc%') OR (formula LIKE '%$query_esc%')";
} else {
	//echo 'Id!';
	$id = $_GET['id'];
	$sql = 'SELECT * FROM chemicals WHERE id = "' . $id . '"';
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
	while ($row = mysql_fetch_array($result)) {
		$display .= '
			<tr>
				<td>
					<hr/><a href="search.php?id=' . $row['id'] . '"><span class="query_result">' . $row['name'] . '</span></a>
				</td>
			</tr>
		';
	}
} else {
	$row = mysql_fetch_array($result);

	$sql = 'SELECT * FROM chemicals WHERE name = "' . $row['name'] . '"';
	$result2 = mysql_query($sql, $connection) or die(mysql_error());
	
	while ($data = mysql_fetch_array($result2)) {
		$display = '
			
			<div><h1>' . $data['name'] . '</h1></div>
			<hr/>
            <div>
				<h6>Synonyms &amp; Trade Names</h6>
                ' . $data['synonyms'] . '
            </div>
			<hr/>
            <div>
				<h6>CAS No.</h6>
				' . $data['cas'] . '
			</div>
			<hr/>
            <div>
				<h6>RTECS No.</h6>
                ' . $data['rtecs'] . '
            </div>
			<!--
			<hr/>
            <div>
				<h6>DOT ID &amp; Guide</h6>
				DOT_ID
			</div>
			-->
			<hr/>
            <div>
				<h6>Formula</h6>
				' . $data['formula'] . '
            </div>
			<hr/>
            <div>
				<h6>Conversion</h6>
                ' . $data['conversion'] . '
            </div>
			<hr/>
            <div>
				<h6>IDLH</h6>
                ' . $data['idlh'] . '
            </div>
			<hr/>
			<div>
				<h5>Exposure Limits</h5>
				' . $data['exposure_limit'] . '
            </div>
			<hr/>
            <div>
				<h6>Measurement Methods</h6>
				' . $data['measurement_methods'] . '
			</div>
			<hr/>
            <div>
				<h6>Physical Description</h6>
                ' . $data['physical_description'] . '
            </div>
			<hr/>
            <div>
				<h6>MW:</h6> 
				' . $data['molecular_weight'] . '
			</div>
			<hr/>
			<div>
				<h6>BP:</h6> 
				' . $data['boiling_point'] . '
			</div>
			<hr/>
			<div>
				<h6>FRZ:</h6> 
				' . $data['freezing_point'] . '
			</div>
			<hr/>
			<div>
				<h6>Sol:</h6> 
				' . $data['solubility'] . '
			</div>
			<hr/>
			<div>
				<h6>VP:</h6> 
				' . $data['vapor_point'] . '
			</div>
			<hr/>
			<div>
				<h6>IP:</h6> 
				' . $data['ionization_potential'] . '
			</div>
			<hr/>
			<div>
				<h6>Sp.Gr:</h6> 
				' . $data['specific_gravity'] . '
			</div>
			<hr/>
			<div>
				<h6>Fl.P:</h6> 
				' . $data['flashpoint'] . '
			</div>
			<hr/>
			<div>
				UEL(200°F): 
				' . $data['uel'] . '
			</div>
			<hr/>
			<div>
				<h6>LEL:</h6> 
				' . $data['lel'] . '
			</div>
			<hr/>
			<div>
				<h6>Class</h6>
				' . $data['class'] . '
			</div>
			<hr/>
			<div>
				<h6>Incompatibilities &amp; Reactivities</h6>
                ' . $data['reactivity'] . '
			</div>
			<hr/>
			<div>
				<h6>Exposure Routes</h6>
                ' . $data['exposure_routes'] . '
			</div>
			<hr/>
			<div>
				<h6>Symptoms</h6>
                ' . $data['symptoms'] . '
			</div>
			<hr/>
			<div>
				<h6>Target Organs</h6>
                ' . $data['target_organs'] . '
			</div>
			<hr/>
			<div>
				<h6>Personal Protection/Sanitation</h6>
                ' . $data['personal_protection'] . '
			</div>
			<hr/>
			<div>
				<h6>First Aid</h6>
				' . $data['first_aid'] . '
			</div>
			<hr/>
			<div>
				<h6>Respirator Recommendations</h6>
				' . $data['respirator'] . '	
			</div>
		';
	}
}

?>