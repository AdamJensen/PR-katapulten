<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

include ("../config/db.php");



if (!empty($_FILES)) {

$sessionID = $_REQUEST['session'];

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile2 = 'http://130.227.16.64'  . $_REQUEST['folder'] . '/' . $_FILES['Filedata']['name'];
	$fileName = $_FILES['Filedata']['name'];
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	
	//$fileName = $_FILES['uploadify']['name'];
	//$fileSize = $_FILES['uploadify']['size'];
	//$fileType = $_FILES['uploadify']['type'];

//		$client_id = mysql_real_escape_string($_GET['id']);
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);
		chmod($targetFile, 0755);
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
		
	
		$thefilename = $_FILES['Filedata']['name'];

//save file to db

mysql_query("INSERT INTO upload (id, session, filnavn, filsti) VALUES('NULL','".$sessionID."','".$fileName."','".$targetFile2."')") 
or die(mysql_error()); 

echo "din fil er nu blevet gemt i vores database.";

 } ?>