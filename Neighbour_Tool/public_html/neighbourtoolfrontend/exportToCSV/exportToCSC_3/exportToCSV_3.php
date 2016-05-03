
<?php

function generateCsv($data, $delimiter = ',', $enclosure = '"') {
       $contents =  null;
	   //$handle = fopen('php://temp', 'r+');
	   $handle = fopen('exporttoCSVoutput.csv', 'r+');
       foreach ($data as $line) {
               fputcsv($handle, $line, $delimiter, $enclosure);
       }
       rewind($handle);
       while (!feof($handle)) {
               $contents .= fread($handle, 8192);
       }
       fclose($handle);
       return $contents;
}
?>

<?php

$data = array(
       array(1, 2, 4),
       array('test string', 'test, literal, comma', 'test literal "quotes"'),
);

echo generateCsv($data);
// outputs:
// 1,2,4
// "test string","test, literal, comma","test literal""quote"""
?>
