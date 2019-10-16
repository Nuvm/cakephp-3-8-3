<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CollectorsLoans Controller
 *
 * @property \App\Model\Table\CollectorsLoansTable $CollectorsLoans
 *
 * @method \App\Model\Entity\CollectorsLoan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CollectorsLoansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Loans', 'Collectors']
        ];
        $collectorsLoans = $this->paginate($this->CollectorsLoans);

        $this->set(compact('collectorsLoans'));
    }

    /**
     * View method
     *
     * @param string|null $id Collectors Loan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $collectorsLoan = $this->CollectorsLoans->get($id, [
            'contain' => ['Loans', 'Collectors']
        ]);

        $this->set('collectorsLoan', $collectorsLoan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $collectorsLoan = $this->CollectorsLoans->newEntity();
        if ($this->request->is('post')) {
            $collectorsLoan = $this->CollectorsLoans->patchEntity($collectorsLoan, $this->request->getData());
            if ($this->CollectorsLoans->save($collectorsLoan)) {
                $this->Flash->success(__('The collectors loan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collectors loan could not be saved. Please, try again.'));
        }
        $loans = $this->CollectorsLoans->Loans->find('list', ['limit' => 200]);
        $collectors = $this->CollectorsLoans->Collectors->find('list', ['limit' => 200]);
        $this->set(compact('collectorsLoan', 'loans', 'collectors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Collectors Loan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $collectorsLoan = $this->CollectorsLoans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $collectorsLoan = $this->CollectorsLoans->patchEntity($collectorsLoan, $this->request->getData());
            if ($this->CollectorsLoans->save($collectorsLoan)) {
                $this->Flash->success(__('The collectors loan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The collectors loan could not be saved. Please, try again.'));
        }
        $loans = $this->CollectorsLoans->Loans->find('list', ['limit' => 200]);
        $collectors = $this->CollectorsLoans->Collectors->find('list', ['limit' => 200]);
        $this->set(compact('collectorsLoan', 'loans', 'collectors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Collectors Loan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $collectorsLoan = $this->CollectorsLoans->get($id);
        if ($this->CollectorsLoans->delete($collectorsLoan)) {
            $this->Flash->success(__('The collectors loan has been deleted.'));
        } else {
            $this->Flash->error(__('The collectors loan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
