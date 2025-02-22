<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function contact(Request $request, Response $response){

        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success','Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact',[
        'model' => $contact,

        ]);
    }
    public function home(){
        $params = [
            'name' => 'Marino'
        ];
        return $this->render('home',$params);
    }
    public function handlingContact(Request $request){
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '<pre>';
    }

}