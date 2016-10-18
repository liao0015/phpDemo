<?php
echo '<!DOCTYPE html>
		<html>
		<head>
			<title>MetaLab</title>
			<meta charset="UTF-8">
			<link href="css/styles.css" rel="stylesheet"/>
		</head>
		<body>
			<div class="header">
				<img src="img/logo.png">
				<h2>Data analysis</h2>
			</div>';
//upload new raw files
echo '<div id="upload-rawfile-wrapper"><h3>Upload Raw Files</h3>
        <form action="index.php" method="POST" enctype="multipart/form-data">
        <fieldset id="raw-files-upload">
            <legend>Add a new raw file: (you may add multiple raw files)</legend>
            <div><input type="file" name="RawFileToUpload[]" style="margin:10px;"></div>
            <div><input type="file" name="RawFileToUpload[]" style="margin:10px;"></div>
            <input type="button" id="generateUploadBtn">
            <div id="generateUploadlabel">
            	<label for="generateUploadBtn">Upload more...</label>
            </div>
        </fieldset><input type="submit" name="rawFileUploadSubmit" id="rawFileUploadSubmitBtn">
        <a href="index.php" id="rawFileUploadCloseLabel">Close</a>
        <div id="rawFileUploadSubmitLabel"><label for="rawFileUploadSubmitBtn">Upload Raw Files</label></div>
        </form>
    </div>'; //END add new raw files

echo '<div class="footer">
			<span>Metalab Copyright@2016</span>
			<div id="help">Help</div>
			<div id="privacy">Privacy and terms</div>
		</div>

		<script src="js/index.js"></script>
	</body>
	</html>';
?>