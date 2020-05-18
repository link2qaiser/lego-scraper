<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    public static function writeFile($file_name = NULL, $string){
    	$handle = fopen($file_name, 'w') or die('Cannot open file:  '.$file_name); //implicitly creates file
		fwrite($handle, $string);
		fclose($handle);
    }
    public static function makeZip($dir,$file_name = NULL){
    	if($file_name == NULL)
    		$file_name = time().time().".zip";
    	$zip = new \ZipArchive;
    	$zipdir = $dir.'/'.$file_name;
    	
		if ($zip->open('test_dir.zip', \ZipArchive::OVERWRITE) === TRUE)
		{
			echo "test"; die();
		    if ($handle = opendir($dir))
		    {

		        // Add all files inside the directory
		        while (false !== ($entry = readdir($handle)))
		        {
		            if ($entry != "." && $entry != ".." && !is_dir($dir.'/' . $entry))
		            {
		                $zip->addFile($dir.'/' . $entry);
		            }
		        }
		        closedir($handle);
		    }
		 
		    $zip->close();
		}
		echo $file_name; die();
		return $file_name;
    }
    public static function downloadZip($dir){
        $dir = $dir;
        $zip_file = time().rand().".zip";

        // Get real path for our folder
        $rootPath = realpath($dir);

        // Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();
        ignore_user_abort(true);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
        unlink($zip_file);
    }
    public static function deleteDirectory($dirname) {
             if (is_dir($dirname))
               $dir_handle = opendir($dirname);
         if (!$dir_handle)
              return false;
         while($file = readdir($dir_handle)) {
               if ($file != "." && $file != "..") {
                    if (!is_dir($dirname."/".$file))
                         unlink($dirname."/".$file);
                    else
                         self::deleteDirectory($dirname.'/'.$file);
               }
         }
         closedir($dir_handle);
         rmdir($dirname);
         return true;
    }
}
