<?php session_start();
        if (        $_POST['word'] != '' &&
                    $_POST['mean'] != '' &&
                    $_POST['syn'] != '' &&
                    $_POST['ex1'] != '' &&
                    $_POST['ex2'] != '' &&
                    $_POST['e'] == 0
            ){ //../csv/words.csv
            $words = file('../csv/words.csv', FILE_IGNORE_NEW_LINES); //split csv file into array
            $length = count($words);
            $words[$length] = "{$_POST['word']},{$_POST['mean']},{$_POST['syn']},{$_POST['ex1']},{$_POST['ex2']}";   //add info into array at external position
            $data_string = implode("\n",$words);            // translate array into string necked with "\n"

            $f = fopen('../csv/words.csv','w');       //open file to write
            fwrite($f,$data_string);    //rewrite
            fclose($f);             //close
            $_SESSION['message'] = array(                   //update session
                'text' => 'Word has been added ! ❤️',
                'type' => 'success'
            );
            //Redirect to home
            header('Location:../?url=list_words');
            }
    elseif (    $_POST['word'] != '' &&
                $_POST['mean'] != '' &&
                $_POST['syn'] != '' &&
                $_POST['ex1'] != '' &&
                $_POST['ex2'] != '' &&
                $_POST['e'] == 1
            ){

            $lines = file('../csv/words.csv', FILE_IGNORE_NEW_LINES);
            $lines[$_POST['lineedit']] = "{$_POST['word']},{$_POST['mean']},{$_POST['syn']},{$_POST['ex1']},{$_POST['ex2']}";

            // Create the string to write to the file
            $data_string = implode("\n",$lines);

    // Write the string to the file, overwriting the current contents
            $f = fopen('../csv/words.csv','w');
            fwrite($f,$data_string);
            fclose($f);
            $_POST['e'] = 0;
            $_SESSION['message'] = array(
            'text' => 'Edit successfully ! 💚',
            'type' => 'success');
            //Redirect to home
            header('Location:../?url=list_words');
            }
    else {
            $_SESSION['message'] = array(
            'text' => 'All information is required !',
            'type' => 'danger');
        //Redirect to home
        header('Location:../?url=form_words');
    }

    //redirect to home

?>