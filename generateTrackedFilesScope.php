#!/usr/bin/env php
<?php
ini_set('display_errors', 1);
$result = shell_exec('git ls-files');
$files = explode("\n", $result);
$files = array_filter($files);

function sortByLength($a,$b){
    return strlen($b)-strlen($a);
}
usort($files,'sortByLength');

//phpstorm limit, need merge files
if(count($files) > 130) {
    $mergeCount = 0;
    $mergeNeededCount = count($files) - 130;
    $mergedFiles = array();
    foreach($files as $file) {
        if($mergeCount < $mergeNeededCount) {
            $dir = dirname($file) . '/*';
            $mergedFiles[$dir] = $dir;
            $mergeCount++;
            continue;
        }
        $mergedFiles[] = $file;
    }
    $files = $mergedFiles;
}

$pattern = 'file:' . implode('||file:', $files);
$xml = "<component name=\"DependencyValidationManager\"><scope name=\"tracked_files\" pattern=\"{$pattern}\" /></component>";
@mkdir('.idea/scopes');
file_put_contents('.idea/scopes/tracked_files.xml', $xml);
