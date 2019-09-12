# Make List README
This file looks through the current directory for other folders and makes a link in a list that points to that folder.
It also checks for an index file and if one is not found it looks for the first .php or .html file and makes a link directly to that file.

The file should be placed at the root of your site and will make all folders that contain web files into a list of links.

## Example File Structure
ROOT  
|  
|------Subfolder1  
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|------page2.php  
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|------index.php  
|-----Subfolder2  
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|------page1.php  
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|------page2.php  
|-----index.php  
|-----mkList.php  
