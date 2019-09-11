<?php
    /*
        This file looks through the current directory for other folders and
        makes a link in a list that points to that folder.

        It also checks for an index file and if one is not found it looks for the first
        .php or .html file and makes a link directly to that file.
    */
    $dir = dirname(__FILE__);

    $filePath = scandir($dir);

    foreach($filePath as $path) {
        $file = ltrim($path,'.');
        chdir($dir);
        if (!strpos($file,'.') && $file != "") {
            
            chdir($file);
            $currentFiles = scandir(getcwd());
            if (!findFile($currentFiles, 'index.')) {
                foreach ($currentFiles as $current) {
                    if(strstr($current, '.php') || strstr($current, '.html')) {
                        print('<li><a href="' . $file . '/' . $current . '">' . $file . '</a></li>');
                        break;
                    }
                }
            } else {
                print('<li><a href="' . $file . '">' . $file . '</a></li>');
            }//end if
        }//end if
    }//end foreach

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