<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CollectorsLoans Model
 *
 * @property \App\Model\Table\LoansTable&\Cake\ORM\Association\BelongsTo $Loans
 * @property \App\Model\Table\CollectorsTable&\Cake\ORM\Association\BelongsTo $Collectors
 *
 * @method \App\Model\Entity\CollectorsLoan get($primaryKey, $options = [])
 * @method \App\Model\Entity\CollectorsLoan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CollectorsLoan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CollectorsLoan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectorsLoan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CollectorsLoan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CollectorsLoan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CollectorsLoan findOrCreate($search, callable $callback = null, $options = [])
 */
class CollectorsLoansTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('collectors_loans');
        $this->setDisplayField('loan_id');
        $this->setPrimaryKey(['loan_id', 'collector_id']);

        $this->belongsToMany('Loans', [
            'foreignKey' => 'loan_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Collectors', [
            'foreignKey' => 'collector_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['loan_id'], 'Loans'));
        $rules->add($rules->existsIn(['collector_id'], 'Collectors'));

        return $rules;
    }
}
