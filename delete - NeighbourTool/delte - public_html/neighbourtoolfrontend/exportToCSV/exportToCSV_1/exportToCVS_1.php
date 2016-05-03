<?php
$list = array ('aaa', 'bbb', 'ccc', 'dddd');
$fp = fopen('file.csv', 'w');
fputcsv($fp, $list);
fclose($fp);
?>


<?php

$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);

$fp = fopen('file2.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
?>