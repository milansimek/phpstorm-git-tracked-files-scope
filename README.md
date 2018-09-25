# Git tracked files scope in PHPStorm
Generate a custom scope for PHPStorm which shows only files tracked by git    
This is usefull when working with a project with tracked and untracked files mixed


## Usage
* Copy `generateTrackedFilesScope.php` to your `~/bin/` directory
* `chmod 777 ~/bin/generateTrackedFilesScope.php`
* Execute `source ~/.bashrc`;
* Open your PHPStorm git project and execute command `generateTrackedFilesScope.php` in the root directory.
* View your tracked files in the tree view by selecting scope `tracked_files`

