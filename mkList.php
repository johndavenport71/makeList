<?php
    $dir = dirname(__FILE__);
    //create array of the files in the directory
    $filePath = scandir($dir);
    
    //Remove the first two elements of the filePath array : '.' and '..'
    array_shift($filePath);
    array_shift($filePath);
    
    foreach($filePath as $key => $file) {
        //reset to root directory
        chdir($dir);
        
        //check for a . in the file name
        if (!strstr($file, '.')) {
            //move into the folder
            chdir($file);

            $currentFiles = scandir(getcwd());
            //search for an index file
            if (!findFile($currentFiles, 'index.')) {
                //if there is no index file, look for any php or html file and link to that
                foreach ($currentFiles as $current) {
                    if(strstr($current, '.php') || strstr($current, '.html')) {
                        print('<li><a href="' . $file . '/' . $current . '">' . $file . '</a></li>');
                        break;
                    }

                }//end foreach

            } else {
                //create a link to the current folder
                print('<li><a href="' . $file . '">' . $file . '</a></li>');

            }//end if

        }//end if

    }//end foreach
    
    //this function searches and array for a string and returns a boolean
    //based on if the string was matched or not
    function findFile(array $directory, string $needle) {
        foreach ($directory as $dir) {
            $index = false;
            if (strstr($dir, $needle)) {
                $index = true;
            }//end if
        }//end foreach
        return $index;
    }
  
?>