<?php
function generateUniqueTourl($tourl, $tablename)
{
    $existingCatalog = R::findOne($tablename, 'pageurl = ?', [$tourl]);
    if (!$existingCatalog) {
        return $tourl;
    }

    $index = 1;
    $newTourl = $tourl;
    while ($existingCatalog) {
        $newTourl = $tourl . '-' . $index;
        $existingCatalog = R::findOne($tablename, 'pageurl = ?', [$newTourl]);
        $index++;
    }

    return $newTourl;
}
