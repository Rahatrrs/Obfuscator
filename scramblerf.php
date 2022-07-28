<?php
function displayKey($key){
    
    
        printf (" value = '%s'", $key);
    
}
function scrambleData($originalData,$key){
    $originalKey= 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';
    $length= strlen($originalData);
    for($i=0;$i<$length;$i++){
        $curretChar = $originalData[$i];
        $position = strpos($originalKey,$curretChar);
        if($position !== false){
            $data .= $key[$position];
        }else{
            $data .=$curretChar;
        }
    }
    return $data;
}
function decodeData($originalData,$key){
    $originalKey= 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';
    $length= strlen($originalData);
    for($i=0;$i<$length;$i++){
        $curretChar = $originalData[$i];
        $position = strpos($key,$curretChar);
        if($position !== false){
            $data .= $originalKey[$position];
        }else{
            $data .=$curretChar;
        }
    }
    return $data;
}