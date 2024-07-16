<?php
namespace app\core;

class Application
{
public static string $ROOT_DIR;
public string $userClass;
public Router $router;
public Request $request;
public Session $session;
public Response $response;
public Database $db;
public ?DbModel $user;

public static Application $app;
public Controller $controller;

public function __construct($rootPath, array $config)
{
$this->userClass = $config['userClass'];
self::$ROOT_DIR = $rootPath;
self::$app = $this;
$this->request = new Request();
$this->response = new Response();
$this->session = new Session();
$this->router = new Router($this->request, $this->response);
$this->db = new Database($config['db']);
$primaryValue = $this->session->get('user'); // number id
if($primaryValue){
    $primaryKey = $this->userClass::PrimaryKey();
    $this->user =$this->userClass::findOne([$primaryKey => $primaryValue]);
}else{
    $this->user = null;
}

}

public function run()
{
echo $this->router->resolve();
}

public function getController(): Controller
{
return $this->controller;
}

public function setController(Controller $controller): void
{
$this->controller = $controller;
}

public function login(DbModel $user)
{
$this->user = $user;
$primaryKey = $user->primaryKey(); //checking id
$primaryValue = $user->{$primaryKey}; //assign number id
$this->session->set('user', $primaryValue);
return true;
}

public function logout()
{
$this->user = null;
$this->session->remove('user');
}
public static function isGuest(){
    return !self::$app->user;

}
}
