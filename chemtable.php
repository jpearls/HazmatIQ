<?php

include "lib/dbconnect.php";

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
					<hr/><a href="chemtable.php?id=' . $row['id'] . '"><span class="query_result">' . $row['name'] . '</span></a>
				</td>
			</tr>
		';
	}
} else {
	$row = mysql_fetch_array($result);

	$sql = 'SELECT * FROM chemicals WHERE name = "' . $row['name'] . '"';
	$result2 = mysql_query($sql, $connection) or die(mysql_error());
	
	while ($row2 = mysql_fetch_array($result2)) {
		$display = '
			  <tr class="bor-tb">
                <td colspan="6">
					<h1>' . $row2['name'] . '</h1>
				</td>
              </tr>
              <tr class="bgc">
                <td colspan="6">
				  <h6>Synonyms &amp; Trade Names</h6>
                  ' . $row2['synonyms'] . '
                </td>
              </tr>
              <tr class="bgc">
                <td colspan="2">
				  <h6>CAS No.</h6>
				  ' . $row2['cas'] . '
				</td>
                <td colspan="2">
				  <h6>RTECS No.</h6>
                  ' . $row2['rtecs'] . '
                </td>
                <td colspan="2">
				  <h6>DOT ID &amp; Guide</h6>
				  DOT_ID	
                </td>
              </tr>
              <tr class="bgc">
                <td colspan="2">
				  <h6>Formula</h6>
					' . $row2['formula'] . '
                </td>
                <td colspan="2">
				  <h6>Conversion</h6>
                  ' . $row2['conversion'] . '
                </td>
                <td colspan="2">
				  <h6>IDLH</h6>
                  ' . $row2['idlh'] . '
                </td>
              </tr>
			  <tr class="bor-tb">
                <td colspan="4">
				  <h5>Exposure Limits</h5>
				  ' . $row2['exposure_limit'] . '
                </td>
                <td colspan="2">
				  <h6>Measurement Methods</h6>
				  ' . $row2['measurement_methods'] . '
				</td>
              </tr>
              <tr class="bgc">
                <td colspan="6">
				  <h6>Physical Description</h6>
                  ' . $row2['physical_description'] . '
                </td>
              </tr>
              <tr class="bgc">
                <td>
					<h6>MW:</h6> 
					' . $row2['molecular_weight'] . '
                </td>
                <td>
					<h6>BP:</h6> 
					' . $row2['boiling_point'] . '
				</td>
                <td>
					<h6>FRZ:</h6> 
					' . $row2['freezing_point'] . '
				</td>
                <td>
					<h6>Sol:</h6> 
					' . $row2['solubility'] . '
				</td>
                <td>
					<h6>VP:</h6> 
					' . $row2['vapor_point'] . '
				</td>
                <td>
					<h6>IP:</h6> 
					' . $row2['ionization_potential'] . '
				</td>
              </tr>
              <tr class="bgc">
                <td>
				  <h6>Sp.Gr:</h6> 
				  ' . $row2['specific_gravity'] . '
				</td>
                <td>
				  <h6>Fl.P:</h6> 
				  ' . $row2['flashpoint'] . '
				</td>
                <td>
				  UEL(200°F): 
				  ' . $row2['uel'] . '
				</td>
                <td>
				  <h6>LEL:</h6> 
				  ' . $row2['lel'] . '
				</td>
                <td></td>
                <td></td>
              </tr>
              <tr class="bgc">
                <td colspan="6">
				  <h6>Class</h6>
				  ' . $row2['class'] . '
				</td>
              </tr>
              <tr class="bgc">
                <td colspan="6">
				  <h6>Incompatibilities &amp; Reactivities</h6>
                  ' . $row2['reactivity'] . '
              </tr>
              <tr class="bor-t">
                <td colspan="6">
				  <h6>Exposure Routes</h6>
                  ' . $row2['exposure_routes'] . '
                </td>
              </tr>
              <tr>
                <td colspan="6">
				  <h6>Symptoms</h6>
                  ' . $row2['symptoms'] . '
                </td>
              </tr>
              <tr class="bor-b">
                <td colspan="6">
				  <h6>Target Organs</h6>
                  ' . $row2['target_organs'] . '
                </td>
              </tr>
              <tr class="bgc">
                <td colspan="4">
				  <h6>Personal Protection/Sanitation</h6>
                  ' . $row2['personal_protection'] . '
                <td colspan="2">
				  <h6>First Aid</h6>
				  ' . $row2['first_aid'] . '
              </tr>
              <tr class="bgc">
                <td colspan="6">
				  <h6>Respirator Recommendations</h6>
				  ' . $row2['respirator'] . '	
				</td>
              </tr>
		';
	}
}

?>

	<?php include('header.php'); ?>
	
	<?php echo $display; ?>

	<?php include('footer.php'); ?>