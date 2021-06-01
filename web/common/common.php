<?php

function app_version($dir)
{
  $app_path="G:/application/";
  $dir=$app_path.$dir;
  $files = scandir($dir);

  foreach($files as $file){
     if(($file != '.') && ($file != '..')){
        if(is_dir($dir.'/'.$file)){
           $version[]  = $file;

        }
     }
  }
  return $version;
}

  function copy_paste($src, $dst) { 
      // open the source directory
      $dir = opendir($src); 
      // Make the destination directory if not exist
      if(!is_dir($dst)){
          //Directory does not exist, so lets create it.
          @mkdir($dst, 0755, true);
      }
      //@mkdir($dst); 
      // Loop through the files in source directory
      while( $file = readdir($dir) ) { 
          if (( $file != '.' ) && ( $file != '..' )) { 
              if ( is_dir($src . '/' . $file) ) { 
                  // Recursively calling custom copy function
                  // for sub directory 
                  copy_paste($src . '/' . $file, $dst . '/' . $file); 

              }else { 
                  copy($src . '/' . $file, $dst . '/' . $file); 
              } 
          } 
      } 
      closedir($dir);
  } 

  function folderSize($dir){
    $count_size = 0;
    $count = 0;
    $dir_array = scandir($dir);
      foreach($dir_array as $key=>$filename){
        if($filename!=".." && $filename!="."){
           if(is_dir($dir."/".$filename)){
              $new_foldersize = foldersize($dir."/".$filename);
              $count_size = $count_size+ $new_foldersize;
            }else if(is_file($dir."/".$filename)){
              $count_size = $count_size + filesize($dir."/".$filename);
              $count++;
            }
       }
     }
    return $count_size;
  }

function sizeFormat($bytes){ 
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (($bytes >= 0) && ($bytes < $kb)) {
    return $bytes . ' B';

    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
    return ceil($bytes / $kb) . ' KB';

    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
    return ceil($bytes / $mb) . ' MB';

    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
    return ceil($bytes / $gb) . ' GB';

    } elseif ($bytes >= $tb) {
    return ceil($bytes / $tb) . ' TB';
    } else {
    return $bytes . ' B';
    }
}

/*Show Backup Folder*/
    function showFolder($dir){
        // Open a directory, and read its contents
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                if(($file != '.') && ($file != '..')){
                    return  $file ;
                }
            }
            closedir($dh);
            }
        } 
    } 

    /*Delete Folder*/
    function deleteBackup($dir){  
        // Assigning files inside the directory
        $dir = new RecursiveDirectoryIterator(
            $dir, FilesystemIterator::SKIP_DOTS);
        // Reducing file search to given root
        // directory only
        $dir = new RecursiveIteratorIterator(
            $dir,RecursiveIteratorIterator::CHILD_FIRST);
        // Removing directories and files inside
        // the specified folder
        foreach ( $dir as $file ) { 
            $file->isDir() ?  rmdir($file) : unlink($file);
        }
        
    }   

    // get file extension
    function getFileExt($dir)
      {
        $ext = pathinfo($dir, PATHINFO_EXTENSION);

        // Returns html
        // echo $ext;
        return $ext;
      }


?>