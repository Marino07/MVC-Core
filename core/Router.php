<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path,$callback){
        $this->routes['get'][$path] = $callback;

    }
    public function post($path,$callback){
        $this->routes['post'][$path] = $callback;

    }

    public function resolve(){
        $path =$this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatuscode(404);
            return $this->renderView("_404");
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }

        return call_user_func($callback); // poziva funkciju 'Contact' na osnovu stringa koji je funkcijs

    }
    public function renderView($view){
        $viewContent = $this->renderOnlyView($view);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent,$layoutContent);

    }
    public function renderContent($viewContent){
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent,$layoutContent);

    }

    protected function layoutContent()
    {
        ob_start(); // start buff
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean(); // catch content


    }
    protected function renderOnlyView($view){
        ob_start(); // start buff
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean(); // catch content

    }



}
