<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

class MoneysController extends AppController
{
    public function index()
    {
      $this->set('ajax_name','send_data.js');
    }

    public function add(){

        // $data = $this->Data->newEmptyEntity();
        // $data = $this->Data->patchEntity($data, $this->request->getData());
        $deposit = $this->request->getData('deposit');
        $withdrawal = $this->request->getData('withdrawal');
        $purpose = $this->request->getData('purpose');
        $reason = $this->request->getData('reason');
        $id = $this->request-> getSession()->read('Auth.User.id');
        // $data = $this->request->data('request');
        $connection = ConnectionManager::get('default');
        $connection->insert('moneys',
                             [ 
                                 'deposit' => $deposit,
                                 'withdrawal' => $withdrawal,
                                 'purpose' => $purpose,
                                 'reason' => $reason,
                                 'user_id' => $id ,
                             ]);
      }
      
      public function isAuthorized($user)
      {
          $action = $this->request->getParam('action');
          if (in_array($action, ['add', 'tags'])) {
              return true;
          }
   
          $slug = $this->request->getParam('pass.0');
          if (!$slug) {
              return false;
          }
   
          $article = $this->Articles->findBySlug($slug)->first();
   
          return $article->user_id === $user['id'];
      }
}
