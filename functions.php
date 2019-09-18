<?php

    function makeList() {
        //store the current directory as root to be returned to later
        $root = getcwd();

        //create array of the files in the current directory
        $filePath = getFiles();
        
        foreach($filePath as $file) {
            //reset to root directory
            chdir($root);
            
            //check for a . in the file name
            if (!strstr($file, '.')) {
                //move into the folder
                chdir($file);

                $currentFiles = getFiles();

                //search for an index file
                if (!findFile($currentFiles, 'index.')) {
                    //if there is no index file, look for any php or html file and link to that
                    makeIndex();
                    $index = fopen('index.html', 'a');
                    fwrite($index, '<ul>');
                    foreach ($currentFiles as $current) {
                        if(strstr($current, '.php') || strstr($current, '.htm')) {
                            fwrite($index, '<li><a href="' . $current . '">' . $current . '</a></li>' . PHP_EOL);
                        }

                    }//end foreach
                    fwrite($index, '</ul>'.PHP_EOL.'</body>'.PHP_EOL.'</html>');
                    fclose($index);
                    print('<li><a href="' . $file . '">' . $file . '</a></li>');
                } else {
                    //create a link to the current folder
                    print('<li><a href="' . $file . '">' . $file . '</a></li>');

                }//end if

            }//end if

        }//end foreach
        
    }//end makeList function
    
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
    }//end findFile function

    //scans the current directory and returns an array with the first two items removed '.' and '..'
    function getFiles() {
        return array_diff(scandir(getcwd()), array(".",".."));
    }

    function makeIndex() {
        $index = fopen('index.html', 'w');
        $i = 0;
        $arrIndex = [
            "<!DOCTYPE html>",
            "<html lang='en'>",
            "<head>",
            "<meta charset='UTF-8'>",
            "<title>index</title>",
            "</head>",
            "<body>"
        ];
        while(!feof($index) && $i < sizeof($arrIndex)) {
            fwrite($index, $arrIndex[$i] . PHP_EOL);
            $i++;
        }
        fclose($index);
    }//end makeIndex function
