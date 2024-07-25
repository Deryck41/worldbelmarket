<?php
if (isset($_FILES['files']) && !empty($_FILES['files'])) {
  $uploadDir = '../../uploads/';
  foreach ($_FILES['files']['name'] as $key => $name) {
    $tempFile = $_FILES['files']['tmp_name'][$key];
    $targetFile = $uploadDir . date("Ydmhis") . '_' . $name;
    move_uploaded_file($tempFile, $targetFile);
  }
}
$directory = "../../uploads/";
$allowed_types = array(
  'jpg',
  'webp',
  'ico',
  'svg',
  'jpeg',
  'gif',
  'png',
  'doc',
  'docx',
  'mov',
  'pdf',
  'xlsx'
);
$file_parts = array();
$ext = '';
$title = '';
$i = 0;
$toDelete = 5;
$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

$files = array();
while ($file = readdir($dir_handle)) {
  if ($file == '.' || $file == '..')
    continue;
  $file_parts = explode('.', $file);
  $ext = strtolower(array_pop($file_parts));
  if (in_array($ext, $allowed_types)) {
    $result = '/asted' . mb_substr($directory, $toDelete);
    $mod_time = filemtime($directory . $file);
    $files[] = array(
      'name' => $file,
      'ext' => $ext,
      'result' => $result,
      'mod_time' => $mod_time,
    );
  }
}
function cmp($a, $b)
{
  $a_time = substr($a['mod_time'], 0, 14);
  $b_time = substr($b['mod_time'], 0, 14);
  return $b_time - $a_time;
}
usort($files, 'cmp');
foreach ($files as $file) {
  switch ($file['ext']) {
    case "docx":
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/plugins/docx.webp" alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
    case "doc":
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/plugins/docx.webp" alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
    case "mov":
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/plugins/mov.webp"  alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
    case "pdf":
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/plugins/pdf.webp"  alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
    case "xlsx":
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/plugins/xlsx.webp"  alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
    default:
      echo '<div class="gallery-item" data-src="' . $file['result'] . $file['name'] . '"><img src="' . $file['result'] . '/' . $file['name'] . '" alt="' . $file['ext'] . '" title="' . $file['name'] . '" /></div>';
      break;
  }
}
closedir($dir_handle);
