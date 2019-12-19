<?php

namespace App\Controller\Api;

class CollectorsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $collectors = $this->Collectors->find('all');
        $this->set([
            'collectors' => $collectors,
            '_serialize' => ['collectors']
        ]);
    }

    public function view($id)
    {
        $collector = $this->Collectors->get($id);
        $this->set([
            'collector' => $collector,
            '_serialize' => ['collector']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $collector = $this->Collectors->newEntity($this->request->getData());
        if ($this->Collectors->save($collector)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'collector' => $collector,
            '_serialize' => ['message', 'collector']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $collector = $this->Collectors->get($id);
        $collector = $this->Collectors->patchEntity($collector, $this->request->getData());
        if ($this->Collectors->save($collector)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $collector = $this->Collectors->get($id);
        $message = 'Deleted';
        if (!$this->Collectors->delete($collector)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
