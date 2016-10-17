<!DOCTYPE html>
<html>
<head>
	<title>MetaLab</title>
	<meta charset="UTF-8">
	<link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
	<!-- Header -->
	<div class="header">
		<img src="img/logo.png">
		<h2>Data analysis</h2>
	</div><!-- END Header -->

	<!-- Main navigation bar -->
	<nav class="nav-main">
		<ul>
			<li id="tab-rawfile" class="active"><span>Raw files</span></li>
			<li id="tab-selectfile"><span>Database</span></li>
			<li id="tab-parameter"><span>Parameters</span></li>	
			<!-- <li id="tab-setting"><span>Settings</span></li> -->
		</ul>
	</nav><!-- END Main navigation bar -->

<form action="send.php" method="POST" enctype="multipart/form-data">

	<!-- session submission button  -->
	<div id="session-submit-label-wrapper" style="width:100%; min-height: 50px;">
		<div id="session-submit-label">
			<label for="session-submit-btn">Submit session</label>
		</div>
	</div><!-- END session submission button  -->

	<!-- Raw files section -->
	<div id="fileupload-wrapper">
		<!-- select Raw files section -->
		<div id="open-select-rawfile-label"><label>Select Raw Files</label></div>
		<div id="selected-rawfile-list-wrapper">No selected raw files yet</div>
		<?php require ("selectRawFiles.php"); ?>
		
		<!-- upload Raw files section -->
		<div id="open-upload-rawfile-label">
			<a href="openUpload.php"><label for="open-upload-rawfile-btn">Upload Raw Files</label></a>
		</div>
		<div id="upload-msg-wrapper">
			<?php require ("uploadRawfiles.php"); ?>
		</div>
	</div>

	<!-- select files section -->
	<div id="fileselect-wrapper">
		<?php require ("selectDatabase.php"); ?>
	</div>

	<!-- select parameter section -->
	<div id="parameter-wrapper">
		<?php require ("parameter.php"); ?>
	
		<div id="instrument-resolution-wrapper">
			<h3>Instrument resolution</h3>
			<fieldset>
				<legend>Choose resolution setting</legend>
				<input type="radio" name="instrumentResolution" id="instrumentResolution-high">
				<label for="instrumentResolution-high">High-High</label>
				<input type="radio" name="instrumentResolution" id="instrumentResolution-low">
				<label for="instrumentResolution-low">High-Low</label>
			</fieldset>
		</div>
		<div id="taxonomy-analysis-wrapper">
			<h3>Taxonomy analysis</h3>
			<fieldset>
				<legend>Choose taxonomy</legend>
				<input type="checkbox" name="taxonomy[]" id="taxonomy-buildin">
				<label for="taxonomy-buildin">build-in</label>
				<input type="checkbox" name="taxonomy[]" id="taxonomy-unipept">
				<label for="taxonomy-unipept">unipept</label>
			</fieldset>
		</div>
	</div>

	<input id="session-submit-btn" type="submit" name="submit"/>
</form><!-- END form  -->

	<!-- Footer section -->
	<div class="footer">
		<span>Metalab Copyright@2016</span>
		<div id="help">Help</div>
		<div id="privacy">Privacy and terms</div>
	</div><!-- END Footer section -->

	<script src="js/index.js"></script>
</body>
</html>