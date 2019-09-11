# Make List README
This file looks through the current directory for other folders and makes a link in a list that points to that folder.
It also checks for an index file and if one is not found it looks for the first .php or .html file and makes a link directly to that file.

The file should be placed at the root of your site and will make all folders into a list. Changes need to be made so that it excludes image or script folders.

## Example File Structure
ROOT  
|  
|------Subfolder1  
|       |------page2.php  
|       |------index.php  
|-----Subfolder2  
|       |------page1.php  
|       |------page2.php  
|-----index.php  
|-----mkList.php  