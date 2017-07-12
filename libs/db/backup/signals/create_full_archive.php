
<?php
$zz=array("");/*массив для путей к файлам*/
$not=array();/*массив для исключений*/

/*Название архива*/
$ZipName='last_full_backup.zip';
/*Исключения*/
$not[count($not)]=$ZipName;
$not[count($not)]='io.php';
$not[count($not)]='admin';

wfold('');/*С какой папки тащим*/


function wfold($url){

    global $zz;/*добавляем массивы в функцию*/
    global $not;

    $mm = glob($url ."*");/*в массив список, что в папке*/
    for($i=0;$i<count($mm);$i++){/*Идем по всему массиву*/

        $nn=0;/*Счетчик исключений*/
        for($i2=0;$i2<count($not);$i2++){/*Есть ли он в исключении?*/
            if($mm[$i] == $not[$i2]){$nn=1;}
        }
        if($nn==0){
            if(is_dir($mm[$i])){/*Если это папка*/
                wfold($mm[$i] . '/');/*Рекурсивно запускаем эту же функцию*/
            }else{/*это файл*/
                $zz[count($zz)]=$mm[$i];/*добавляем в массив*/
            }
        }

    }
}

$zip=new ZipArchive();/*Подключаем библиотеку архива*/
if($zip->open($ZipName, ZipArchive::CREATE)!==TRUE){/*Удачное ли создание*/
    exit('CreateZIP[X]');
}
for($i=0;$i<count($zz);$i++){/*Из массива в архив*/
    $zip->addFile($zz[$i]);
}
/*Показ размерности и закрытие*/
echo $ZipName.'[FileKol=' . $zip->numFiles . ';FileSize=';
$zip->close();
echo (filesize($ZipName))/1000000 . 'mb;]';




 function output_file($file,$name)
 {
     //do something on download abort/finish
     //register_shutdown_function( 'function_name'  );
     if(!file_exists($file))
         die('file not exist!');
     $size = filesize($file);
     $name = rawurldecode($name);

     if (ereg('Opera(/| )([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT']))
         $UserBrowser = "Opera";
     elseif (ereg('MSIE ([0-9].[0-9]{1,2})', $_SERVER['HTTP_USER_AGENT']))
         $UserBrowser = "IE";
     else
         $UserBrowser = '';

     /// important for download im most browser
     $mime_type = ($UserBrowser == 'IE' || $UserBrowser == 'Opera') ?
         'application/octetstream' : 'application/octet-stream';
     @ob_end_clean(); /// decrease cpu usage extreme
     header('Content-Type: ' . $mime_type);
     header('Content-Disposition: attachment; filename="'.$name.'"');
     header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header('Accept-Ranges: bytes');
     header("Cache-control: private");
     header('Pragma: private');

     /////  multipart-download and resume-download
     if(isset($_SERVER['HTTP_RANGE']))
     {
         list($a, $range) = explode("=",$_SERVER['HTTP_RANGE']);
         str_replace($range, "-", $range);
         $size2 = $size-1;
         $new_length = $size-$range;
         header("HTTP/1.1 206 Partial Content");
         header("Content-Length: $new_length");
         header("Content-Range: bytes $range$size2/$size");
     }
     else
     {
         $size2=$size-1;
         header("Content-Length: ".$size);
     }
     $chunksize = 1*(1024*1024);
     $bytes_send = 0;
     if ($file = fopen($file, 'r'))
     {
         if(isset($_SERVER['HTTP_RANGE']))
             fseek($file, $range);
         while(!feof($file) and (connection_status()==0))
         {
             $buffer = fread($file, $chunksize);
             print($buffer);//echo($buffer); // is also possible
             flush();
             $bytes_send += strlen($buffer);
             //sleep(1);//// decrease download speed
         }
         fclose($file);
     }
     else
         die('error can not open file');
     if(isset($new_length))
         $size = $new_length;
     die();
 }

output_file('last_full_backup.zip','last_full_backup.zip');
 ?>