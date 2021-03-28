<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

class MoneysController extends AppController
{
    public function index()
    {

        $reason = array(1 =>'給料',2 =>'その他');
        $this->set(compact('reason'));
    }
    public function get()
    {
        //ログインしているユーザーのデータを取得
        $data = $this->Moneys->find('all', ['conditions' => ['user_id' => $this->request->getSession()->read('Auth.User.id')]]);
        $this->set([
          'data' => $data,
          '_serialize' => ['data'],
      ]);
    }

    public function add(){
        $deposit = $this->request->getData('deposit');//入金
        $withdrawal = $this->request->getData('withdrawal');//出金
        $purpose = $this->request->getData('purpose');//使用用途
        $reason = $this->request->getData('reason');//収入理由
        $totalLastMoney = $this->Moneys->find('all', ['conditions' => ['user_id' => $this->request->getSession()->read('Auth.User.id')]])->last();
        $total = $totalLastMoney->total;
        $id = $this->request-> getSession()->read('Auth.User.id');

        if($this->request->getData('type') === "0"){
            $total = $total + $deposit;
        }elseif($this->request->getData('type') === "1"){
            $total = $total  - $withdrawal;
        }else{
            $this->set('messege', ['result'=>'不正なデータが入力されました']);
            $this->viewBuilder()->setOption( 'serialize', ['messege'] );
            return;
        }

        $connection = ConnectionManager::get('default');
        $connection->insert('moneys',
                             [
                                 'deposit' => $deposit,
                                 'withdrawal' => $withdrawal,
                                 'purpose' => $purpose,
                                 'reason' => $reason,
                                 'total' => $total,
                                 'user_id' => $id ,
                             ]);
      }
      public function isAuthorized($user)
      {
          $action = $this->request->getParam('action');
          if (in_array($action, ['add', 'index','get'])) {
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
