<?php
session_start();
// Read file into array
$lines = file('../csv/words.csv', FILE_IGNORE_NEW_LINES); //plit lines of file into the array $lines

unset($lines[$_GET['delete']]); // remove data in at position 'delete' in array lines

$data_string = implode("\n",$lines);    // translate the array $line in to a String that is necked with "\n"

$f = fopen('../csv/words.csv','w');   //open file with w method
fwrite($f,$data_string);        //rewrite file with data_string
fclose($f); //close

$_SESSION['message'] =  array(    //update the session
    'text' => 'You will never see this info again ! 🖤',
    'type' => 'danger'
);

header('Location:../?url=list_words');  //redirect to particular url


?>


<!-- To synch workspace with cloud
Commit changes - changes files used to track repository on local machine to check for new files
Push changes - will make changes on githu/cloud respository
In order to do this, first must type a git add command-->