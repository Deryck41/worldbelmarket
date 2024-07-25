<?php
function smarty_function_category($params, $smarty)
{
  $prefixes = array('http://', 'https://', 'www.', 'ftp://', 'sftp://', 'mailto:');
  $forcatalog = isset($params['forcatalog']) ? $params['forcatalog'] : '';
  $style = isset($params['style']) ? $params['style'] : '';
  $url = isset($params['url']) ? $params['url'] : '';
  $type = isset($params['type']) ? $params['type'] : '';
  switch ($type) {
    case 'doc':
      $astedCategory = R::findOne('crm_site_catalog_category', 'pageurl=?', [$url]);
      $categoryFiles[] = $astedCategory['galery'];
      while (!empty($astedCategory['parent'])) {
        $astedCategory = R::load('crm_site_catalog_category', $astedCategory['parent']);
        $categoryFiles[] = $astedCategory['galery'];
      }
      $categoryFiles = implode(';', $categoryFiles);
      $files = explode(';', $categoryFiles);
      $documents = [];
      $images = [];
      foreach ($files as $file) {
        $filename = basename($file);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $documentExtensions = ['doc', 'docx', 'pdf', 'txt', 'rtf', 'odt', 'xls', 'xlsx', 'csv', 'ppt', 'pptx'];
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'tiff', 'ico'];
        if (in_array($extension, $documentExtensions)) {
          $documents[] = $file;
        } elseif (in_array($extension, $imageExtensions)) {
          $images[] = $file;
        }
      }
      $categoryDoc = implode(";", $documents);
      return $smarty->fetch('components/catalog/' . $style . '.acws', array('categoryArr' => $categoryDoc));
      break;
    case 'detail':
      $astedCategory = R::findOne('crm_site_catalog_category', 'pageurl=?', [$url]);
      return $smarty->fetch('components/catalog/' . $style . '.acws', array('categoryArr' => $astedCategory));
      break;
    case 'accordion':
      $categories = R::find('crm_site_catalog_category', ' forcatalog=?', [$forcatalog]);
      $categorieLevels = [];
      foreach ($categories as $category) {
        $hasPrefix = false;
        foreach ($prefixes as $prefix) {
          if (strpos($category['pageurl'], $prefix) === 0) {
            $hasPrefix = true;
            break;
          }
        }
        // Если нет префикса, изменяем значение pageurl
        if (!$hasPrefix) {
          $category['pageurl'] = '/catalog/' . $category['pageurl'] . '/';
        }
        $level = $category->level;
        if (!isset($categorieLevels[$level])) {
          $categorieLevels[$level] = [];
        }
        $categorieLevels[$level][] = $category;
      }
      return $smarty->fetch('components/catalog/' . $style . '.acws', array('categoryArr' => $categorieLevels));
      break;
    default:
      $astedCategory = R::find('crm_site_catalog_category', ' forcatalog=? AND parent IS NULL', [$forcatalog]);

      return $smarty->fetch('components/catalog/' . $style . '.acws', array('categoryArr' => $astedCategory));
      break;
  }
}
