<?php

function toRupiah($expression)
{
    $rp = number_format($expression, 0, ',', '.');
    return "Rp. " . $rp;
}

function getDateOnly($dateTime)
{
    $timestamp = (strtotime($dateTime));
    return date('Y-m-d', $timestamp);
}

function getTimeOnly($dateTime, $format)
{
    $timestamp = (strtotime($dateTime));
    return date($format, $timestamp);
}

function errorMsg($msg)
{
    return [
        'title' => "Error",
        'status' => "error",
        'msg' => $msg
    ];
}
