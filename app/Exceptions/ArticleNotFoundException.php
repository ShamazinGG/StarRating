<?php

namespace App\Exceptions;

use Exception;

class ArticleNotFoundException extends Exception
{
    public function report()
    {
        //
    }

    public function render($request)
    {
        return view('article.notfound');
    }
}
