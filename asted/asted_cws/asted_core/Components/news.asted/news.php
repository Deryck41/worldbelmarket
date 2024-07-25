<?php
function smarty_function_news($params, $smarty)
{
  $forsection = isset($params['forsection']) ? $params['forsection'] : '';
  $product = isset($params['product']) ? $params['product'] : '';
  $style = isset($params['style']) ? $params['style'] : '';
  $type = isset($params['type']) ? $params['type'] : '';
  switch ($type) {
    case 'detail':
      $astedNews = R::findOne('crm_site_news', 'pageurl = ? ', [$product]);
      return $smarty->fetch('components/news/' . $style . '.acws', array('newsArr' => $astedNews));
      break;
    case 'main':
      $astedNews = R::find('crm_site_news', ' forsection = ? ORDER BY id DESC LIMIT ?', [$forsection, 5]);
      foreach ($astedNews as $news) {
        $newsArray[] = $news;
      }
      return $smarty->fetch('components/news/'.$style.'.acws', array('newsArr' => $newsArray));
      break;
    case 'sidebar':
      $astedNews = R::find('crm_site_news', ' forsection = ? ORDER BY id DESC LIMIT ?', [$forsection, 5]);
      foreach ($astedNews as $news) {
        $newsArray[] = $news;
      }
      return $smarty->fetch('components/news/' . $style . '.acws', array('newsArr' => $newsArray));
      break;
    case 'rek':
      $astedNews = R::find('crm_site_news', 'pageurl <> ? ORDER BY RAND() LIMIT 5', [$product]);
      foreach ($astedNews as $news) {
        $newsArray[] = $news;
      }
      return $smarty->fetch('components/news/' . $style . '.acws', array('newsArr' => $newsArray));
      break;
    case 'asc':
      $astedNews = R::find('crm_site_news', ' forsection = ? ORDER BY id ASC', [$forsection]);
      foreach ($astedNews as $news) {
        $newsArray[] = $news;
      }
      return $smarty->fetch('components/news/' . $style . '.acws', array('newsArr' => $newsArray));
      break;
    default:
      $astedNews = R::find('crm_site_news', ' forsection = ? ORDER BY id DESC', [$forsection]);
      foreach ($astedNews as $news) {
        $newsArray[] = $news;
      }
      return $smarty->fetch('components/news/' . $style . '.acws', array('newsArr' => $newsArray));
      break;
  }
}
