<?php
namespace App\Controller;

use Mns\Buggy\Core\AbstractController;

class ErrorController extends AbstractController
{

   public function notFound()
   {
        return $this->render('error/404.html.php');
   }
}