<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Email;

class EmailsController extends AppController{
    public function index(){
        $user_uuid = '';
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $user_uuid;

        $email = new Email('default');
        $email->setTo('nuvmyt@gmail.com')->setSubject('Essai de CakePHP Mailer')->send($confirmation_link);
    }
}
