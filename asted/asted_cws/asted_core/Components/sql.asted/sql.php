<?php
function smarty_function_sql($params, $smarty) {
    $file = isset($params['file']) ? $params['file'] : '';
    $sql = isset($params['sql']) ? $params['sql'] : '';
    $forsection = isset($params['forsection']) ? $params['forsection'] : '';
    $theme = isset($params['theme']) ? $params['theme'] : '';
    $astedSql = R::find( [ $forsection ], ' forsection=?', [ $forsection ]);
    foreach( $astedSql as $sql ) {
      $sqlArray[] = $sql;
    }
    return $smarty->fetch('components/'.$theme.'/'.$file.'.acws', array('sqlArr' => $sqlArray));
}
?>