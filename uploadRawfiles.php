<?php
			//var_dump($_POST["rawFileUploadSubmit"]);
			if(isset($_POST["rawFileUploadSubmit"])){
				//check if the option was selected
				$uploadFileDir = "C:/wamp64/www/Metalab_data/raw_files/";
				for($i=0; $i<sizeof($_FILES["RawFileToUpload"]["name"]); $i++){
					$uploadFileName = $_FILES["RawFileToUpload"]["name"][$i];
					$uploadFileTemp_Name = $_FILES["RawFileToUpload"]["tmp_name"][$i];
					$uploadFile = $uploadFileDir.$uploadFileName;
					$uploadOk = 1;
					$uploadFileType = $_FILES["RawFileToUpload"]["type"][$i];
					$uploadFileSize = $_FILES["RawFileToUpload"]["size"][$i];
					$uploadFileError = $_FILES["RawFileToUpload"]["error"][$i];
					//var_dump($_FILES); //this will output $FILES array

					// Check if a file is actually attached
					if(!isset($_POST['rawFileUploadSubmit'])){
					    echo 'No file selected';
					}else{
					    // if(!$uploadFileName) {
					    //     echo "Please select a file to be uploaded"."<br/>\n";
					    //     $uploadOk = 0;
					    // }
					    // Check if the file size is too large
					    if($uploadFileSize > 50000000){
					        echo 'File size was too large to be uploaded'."<br/>\n";
					        $uploadOk = 0;
					    }
					    // Check if the file already exists
					    elseif (file_exists($uploadFile) && $uploadFileName != "") {
					        echo 'File with the same name '.$uploadFileName.' already exists.'."<br/>\n";
					        $uploadOk = 0;
					    }
					    // Allow certain file formats
					    // elseif($uploadFileType != "fasta") {
					    //     echo "Sorry, only fasta files are allowed.";
					    //     $uploadOk = 0;
					    // }
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    echo "File ".$uploadFileName." was not uploaded.<br/>\n";
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($uploadFileTemp_Name, $uploadFile)) {
					        echo "File: ".$uploadFileName."<br/>\n";
					        echo "Type: ".$uploadFileType."<br/>\n";
					        echo "Size: ".$uploadFileSize."<br/>\n";
					        echo "The file ". $uploadFileName. " has been uploaded.<br/>\n"; 
					        //$results['database'] = $uploadFile;
					    } else {
					        // echo "There was an error uploading your file ".$uploadFileName. ".<br/>\n";
					    }
					}
				}
			}
?>