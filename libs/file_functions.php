<?php
//convert name of file to URL friendly string, removing spaces and adding - instead.
function url_friendly_string($string) {
  //$string = strtolower($string);
  $string = str_replace(' ', '-', $string);
  return $string;
}

//check to see if the uploaded file is an image or not.
function file_is_image($file) {
  $type = strtolower($file['type']);
  if ($type == "image/gif" || $type == "image/png" || $type == "image/jpeg" || $type == "image/jpg") {
    return true;
  } else {
    return false;
  }
}
//function to set the thumbnail image
function set_thumbnail_image($item, $file) {
  $filename = url_friendly_string($file['name']);
  //where to upload the file, upload_dir is specified in config.php and basename returns only the name of the file since its the last part of the path
  $target = UPLOAD_DIR.basename($filename);

  if (!file_is_image($_FILES['thumbnail'])) {
    echo "file is not image";
    return false;
  }
//måste kolla upp detta
  if ($item->thumbnail_url && file_exists(UPLOAD_DIR.$item->thumbnail_url)) {
    unlink(UPLOAD_DIR.$item->thumbnail_url);
  }
//måste kolla upp
  if (move_uploaded_file($file['tmp_name'], $target)) {
    $thumbnail_url = basename($target);
    return $thumbnail_url;
  } else {
    return false;
  }
}
