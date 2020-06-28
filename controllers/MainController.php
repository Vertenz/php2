<?php


namespace app\controllers;


class MainController {
    protected $defaultAction = 'index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'html';

    public function runAction($action = null) {
        $action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($action);
        if(method_exists($this, $method)) {
            $this->$method();
        }else {
            echo "Not find <br> 404";
        }
    }
    protected function render($template, $params = []) {
        $content = $this->renderTemplate($template, $params);
        if($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                ['content' => $content]
            );
        }
        return $content;
    }

    protected function renderTemplate($template, $params = []) {
        ob_start();
        $templatePath = PATH_VIEWS . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }

}