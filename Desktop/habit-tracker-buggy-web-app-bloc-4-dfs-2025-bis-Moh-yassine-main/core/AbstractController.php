<?php
namespace Mns\Buggy\Core;

abstract class AbstractController
{
        
    /**
     * Cette méthode permet d'afficher le résulat d'une Vue
     *
     * @param  mixed $template
     * @param  mixed $data
     * @return void
     */
    public function render(string $template, array $data = []): void
    {
        extract($data);
        ob_start();
        include '../templates/' . $template;
        $bodyContent = ob_get_clean();

        if(isset($layout))
            include '../templates/' . $layout;
        else
            echo $bodyContent;
    }

    public function json(array $data)
    {
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function redirect(string $url, array $data = [])
    {
        $_SESSION['redirect_data'] = $data;
        header("Location: $url");
        exit;
    }
}