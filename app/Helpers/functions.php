<?php


function formataData($data, $format = 'd/m/Y H:i')
{
    return !empty($data) ? date($format, strtotime(str_replace('/', '-', $data))) : null;
}

function formataWhereLike($nome){
    return "%".mb_strtoupper(str_replace(' ', '%', trim($nome)))."%";
}