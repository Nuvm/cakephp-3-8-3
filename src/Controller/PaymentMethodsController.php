<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentMethods Controller
 *
 * @property \App\Model\Table\PaymentMethodsTable $PaymentMethods
 *
 * @method \App\Model\Entity\PaymentMethod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentMethodsController extends AppController
{
    /**
     * findCar method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findPaymentMethods() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->PaymentMethods->find('all', array(
                'conditions' => array('PaymentMethods.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $paymentMethods = $this->paginate($this->PaymentMethods);

        $this->set(compact('paymentMethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => ['Payments','Files']
        ]);

        $this->set('paymentMethod', $paymentMethod);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentMethod = $this->PaymentMethods->newEntity();
        if ($this->request->is('post')) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
        }
        $files=$this->PaymentMethods->Files->find('list',['limit' => 200]);
        $this->set(compact('paymentMethod','Files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentMethod = $this->PaymentMethods->get($id, [
            'contain' => ['Files']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMethod = $this->PaymentMethods->patchEntity($paymentMethod, $this->request->getData());
            if ($this->PaymentMethods->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
        }
        $files=$this->PaymentMethods->Files->find('list',['limit' => 200]);
        $this->set(compact('paymentMethod','files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentMethod = $this->PaymentMethods->get($id);
        if ($this->PaymentMethods->delete($paymentMethod)) {
            $this->Flash->success(__('The payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The payment method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $permslvl = $user['permission_level'];
        if (in_array($action, ['add','findPaymentMethods','autocompletedemo'])||$permslvl==2) {
            return true;
        }

        // Toutes les autres actions nécessitent une permission
        if ($permslvl<1) {
            return false;
        }

        return $this->PaymentMethods->user_id === $user['id'];
    }
}
