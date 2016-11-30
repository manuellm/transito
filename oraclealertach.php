<?php
include "class/cls_oracle.php";
$oracle = new oracle;
$oracle->connect();
//$result = $oracle->query("
//SELECT
//	TO_CHAR(LEO.LLAMADAS.FECHA_RECEPCION, 'YYYY-MM-DD HH24:MI:SS') AS FECHA_RECEPCION,
//	TO_CHAR(LEO.LLAMADAS.CREATION_DATE, 'YYYY-MM-DD HH24:MI:SS') AS CREATION_DATE,
//	TO_CHAR(LEO.LLAMADAS.LAST_UPDATE_DATE, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_DATE,
//	LEO.LLAMADAS.FOLIO_LLAMADA
//FROM
//	LEO.LLAMADAS
//WHERE
//	LEO.LLAMADAS.FECHA_RECEPCION BETWEEN TO_DATE (
//		'30-10-2016 02:00:00',
//		'dd-mm-yyyy hh24:mi:ss'
//	)
//AND TO_DATE (
//	'30-10-2016 06:58:59',
//	'dd-mm-yyyy hh24:mi:ss'
//)");
$result = $oracle->query("
SELECT
	TO_CHAR(LEO.LLAMADAS.FECHA_RECEPCION, 'YYYY-MM-DD HH24:MI:SS') AS FECHA_RECEPCION,
	TO_CHAR(LEO.LLAMADAS.CREATION_DATE, 'YYYY-MM-DD HH24:MI:SS') AS CREATION_DATE,
	TO_CHAR(LEO.LLAMADAS.LAST_UPDATE_DATE, 'YYYY-MM-DD HH24:MI:SS') AS LAST_UPDATE_DATE,
	LEO.LLAMADAS.FOLIO_LLAMADA
FROM
	LEO.LLAMADAS
WHERE
	LEO.LLAMADAS.FECHA_RECEPCION BETWEEN TO_DATE (
		'30-10-2016 06:59:00',
		'dd-mm-yyyy hh24:mi:ss'
	)
AND TO_DATE (
	'30-10-2016 07:58:59',
	'dd-mm-yyyy hh24:mi:ss'
)
AND LEO.LLAMADAS.FOLIO_LLAMADA < 6595824
ORDER BY
	LEO.LLAMADAS.FOLIO_LLAMADA ASC");
$i=0;
while ($row = $oracle->f_array($result)) {
    $i++;
    $a = explode(' ', $row['FECHA_RECEPCION']);
    $aa = explode(':', $a[1]);
    $b = explode(' ', $row['CREATION_DATE']);
    $bb = explode(':', $b[1]);

    $aaa =$a[0] . ' 0' . ($aa[0] - 1) . ':' . $aa[1] . ':' . $aa[2];
    $bbb = $b[0] . ' 0' . ($bb[0] - 1) . ':' . $bb[1] . ':' . $bb[2];

echo 'UPDATE LEO.LLAMADAS SET '
            . 'LEO.LLAMADAS.FECHA_RECEPCION =  "TO_DATE"(\''.$aaa.'\', \'YYYY-MM-DD HH24:MI:SS\') ,'
            . 'LEO.LLAMADAS.CREATION_DATE =  "TO_DATE"(\''.$bbb.'\', \'YYYY-MM-DD HH24:MI:SS\') '
            . 'WHERE LEO.LLAMADAS.FOLIO_LLAMADA = '.$row['FOLIO_LLAMADA'].';<br>';
//    $oracle->query('UPDATE LEO.LLAMADAS SET '
//            . 'LEO.LLAMADAS.FECHA_RECEPCION =  "TO_DATE"(\''.$aaa.'\', \'YYYY-MM-DD HH24:MI:SS\') ,'
//            . 'LEO.LLAMADAS.FECHA_RECEPCION =  "TO_DATE"(\''.$bbb.'\', \'YYYY-MM-DD HH24:MI:SS\') '
//            . 'WHERE LEO.LLAMADAS.FOLIO_LLAMADA = '.$row['FOLIO_LLAMADA']);
}
$oracle->close();
echo $i;
?>
LISTO
