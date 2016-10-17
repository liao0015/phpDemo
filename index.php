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

	<!-- Raw files section -->
	<div id="rawfile-wrapper">
		<!-- next step button -->
		<div class="next-button-label-wrapper" style="width:100%; min-height: 50px;">
			<div id="rawfile-nextBtn-label">
				<label>Next Step</label>
			</div>
		</div>
		<!-- select Raw files section -->
		<div style="width: 100%; min-height: 50px;">
			<div id="open-select-rawfile-label"><label>Select Raw Files</label></div>
		</div>
		<div id="selected-rawfile-list-wrapper" style="width: 100%; margin-bottom: 20px;">No selected raw files yet</div>
		<?php require ("selectRawFiles.php"); ?>
		
		<!-- upload Raw files section -->
		<div id="open-upload-rawfile-label">
			<a href="openUpload.php"><label for="open-upload-rawfile-btn">Upload Raw Files</label></a>
		</div>
		<div id="upload-msg-wrapper" style="width: 100%; margin-top: 20px;">
			<?php require ("uploadRawfiles.php"); ?>
		</div>
	</div>

	<!-- select database section -->
	<div id="select-database-wrapper">
		<!-- next step button -->
		<div class="next-button-label-wrapper" style="width:100%; min-height: 50px;">
			<div id="database-nextBtn-label">
				<label>Next Step</label>
			</div>
		</div>
		<!-- select database -->
		<?php require ("selectDatabase.php"); ?>
	</div>

	<!-- select parameter section -->
	<div id="parameter-wrapper">
		<!-- session submission button  -->
		<div id="session-submit-label-wrapper" style="width:100%; min-height: 50px;">
			<div id="session-submit-label">
				<label for="session-submit-btn">Submit session</label>
			</div>
		</div><!-- END session submission button  -->

		<?php require ("parameter.php"); ?>
	
		<div id="instrument-resolution-wrapper">
			<h3>Instrument resolution</h3>
			<fieldset>
				<legend>Choose resolution setting</legend>
				<input type="radio" name="instrumentResolution" id="instrumentResolution-high" value="High-High" checked>
				<label for="instrumentResolution-high">High-High</label>
				<input type="radio" name="instrumentResolution" id="instrumentResolution-low" value="High-Low">
				<label for="instrumentResolution-low">High-Low</label>
			</fieldset>
		</div>
		<div id="taxonomy-analysis-wrapper">
			<h3>Taxonomy analysis</h3>
			<fieldset>
				<legend>Choose taxonomy</legend>
				<input type="checkbox" name="taxonomy[]" id="taxonomy-buildin" value="build-in" checked>
				<label for="taxonomy-buildin">build-in</label>
				<input type="checkbox" name="taxonomy[]" id="taxonomy-unipept" value="unipept">
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