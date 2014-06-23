<?php
App::uses('AppModel', 'Model');

/**
 * Perfil Model
 *
 * @property Usuario $Usuario
 */
class Perfil extends AppModel {

	public $actsAs = array('Containable');

	public function beforeSave($options = array()) {

		// Se nao upou imagem ele unseta
		if (isset($this->data['Perfil']['imagem'])) {
			if ($this->data['Perfil']['imagem']['error'] > 0) {
				unset($this->data['Perfil']['imagem']);
			} else {
				$this->data['Perfil']['imagem'] = $this->data['Perfil']['imagem']['name'];
			}
			
		}

		$dt = explode('/', $this->data['Perfil']['data_nascimento']);
		$this->data['Perfil']['data_nascimento'] = $dt[2] .  '-' . $dt[1] . '-' . $dt[0];
    }

	public function isUniqueOnUpdate($fields) {
		$options['conditions'] = array(
			'Perfil.apelido'=> $fields['apelido'],
			'Perfil.apelido !='=> $this->data['Perfil']['apelido_antigo']
		);
		$check = $this->find('count', $options);
		return ($check == 0) ? true : false;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'O nome deve ser informado.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apelido' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'O apelido deve ser informado.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este apelido já está em uso.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'uniqueOnUpdate' => array(
				'rule' => array('isUniqueOnUpdate'),
				'message' => 'Este apelido já está em uso.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		),
		'usuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'ID do usuário não informado',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'data_nascimento' => array(
			'data_valida' => array(
				'rule' => array('date', 'dmy'),
				'message' => 'Data de nascimento inválida.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cidade' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A cidade deve ser informada.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
