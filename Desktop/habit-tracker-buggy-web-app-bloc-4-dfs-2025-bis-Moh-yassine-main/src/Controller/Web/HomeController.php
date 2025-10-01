<?php

namespace App\Controller\Web;

use Mns\Buggy\Core\AbstractController;

final class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('web/home/index.html.php', [
            'title' => 'Home Page',
        ]);
    }
}