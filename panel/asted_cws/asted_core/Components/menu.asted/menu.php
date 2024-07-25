<?php
function smarty_function_menu($params, $smarty)
{
  $forsection = isset($params['forsection']) ? $params['forsection'] : '';
  $style = isset($params['style']) ? $params['style'] : '';
  $type = isset($params['type']) ? $params['type'] : '';
  switch ($type) {
    case 'multi':
      $astedMenu = R::find('crm_site_menu', ' forsection=? ORDER BY sort ASC', [$forsection]);
      $allSection = R::findAll('crm_site_section');
      foreach ($astedMenu as $menu) {
        foreach ($allSection as $key) {

          if ($key['namesection'] == $menu['title']) {
            $menu['custom'] = $key['id'];
          }
        }

        $menuArray[] = $menu;
      }
      $astedPodMenu = R::find('crm_site_menu', ' parent IS NOT NULL ORDER BY sort ASC');
      foreach ($astedPodMenu as $menu) {
        $podmenuArray[] = $menu;
      }
      $astedCategory = R::find('crm_site_catalog_category', 'forcatalog=? and parent IS NULL ORDER BY sort ASC', [4]);
      return $smarty->fetch('components/menu/' . $style . '.acws', array('menuArr' => $menuArray, 'podmenuArr' => $podmenuArray, 'categoryArr' => $astedCategory));
      break;
    case 'all':
      $astedMenus = R::find('crm_site_menu', ' forsection=? ORDER BY sort ASC', [$forsection]);
      foreach ($astedMenus as $astedMenu) {
        if (!empty($astedMenu['link'])) {
          $menu[] = $astedMenu;
        }
        $astedMenuParents = R::find('crm_site_menu', ' parent=? ORDER BY sort ASC', [$astedMenu['id']]);
        if (!empty($astedMenuParents)) {
          foreach ($astedMenuParents as $astedMenuParent) {
            $menu[] = $astedMenuParent;
          }
        }
      }
      return $smarty->fetch('components/menu/' . $style . '.acws', array('menuArr' => $menu));
      break;
    default:
      $astedMenu = R::find('crm_site_menu', ' forsection=? ORDER BY sort ASC', [$forsection]);
      foreach ($astedMenu as $menu) {
        $menuArray[] = $menu;
      }
      return $smarty->fetch('components/menu/' . $style . '.acws', array('menuArr' => $menuArray));
      break;
  }
}
