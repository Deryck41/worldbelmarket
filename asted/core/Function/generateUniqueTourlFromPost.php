<?
function generateUniqueTourlFromPost($post, $tablename, $id)
{
    if (empty($post['pageurl'])) {
        $tourl = makeUrlCode($_POST['title']);
    } else {
        $prefixes = array('http://', 'https://', 'www.', 'ftp://', 'sftp://', 'mailto:');
        foreach ($prefixes as $prefix) {
            if (stripos($post['pageurl'], $prefix) === 0) {
                return $post['pageurl'];
            }
        }
        $tourl = makeUrlCode($_POST['pageurl']);
    }
    // Проверка, если URL начинается с определенных префиксов, не изменять его

    $existingCatalog = R::findOne($tablename, 'pageurl = ? AND id !=?', [$tourl, $id]);
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
