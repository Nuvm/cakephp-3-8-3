<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FoodTypes Controller
 *
 * @property \App\Model\Table\FoodTypesTable $FoodTypes
 *
 * @method \App\Model\Entity\FoodType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $foodTypes = $this->FoodTypes->find('list', ['limit' => 200]);
        $foodTypesTest = $this->FoodTypes->find('all', ['limit' => 200]);
        $food_types = $foodTypes->toArray();
        $foodType_id = key($food_types);
        $foods = $this->FoodTypes->Foods->find('list', [
            'conditions' => ['Foods.food_type_id' => $foodType_id],
        ]);
        $foodType = $this->FoodTypes->newEntity();
        $this->set(compact('foods', 'foodTypes', 'foodType', 'foodTypesTest'));
        $this->set(serialize('foodTypes'));
        $this->set(serialize('foodTypesTest'));
    }

    /**
     * View method
     *
     * @param string|null $id Food Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodType = $this->FoodTypes->get($id, [
            'contain' => ['Foods']
        ]);

        $this->set('foodType', $foodType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foodType = $this->FoodTypes->newEntity();
        if ($this->request->is('post')) {
            $foodType = $this->FoodTypes->patchEntity($foodType, $this->request->getData());
            if ($this->FoodTypes->save($foodType)) {
                $this->Flash->success(__('The food type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food type could not be saved. Please, try again.'));
        }
        $foodTypes = $this->FoodTypes->find('list', ['limit' => 200]);
        $food_types = $foodTypes->toArray();
        $foodType_id = key($food_types);
        $foods = $this->FoodTypes->Foods->find('list', [
            'conditions' => ['Foods.food_type_id' => $foodType_id],
        ]);
        $this->set(compact('foods', 'foodTypes', 'foodType'));
        $this->set(serialize('foodTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodType = $this->FoodTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodType = $this->FoodTypes->patchEntity($foodType, $this->request->getData());
            if ($this->FoodTypes->save($foodType)) {
                $this->Flash->success(__('The food type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food type could not be saved. Please, try again.'));
        }
        $this->set(compact('foodType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodType = $this->FoodTypes->get($id);
        if ($this->FoodTypes->delete($foodType)) {
            $this->Flash->success(__('The food type has been deleted.'));
        } else {
            $this->Flash->error(__('The food type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
