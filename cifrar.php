<?php
if(!isset($_GET["data"]) || !isset($_GET["txt"]) || !isset($_GET["sec"])){
    echo 'Parametros Invalidos';
}else{
    $data=$_GET["data"];
    $txt=$_GET["txt"];
    $sec=$_GET["sec"];

    $num_saida='';
    $saida='';
    $letter_array=array('a','b','c','d','e','f','g','h','i','j','k','l','m',
    'n','o','p','q','r','s','t','u','v','w','x','y','z');

    $myfile = fopen($txt, "r") or die("Unable to open file!");
    $file_txt=fread($myfile,filesize($txt));
    fclose($myfile);

    echo $file_txt.'<br>';

    $nova_data=str_replace("/", "", $data);
    echo $nova_data;
    echo '<hr>';
    $array_data = str_split($nova_data);
    $array = str_split($file_txt);
    $counter=-1;
    foreach ($array as $char) {
        if($char!=' '){
            ++$counter;
            $rep_counter=$counter%6;
            $num=$array_data[$rep_counter];
            $num_saida.=$num;
            $nova_letra=array_search($char,$letter_array);
            $nova_letra=$letter_array[($nova_letra+$num)%26];
            
        }else{
            $num=' ';
            $num_saida.=$num;
            $nova_letra=' ';
        }
        $saida.=$nova_letra;
        echo $char.' / '.$num.' / '.$nova_letra.'<br>';
        
    }
    echo '<hr>';
    echo $num_saida.'<br>';
    echo $saida;
}
?>