<?php 

$url = basename($_SERVER['SCRIPT_FILENAME']); 

//Get file upload progress information. 
if(isset($_GET['progress_key'])) { 
    $status = apc_fetch('upload_'.$_GET['progress_key']); 
    echo $status['current']/$status['total']*100; 
    die; 
} 
// 

?> 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script> 
<link href="style_progress.css" rel="stylesheet" type="text/css" /> 
 

<body style="margin:0px"> 
<!--Progress bar divs--> 
<div id="progress_container"> 
    <div id="progress_bar"> 
           <div id="progress_completed"></div> 
    </div> 
</div> 
<!----> 
</body>