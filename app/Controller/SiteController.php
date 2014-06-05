<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	
	public $layout = 'Site/default';

	public $components = array('Paginator', 'DataUtil');

	public function home() {
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$this->set(compact('widget_estabelecimentos'));

		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = 3;

		$options = array();

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 1);
		$boate = $this->Estabelecimento->find('first', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 2);
		$restaurante = $this->Estabelecimento->find('first', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 3);
		$bar = $this->Estabelecimento->find('first', $options);

		$destaques[0] = $boate;
		$destaques[1] = $restaurante;
		$destaques[2] = $bar;

		$title_for_layout = $this->site_name;

		$this->set(compact('destaques', 'title_for_layout'));


	}

	public $paginate = array(
		'Estabelecimento'=> array(
			'limit'=> 10,
			'fields'=> array(
				'Estabelecimento.id',
				'Estabelecimento.name',
				'Estabelecimento.descricao',
				'Estabelecimento.slug',
				'Estabelecimento.rate',
				'Estabelecimento.imagem',
			),
			'contain'=> 'Comentario'
			)
	);

	public function preview(){
		$this->layout = 'Site/preview';

		$title_for_layout = $this->site_name;

		$this->set(compact('title_for_layout'));

	}

	public function _getWidgetEstabelecimentos(){
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = 3;
		// 1 Boate, 2 - Restaurante, 3 - Bar
		$options = array();

		$estabelecimentos = array();

		$restaurantes = array();
		$bares = array();
		$baladas = array();
		$recentes = array();

		$options['contain'] = array('Categoria');
		$options['limit'] = 5;

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 2);
		$restaurantes = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 1);
		$baladas = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 3);
		$bares = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array();
		$options['order'] = array('Estabelecimento.created DESC');
		$recentes = $this->Estabelecimento->find('all', $options);

		$estabelecimentos['restaurantes'] = $restaurantes;
		$estabelecimentos['bares'] = $bares;
		$estabelecimentos['baladas'] = $baladas;
		$estabelecimentos['recentes'] = $recentes;

		// Debugger::dump($estabelecimentos['restaurantes']);

		return $estabelecimentos;
	}

	public function mais_comentarios() {
		$this->loadModel('Comentario');
		$this->Comentario->recursive = 3;

		$estabelecimento = $this->request->data['estabelecimento'];
		$page = $this->request->data['page'];
		$limit = $this->Comentario->perfil_limit;

		$offset = $page * $limit;

		$comentarios = $this->Comentario->find('all', array(
			'conditions'=> array(
				'Comentario.ativo'=> 1,
				'Comentario.estabelecimento_id'=> $estabelecimento),
			'limit'=> $limit,
			'offset'=> $offset,
			'order'=> 'Comentario.created DESC'));

		$comentarios = json_encode($comentarios);
		echo $comentarios;

		$this->autoRender = false;
	}
	public function perfil($slug = null) {
		$this->loadModel('Comentario');

		if ($this->request->is('post')) {
			$this->Comentario->create();
			$this->request->data['Comentario']['usuario_id'] = 1;
			$this->request->data['Comentario']['texto'] = $this->request->data['Comentario']['comentario'];

			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>comentario</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
			} else {
				$this->Session->setFlash(__('O <strong>comentario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
			return $this->redirect($this->referer());
		}
		
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = 2;

		// $this->loadModel('Comentario');
		// $this->Comentario->recursive = 3;

		//Conta comentarios por que ele só exibe 10 mas precisa exibir também quantos tem ao todo
		// $comentarios_count = $this->Comentario->find('count', array('conditions'=> array('Comentario.ativo'=> 1)));

		$estabelecimento = $this->Estabelecimento->find(
			'first',
			array('conditions'=> array('Estabelecimento.slug'=> $slug))
		);

		$this->loadModel('Comentario');
		$this->Comentario->recursive = 3;
		$comentarios = $this->Comentario->find('all', array(
			'conditions'=> array(
				'Comentario.ativo'=> 1,
				'Comentario.estabelecimento_id'=> $estabelecimento['Estabelecimento']['id']),
			'limit'=> $this->Comentario->perfil_limit,
			'order'=> array('Comentario.created DESC'))
		);

		$comentarios_count = $this->Comentario->find('count',
			array(
				'conditions'=> array(
					'Comentario.ativo'=> 1,
					'Comentario.estabelecimento_id'=> $estabelecimento['Estabelecimento']['id'])));

		$show_paginator = ($comentarios_count > $this->Comentario->perfil_limit)? true : false;

		if (!empty($estabelecimento)) {
			$title_for_layout = $estabelecimento['Estabelecimento']['name'] .' - ' . $this->site_name;

			$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
			$this->set(compact(
				'show_paginator',
				'title_for_layout',
				'estabelecimento', 'widget_estabelecimentos', 'comentarios', 'comentarios_count'));

			//Debugger::dump($estabelecimento['Comentario'][0]['Usuario']['Perfil']);
		} else {
			throw new NotFoundException('Este estabelecimento não existe.');
		}
	}

	public function estabelecimentos($categoria = null){
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = -1;
		$this->Estabelecimento->Categoria->recursive = -1;
		$categoria_row = $this
			->Estabelecimento
			->Categoria
			->find('first',
				array(
					'fields'=> array(
						'Categoria.id'
					),
					'conditions'=> array(
						'Categoria.slug'=> $categoria
					)
				)
			);
		if (!empty($categoria_row)) {

			$title_for_layout = ucfirst($categoria) .' - ' . $this->site_name;

			$this->Paginator->settings = $this->paginate;

			$this->Paginator->settings = array(
				'fields'=> array(
					'Estabelecimento.name', 'Estabelecimento.imagem', 'Estabelecimento.descricao', 
					'Estabelecimento.slug',
				),
				'contain'=> array(
					'Comentario'=> array('fields'=> array('Comentario.id'))
				),
				'conditions'=> array(
					'Estabelecimento.categoria_id'=> $categoria_row['Categoria']['id']));

	    	$estabelecimentos = $this->Paginator->paginate('Estabelecimento');
			$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
			//Debugger::dump($estabelecimentos);
			$this->set(compact('estabelecimentos','widget_estabelecimentos','categoria', 'title_for_layout'));
		} else {
			throw new NotFoundException('Esta categoria não existe não existe.');
		}
	}

	public function contato(){
		$title_for_layout = 'Contato - ' . $this->site_name;

		if ($this->request->is('post')) {
			$this->loadModel('Contato');
			$this->Contato->create();
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('Mensagem enviada com sucesso.'), 'default', array('class'=> 'alert alert-success'));
			} else {
				$this->Session->setFlash(__('Mensagem não enviada. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
			return $this->redirect($this->referer());
		} else {
			$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
			$this->set(compact('widget_estabelecimentos'));
		}
		$this->set(compact('title_for_layout'));
	}

	public function cadastro(){
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$title_for_layout = 'Cadastro de usuário - ' . $this->site_name;
		
		$this->set(compact('widget_estabelecimentos','title_for_layout'));

		$this->loadModel('Usuario');
		if ($this->request->is('post')) {
			if ($this->request->data['Usuario']['repetir_senha'] != $this->request->data['Usuario']['senha']) {
				$this->Session->setFlash(
					'Você não repetiu a senha corretamente',
					'default',
					array('class'=> 'alert alert-danger'));
			} else {
				
				$this->request->data['Perfil']['data_nascimento'] = $this->DataUtil->setPadrao($this->request->data['Perfil']['data_nascimento']);
				if (!strtotime($this->request->data['Perfil']['data_nascimento'])) {
					$this->Session->setFlash(__('A data de nascimento não foi informada corretamente.'), 'default', array('class'=> 'alert alert-danger'));
				} else {
					$this->request->data['Usuario']['token_ativacao'] = String::uuid();
					$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
						$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
						$this->request->data['Usuario']['senha']
					);
					$this->Usuario->create();
					if ($this->Usuario->save($this->request->data)) {
						if (!empty($this->request->data)) {
							$this->request->data['Perfil']['usuario_id'] = $this->Usuario->id;
							if ($this->Usuario->Perfil->save($this->request->data)) {
								$this->Session->setFlash(__('Cadastro feito com sucesso.'), 'default', array('class'=> 'alert alert-success'));
							} else {
								$this->Session->setFlash(__('O <strong>cadastro</strong> não pode ser salva. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
							};
						}
					} else {
						$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
					}					

				}
			}
			$this->redirect(array('controller'=> 'site', 'action'=> 'home'));
		}

	}
}
