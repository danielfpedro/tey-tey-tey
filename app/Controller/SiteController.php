<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

App::uses('Folder', 'Utility');
App::uses('WideImage', 'Lib/WideImage/lib');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	public $layout = 'Site/default';

	public $components = array('Paginator', 'DataUtil');

	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
		public function beforeFilter() {
			parent::beforeFilter();
			$this->_checkLogin();
		}
	

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

		for ($i=0; $i < 3; $i++) { 
			# code...
		}
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

		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = 2;

		$estabelecimento = $this->Estabelecimento->find(
			'first',
			array('conditions'=> array('ativo'=> 1,'Estabelecimento.slug'=> $slug))
		);
		if (empty($estabelecimento)) {
			throw new NotFoundException('Este estabelecimento não existe.');
		}

		if ($this->request->is('post')) {
			if ($this->Session->read('Auth.flag')) {
				$this->request->data['Comentario']['usuario_id'] = $this->auth_user_id;
				$this->request->data['Comentario']['texto'] = $this->request->data['Comentario']['comentario'];
				
				$this->Comentario->create();
				if ($this->Comentario->save($this->request->data)) {
					$this->Session->setFlash(__('O <strong>comentario</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				} else {
					$this->Session->setFlash(__('O <strong>comentario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('Você precisa estar logado para fazer um comentário.'), 'default', array('class'=> 'alert alert-danger'));
			}
			return $this->redirect($this->referer());
		}
		

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
					'Estabelecimento.slug','Estabelecimento.rate'
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
				$data_fake = $this->DataUtil->setPadrao($this->request->data['Perfil']['data_nascimento']);
				if (!strtotime($data_fake)) {
					$this->Session->setFlash(__('A data de nascimento não foi informada corretamente.'), 'default', array('class'=> 'alert alert-danger'));
				} else {
					$this->request->data['Perfil']['data_nascimento'] = $data_fake;

					$this->request->data['Usuario']['token_ativacao'] = String::uuid();
					
					$email = $this->request->data['Usuario']['email'];
					$senha = $this->request->data['Usuario']['senha'];

					$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
					$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
						$this->request->data['Usuario']['senha']
						);
					$this->Usuario->create();
					if ($this->Usuario->save($this->request->data)) {
						if (!empty($this->request->data)) {
							$this->request->data['Perfil']['usuario_id'] = $this->Usuario->id;
							if ($this->Usuario->Perfil->save($this->request->data)) {
								//Debugger::dump($senha);
								if($this->_logar($email, $senha)){
									$this->Session->setFlash(__('Cadastro feito com sucesso.'), 'default', array('class'=> 'alert alert-success'));
									$this->redirect(array('controller'=> 'site', 'action'=> 'home'));
								} else {
									$this->Session->setFlash(__('Ocorreu um erro ao logar.'), 'default', array('class'=> 'alert alert-danger'));
									$this->redirect(array('controller'=> 'site', 'action'=> 'home'));
								}
							} else {
								$this->Session->setFlash(__('O <strong>cadastro</strong> não pode ser salva. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
							};
						}
					} else {
						$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
					}					

				}
			}
		}
	}

	public function meusDados() {
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$this->set(compact('widget_estabelecimentos'));

		if ($this->Session->read('Auth.flag')) {
			$erro = 0;
			$erro_desc = array();
			$this->loadModel('Usuario');
			
			if ($this->request->is(array('post', 'put'))) {
				if ($this->request->data['Perfil']['imagem']['error'] == 4) {
					unset($this->request->data['Perfil']['imagem']);
				} else {
					$image_array = $this->request->data['Perfil']['imagem'];
					if ($image_array['error'] == 0) {
						if ($image_array['type'] != 'image/jpeg' AND $image_array['type'] != 'image/png') {
							$erro_desc[] = 'A imagem deve estar no formato JPG ou PNG.';
							$erro = 1;
						}
						if ($image_array['size'] > 1000000) {
							$erro_desc[] = 'A imagem não pode ser maior que 1MB.';
							$erro = 1;
						}
					} elseif ($image_array['error'] == 2) {
						$erro_desc[] = 'O arquivo ultrapassou o limite do servidor';
						$erro = 1;
					} else {
						$erro_desc[] = 'Ocorreu um erro no upload da sua imagem';
						$erro = 1;
					}

					if ($erro == 0) {
						$this->request->data['Perfil']['imagem'] = $this->request->data['Perfil']['imagem']['name'];
					}
				}
				if (!empty($this->request->data['Usuario']['nova_senha'])) {
					if ($this->request->data['Usuario']['nova_senha'] != $this->request->data['Usuario']['repetir_senha']) {
						$erro_desc[] = 'Você não repetiu a nova senha corretamente.';
						$erro = 1;
					} else {
						if (!empty($this->request->data['Usuario']['senha_fake'])) {
							$senha = $this->Usuario->find('first',
								array('conditions'=> array(
									'Usuario.id'=> $this->auth_user_id
								)));

							$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
							$senha_fake = $passwordHasher->hash(
								$this->request->data['Usuario']['senha_fake']);

							if ($senha['Usuario']['senha'] != $senha_fake) {
								$erro_desc[] = 'Você não informou a sua senha atual corretamente.';
								$erro = 1;
							} else {
								$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
								$nova_senha = $passwordHasher->hash(
									$this->request->data['Usuario']['nova_senha']);

								$this->request->data['Usuario']['senha'] = $nova_senha;
							}
						} else {
							$erro_desc[] = 'Para fazer a alteração da senha você deve informar a sua senha atual.';
							$erro = 1;
						}
					}

				}
				$data_fake = $this->DataUtil->setPadrao($this->request->data['Perfil']['data_nascimento']);
				if (!strtotime($data_fake)) {
					$erro_desc[] = 'A data de nascimento não foi informada corretamente.';
					$erro = 1;
				}
				if ($erro == 0) {
					$this->request->data['Perfil']['data_nascimento'] = $data_fake;
					$this->request->data['Usuario']['id'] = $this->auth_user_id;
					// Debugger::dump($this->request->data);
					// exit();
					if ($this->Usuario->save($this->request->data)) {
						$this->request->data['Perfil']['id'] = $this->auth_perfil_id;
						$this->request->data['Perfil']['usuario_id'] = $this->auth_user_id;
						//Debugger::dump($this->request->data['Perfil']);
						if ($this->Usuario->Perfil->save($this->request->data['Perfil'])) {
							
							$this->Session->write('Auth.nome', $this->request->data['Perfil']['name']);
							if (isset($this->request->data['Perfil']['imagem'])) {
								$this->Session->write('Auth.imagem', $this->request->data['Perfil']['imagem']);
								
								$image = WideImage::load($image_array['tmp_name']);
								$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Usuarios/' . $this->auth_user_id, true, 0755);
						
								$image
									->resize(60, 60, 'outside')
									->crop('center', 'center', 60, 60)
									->saveToFile($pasta_salvar->path . DS . $image_array['name'], 85);
							}

							$this->Session->setFlash(__('Os seus dados foram salvos corretamente.'), 'default', array('class'=> 'alert alert-success'));
							return $this->redirect($this->referer());
						}
					} else {
						$this->request->data['Usuario']['senha'] = '';
						$this->request->data['Usuario']['nova_senha'] = '';
						$this->request->data['Usuario']['repetir_senha'] = '';
						$this->Session->setFlash(__('Ocorreu um erro ao salvar os seus dados.'), 'default', array('class'=> 'alert alert-danger'));
					}
				} else {
					$this->Session->setFlash(join('<br>', $erro_desc), 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$usuario = $this->Usuario->find('first', array('conditions'=> array('Usuario.id'=> $this->auth_user_id)));
			
				$this->request->data = $usuario;

				$this->request->data['Perfil']['data_nascimento'] = $this->DataUtil->reverse($this->request->data['Perfil']['data_nascimento']);

				$this->request->data['Usuario']['senha'] = '';

				$this->set(compact('usuario'));
			}
		} else {
			return $this->redirect(array('controller'=> 'site','action'=> 'home'));
		}

		$title_for_layout = 'Meus dados' . $this->site_name;
		$this->set(compact('title_for_layout'));
	}

	public function _checkLogin(){
		if ($this->Session->read('Auth.flag')) {
			$auth_flag = true;
			$auth_user_id = $this->Session->read('Auth.user_id');
			$auth_nome = $this->Session->read('Auth.nome');
			$auth_perfil_id = $this->Session->read('Auth.perfil_id');
			$auth_imagem = $this->Session->read('Auth.imagem');

			$this->auth_user_id = $auth_user_id;
			$this->auth_nome = $auth_nome;
			$this->auth_perfil_id = $auth_perfil_id;
			$this->auth_imagem = $auth_imagem;

			$this->set(compact('auth_flag','auth_user_id', 'auth_nome', 'auth_imagem'));
		} else {
			$this->set('auth_flag', false);
		}
	}

	public function _logar($login = null, $senha = null) {
		if (is_null($login) OR is_null($senha)) {
			return false;
		}
		$this->loadModel('Usuario');
		$this->Usuario->recursive = 1;
		
		$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
		
		$senha = $passwordHasher->hash(
			$senha);
		
		$usuario = $this->Usuario->find('first',
			array(
				'conditions'=> array(
					'Usuario.email'=> $login,
					'Usuario.senha'=> $senha
				)
			)
		);

		if (!empty($usuario)) {
			$this->_loginSession($usuario);
			$this->_checkLogin();
			return true;
		} else {
			return false;	
		}
	}

	public function _loginSession($usuario){
		$this->Session->write('Auth.flag', true);
		$this->Session->write('Auth.user_id', $usuario['Usuario']['id']);
		$this->Session->write('Auth.nome', $usuario['Perfil']['name']);
		$this->Session->write('Auth.perfil_id', $usuario['Perfil']['id']);
		$this->Session->write('Auth.imagem', $usuario['Perfil']['imagem']);
	}

	public function login(){
		if ($this->request->is(array('post'))) {
			if($this->_logar($this->request->data['Usuario']['email'], $this->request->data['Usuario']['senha'])) {
				return $this->redirect(array('controller'=> 'site', 'action'=> 'home'));
			} else {
				$this->request->data['Usuario']['senha'] = '';
				$this->Session->setFlash(
					__('A combinação login/senha está incorreta.'),
					'default',
					array('class'=> 'alert alert-danger'));
			}
		}
	}
	public function logout(){
		$this->Session->destroy();
		return $this->redirect(array('controller'=> 'site', 'action'=> 'home'));
	}
}
