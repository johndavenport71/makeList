<?php
    $dir = dirname(__FILE__);

    $filePath = scandir($dir);
    print_r($filePath);
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
                unset($current);
            } else {
                print('<li><a href="' . $file . '">' . $file . '</a></li>');
            }//end if
        }//end if
    }//end foreach
    unset($path);

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