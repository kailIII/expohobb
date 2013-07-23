<?php 

$connect = mysql_connect('localhost','root','');
if (!$connect) { 
    die('Could not connect to MySQL: ' . mysql_error()); 
} 

$cid = mysql_select_db('exphbb',$connect); 
// supply your database name

define('CSV_PATH','C:/wamp/www/expohobb/web/');
// path where your CSV file is located

    $csv_file = CSV_PATH . "mail_uno_test.csv"; // Name of your CSV file
    $csvfile = fopen($csv_file, 'r');
    $theData = fgets($csvfile);
    
    $i = 0;
    echo '<pre>';
    //print_r($theData);
    while (!feof($csvfile)) {
        $csv_data[] = fgets($csvfile, 99999);
        $csv_array = explode(";", $csv_data[$i]);
        $insert_csv = array();
        $insert_csv['mail'] = $csv_array[0];
        $fecha = str_replace("/", "-", $csv_array[1]);
        $insert_csv['fecha'] = date("Y-m-d", strtotime($fecha));
        $insert_csv['estado'] = 'valido';
        $insert_csv['codigo'] = md5($csv_array[0]);
        $query = "
            INSERT INTO registro(id,mail,fecha,estado,codigo) 
            VALUES('','".$insert_csv['mail']."','".$insert_csv['fecha']."','".$insert_csv['estado']."','".$insert_csv['codigo']."')";
        $n=mysql_query($query, $connect );
       // print_r($insert_csv);
        $i++;
    }
    fclose($csvfile);

echo "File data successfully imported to database!!";
mysql_close($connect);
?>
