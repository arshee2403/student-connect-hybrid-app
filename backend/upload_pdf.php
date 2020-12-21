<?php
$filename=$_REQUEST['filename'];
if ( isset( $_FILES[$filename] ) ) {
	if ($_FILES[$filename]['type'] == "application/pdf") {
		$source_file = $_FILES[$filename]['tmp_name'];
		$dest_file = "uploads/".$_FILES[$filename]['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES[$filename]['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES[$filename]['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES[$filename]['size']." bytes"."<br/>";
				print "File location : upload/".$_FILES[$filename]['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES[$filename]['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES[$filename]['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES[$filename]['error']."<br/>";
		}
	}
}
?>