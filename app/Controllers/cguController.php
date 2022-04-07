<?php

namespace App\Controllers;

class cguController extends BaseController
{
    public function showMentionLegal()
    {
        return view('/legal/mentionLegal');
    }
    public function showviePrivee()
    {
        return view('/legal/viewPrivee');
    }
    public function showcgu()
    {
        return view('/legal/cgu');
    }
}
