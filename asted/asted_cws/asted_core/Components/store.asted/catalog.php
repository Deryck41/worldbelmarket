<?php
function smarty_function_catalog($params, $smarty)
{
    $forcatalog = isset($params['forcatalog']) ? $params['forcatalog'] : '';
    $style = isset($params['style']) ? $params['style'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    $product = isset($params['product']) ? $params['product'] : '';
    $category = isset($params['category']) ? $params['category'] : '';
    switch ($type) {
        case "any":
            $astedcatalog = R::find('crm_site_catalog', 'category = ? AND pageurl <> ?', [$category, $product], 'ORDER BY RAND() LIMIT 3');
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedcatalog));
            break;
        case "new":
            $astedcatalog = R::find('crm_site_catalog', 'ORDER BY id DESC LIMIT 4');
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedcatalog));
            break;
        case "stock":
            $astedcatalog = R::find('crm_site_catalog', 'filter = ? ORDER BY RAND() LIMIT 4', [1]);
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedcatalog));
            break;
        case "category":
            $astedCatalog = R::find('crm_site_catalog', 'forsection = ? and category = ?', [$forcatalog, $category]);
            $astedCategorys = R::find('crm_site_catalog_category', 'pageurl = ? ', [$category]);
            if (empty($astedCatalog)) {
                $astedMainCategory = R::findOne('crm_site_catalog_category', 'pageurl = ? ', [$category]);
                $astedCategorys = R::find('crm_site_catalog_category', 'parent = ? ', [$astedMainCategory['id']]);
                foreach ($astedCategorys as $astedCategory) {
                    $pCategory[] = $astedCategory['pageurl'];
                }
                $astedCatalog = R::find('crm_site_catalog', 'category IN (' . R::genSlots($pCategory) . ')', $pCategory);
            }
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedCatalog, 'categoryArr' => $astedCategorys));
            break;
        case 'detail':
            $astedcatalog = R::findOne('crm_site_catalog', 'pageurl = ?', [$product]);
            // $files = explode(';', $astedcatalog['galery']);
            // $documents = [];
            // $images = [];
            // foreach ($files as $file) {
            //     $filename = basename($file);
            //     $extension = pathinfo($filename, PATHINFO_EXTENSION);
            //     $documentExtensions = ['doc', 'docx', 'pdf', 'txt', 'rtf', 'odt', 'xls', 'xlsx', 'csv', 'ppt', 'pptx'];
            //     $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'tiff', 'ico'];
            //     if (in_array($extension, $documentExtensions)) {
            //         $documents[] = $file;
            //     } elseif (in_array($extension, $imageExtensions)) {
            //         $images[] = $file;
            //     }
            // }
            // $astedcatalog['galery'] = implode(";", $images);
            // $astedcatalog['document'] = implode(";", $documents);
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedcatalog));
            break;
        default:
            $astedCatalog = R::find('crm_site_catalog', 'forsection = ?', [$forcatalog]);
            return $smarty->fetch('components/catalog/' . $style . '.acws', array('catalogArr' => $astedCatalog));
            break;
    }
}
