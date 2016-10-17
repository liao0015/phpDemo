<?php
	
	echo "<h4>Submission Summary</h4>";

	/******************************parameters******************************/
	

	//parse variable modification check list array
	if(isset($_POST['vmchecklist'])){
		$qvmarray = $_POST['vmchecklist'];
		echo "<div>selected variable modification</div>";
		foreach($qvmarray as $qvmitem){
			echo "<ul><li>".$qvmitem."</li></ul>";
			$updatedvmarray[] = array('name'=>$qvmitem);
		}
	}else{
		echo "<p>No selection for variable modification</p><br/>";
		$updatedvmarray[] = array('name'=>" ");
	}

	//parse fixed modification check list array
	if(isset($_POST['fmchecklist'])){
		$qfmarray = $_POST['fmchecklist'];
		echo "<div>selected fixed modification</div>";
		foreach($qfmarray as $qfmitem){
			echo "<ul><li>".$qfmitem."</li></ul>";
			$updatedfmarray[] = array('name'=>$qfmitem);
		}
	}else{
		echo "<p>No selection for fixed modification</p><br/>";
		$updatedfmarray[] = array('name'=>" ");
	}

	//parse enzyme check list array
	if(isset($_POST['enzymechecklist'])){
		$qenzymearray = $_POST['enzymechecklist'];
		echo "<div>selected enzyme</div>";
		foreach($qenzymearray as $qenzymeitem){
			echo "<ul><li>".$qenzymeitem."</li></ul>";
			$updatedenzymearray[] = array('name'=>$qenzymeitem);
		}
	}else{
		echo "<p>No selection for enzyme treatment</p><br/>";
		$updatedenzymearray[] = array('name'=>" ");
	}

	//parse isotope label light check list array
	if(isset($_POST['isotopechecklistlight'])){
		$qisotopelightarray = $_POST['isotopechecklistlight'];
		echo "<div>selected isotope light lables</div>";
		foreach($qisotopelightarray as $qisotopelightitem){
			echo "<ul><li>".$qisotopelightitem."</li></ul>";
			$updatedisotopelightarray[] = array('name'=>$qisotopelightitem);
		}
	}else{
		echo "<p>No selection for isotope light lables</p><br/>";
		$updatedisotopelightarray[] = array('name'=>" ");
	}

	//parse isotope label medium check list array
	if(isset($_POST['isotopechecklistmedium'])){
		$qisotopemediumarray = $_POST['isotopechecklistmedium'];
		echo "<div>selected isotope medium lables</div>";
		foreach($qisotopemediumarray as $qisotopemediumitem){
			echo "<ul><li>".$qisotopemediumitem."</li></ul>";
			$updatedisotopemediumarray[] = array('name'=>$qisotopemediumitem);
		}
	}else{
		echo "<p>No selection for isotope medium labels</p><br/>";
		$updatedisotopemediumarray[] = array('name'=>" ");
	}

	//parse isotope label light check list array
	if(isset($_POST['isotopechecklistheavy'])){
		$qisotopeheavyarray = $_POST['isotopechecklistheavy'];
		echo "<div>selected isotope heavy lables</div>";
		foreach($qisotopeheavyarray as $qisotopeheavyitem){
			echo "<ul><li>".$qisotopeheavyitem."</li></ul>";
			$updatedisotopeheavyarray[] = array('name'=>$qisotopeheavyitem);
		}
	}else{
		echo "<p>No selection for isotope heavy lables<p></p><br/>";
		$updatedisotopeheavyarray[] = array('name'=>" ");
	}

	/**********************************************************************/
	/***************************database and raw files*********************/
	/**********************************************************************/

	/***********************select database files**************************/
	if(isset($_POST["databaseList"])){
		echo "You have selected to use the database: <br/>\n";
		echo $_POST["databaseList"]."<br/>\n";
		$database = "C:\\wamp64\\www\\Metalab_data\\fasta_database\\".$_POST["databaseList"];
	}else{
		echo "You didn't specify a database for analysis.<br/>\n";
	}
	
	/***********************select raw files**************************/
	// if(isset($_POST["existingRawFileList"])){
	// 	echo "You have selected the following raw files: <br/>\n";

	// 	for($i=0; $i<sizeof($_POST["existingRawFileList"]);$i++){
	// 		//echo "hello";
	// 		echo $_POST["existingRawFileList"][$i]."<br/>\n";
	// 		$rawFiles[$i]=array('path'=>"C:\\wamp64\\www\\Metalab_data\\raw_files\\".$_POST["existingRawFileList"][$i], 'experiment'=>"exp");
	// 	}
	// }else{
	// 	echo "You have to selected at least one raw file for analysis.<br/>\n";
	// }
	

	var_dump($_POST);

	/**********************************************************************/
	/****************************generate JSON******************************/
	/**********************************************************************/
	$results['vari mods'] = $updatedvmarray;
	$results['fix mods'] = $updatedfmarray;
	$results['enzyme'] = $updatedenzymearray;
	$results['light'] = $updatedisotopelightarray;
	$results['medium'] = $updatedisotopemediumarray;
	$results['heavy'] = $updatedisotopeheavyarray;
	
	$results['instrument resolution'] = "high_high";
	$results['build-in'] = "true";
	$results['unipept'] = "false";

	if(isset($database)&&isset($rawFiles)){
		$results['database'] = $database;
		$results['raw files'] = $rawFiles;

		//write php array into a JSON file
		$fp = fopen('..\Metalab\results.json', 'w');
		fwrite($fp, json_encode($results));
		fclose($fp);
		//for testing output
		//print_r($results);

		echo '<form action="check.php" method="POST"><input type="submit" name="check" value="Start Data Analysis"/></form>';
	}else{
		echo "CANNOT PROCEED";
	}	
?>