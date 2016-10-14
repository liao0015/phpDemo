<?php

/*************select database section***************/
echo '<div id="select-database-wrapper">';
echo '<h3>Select Database</h3>';
//default databse section
echo '<fieldset id="default-database-options">
            <legend>Available database options (You can only selecte one per analysis):</legend>';

//open database directory
$dir_database = "../Metalab_data/fasta_database";

//List files in database directory
if(is_dir($dir_database)){
    if($dh = opendir($dir_database)){
        while(($file = readdir($dh)) !== false ){
            if($file !== "." && $file !== ".."){
                if(filetype($dir_database."/".$file) == "file"){
                    echo '<div class="database-list"><input type="radio" name="databaseList" value="'.$file.'" /><label>'.$file.'</label></div>';
                    //echo filetype($dir_database."/".$file);
                }
            }
        }
        closedir($dh);
    }
}
            
echo '</fieldset></div>';//END select database section


/***********select raw files section*********/
echo '<div id="select-rawfile-wrapper"><h3>Select Raw Files</h3>';
//choose from existing file
echo '<fieldset id="choose-existing-rawfiles">
                <legend>Existing raw files in your directory:</legend>';

//open raw_files directory
$dir_rawfiles = "../Metalab_data/raw_files";

//List files in raw_files directory
if(is_dir($dir_rawfiles)){
    if($dh = opendir($dir_rawfiles)){
        while(($file = readdir($dh)) !== false ){
            if($file !== "." && $file !== ".."){
                if(filetype($dir_rawfiles."/".$file) == "file"){
                    echo '<div class="raw-file-list"><input type="checkbox" name="existingRawFileList[]" value="'.$file.'" /><label>'.$file.'</label></div>';
                    //echo filetype($dir_rawfiles."/".$file);
                }
            }
        }
        closedir($dh);
    }
}

echo '</fieldset></div>';  //END select raw files section
?>