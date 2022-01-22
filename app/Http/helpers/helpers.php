<?php

use App\User;

use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

function getHindi($text)
{
    //return $text;
    $tr = new GoogleTranslate('hi');

    return $tr->translate($text);
}
