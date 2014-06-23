<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

App::uses('WideImage', 'Lib/WideImage/lib');

App::uses('Folder', 'Utility');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	public $layout = 'Site/default';

	public $components = array('Paginator', 'DataUtil', 'Cookie', 'Session');

	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->_checkLogin();
	}

	public function _checkLogin(){
		$flag = $this->Cookie->read('Auth');
		if (!empty($flag)) {
			$auth_custom = array(
				'id'=> $this->Cookie->read('Auth.user_id'),
				'nome'=> $this->Cookie->read('Auth.nome'),
				'email'=> $this->Cookie->read('Auth.email'),
				'apelido'=> $this->Cookie->read('Auth.apelido'),
				'perfil_id'=> $this->Cookie->read('Auth.perfil_id'),
				'imagem'=> $this->Cookie->read('Auth.imagem')
			);

			$this->auth_custom = $auth_custom;
			//Debugger::dump($auth_custom);

			$this->set(compact('auth_custom'));
		}
	}
	

	public function home() {
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$this->set(compact('widget_estabelecimentos'));

		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = -1;
		$options = array();

		$options['fields'] = array(
			'Estabelecimento.id',
			'Estabelecimento.name', 'Estabelecimento.imagem_300x170',
			'Estabelecimento.slug', 'Estabelecimento.rate', 'Estabelecimento.descricao',
			'Categoria.name',
		);
		$options['contain'] = array('Categoria');

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 1);
		$boate = $this->Estabelecimento->find('first', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 2);
		$restaurante = $this->Estabelecimento->find('first', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 3);
		$bar = $this->Estabelecimento->find('first', $options);


		$options['fields'] = array(
			'Estabelecimento.id',
			'Estabelecimento.name', 'Estabelecimento.imagem_540x390',
			'Estabelecimento.slug',
		);
		$options['conditions'] = array('Estabelecimento.ativo'=> 1, 'Estabelecimento.carrossel'=> 1);
		$options['limit'] = 5;
		$options['contain'] = array();
		$carrossel = $this->Estabelecimento->find('all', $options);

		$destaques[0] = $boate;
		$destaques[1] = $restaurante;
		$destaques[2] = $bar;

		$title_for_layout = $this->site_name;

		$this->set(compact('carrossel','destaques', 'title_for_layout'));


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
		$this->Estabelecimento->recursive = -1;
		// 1 Boate, 2 - Restaurante, 3 - Bar
		$options = array();

		$estabelecimentos = array();

		$restaurantes = array();
		$bares = array();
		$baladas = array();
		$recentes = array();

		$options['contain'] = array('Categoria');
		$options['limit'] = 5;

		$options['conditions'] = array('Estabelecimento.ativo'=> 1 ,'Estabelecimento.categoria_id'=> 2);
		$restaurantes = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.ativo'=> 1, 'Estabelecimento.categoria_id'=> 1);
		$baladas = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.ativo'=> 1, 'Estabelecimento.categoria_id'=> 3);
		$bares = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.ativo'=> 1);
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
			if ($this->auth_user_id) {
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
					'Estabelecimento.name', 'Estabelecimento.imagem_300x170', 'Estabelecimento.descricao', 
					'Estabelecimento.slug','Estabelecimento.rate'
				),
				'contain'=> array(
					'Comentario'=> array(
						'conditions'=> array('Comentario.ativo'=> 1),
						'fields'=> array('Comentario.id'))
				),
				'conditions'=> array(
					'Estabelecimento.ativo'=> 1,
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

	public function _validationUsuarioErrorsToList($errors) {
		$retorno = '';
		$retorno .= (!empty($errors['Perfil']['name'])) ? join('<br>', $errors['Perfil']['name']) . '<br>': '';
		$retorno .= (!empty($errors['email'])) ? join('<br>', $errors['email']) . '<br>': '';
		$retorno .= (!empty($errors['Perfil']['apelido'])) ? join('<br>', $errors['Perfil']['apelido']) . '<br>': '';
		$retorno .= (!empty($errors['Perfil']['data_nascimento'])) ? join('<br>', $errors['Perfil']['data_nascimento']) . '<br>': '';
		$retorno .= (!empty($errors['Perfil']['cidade'])) ? join('<br>', $errors['Perfil']['cidade']) . '<br>': '';
		$retorno .= (!empty($errors['senha'])) ? join('<br>', $errors['senha']) . '<br>': '';
		return $retorno;
	}

	public function cadastro(){
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$title_for_layout = 'Cadastro de usuário - ' . $this->site_name;
		
		$this->set(compact('widget_estabelecimentos','title_for_layout'));

		if ($this->request->is('post')) {
			$this->loadModel('Usuario');
			$this->Usuario->recursive = -1;

			// $this->Usuario->create();
			$senha = $this->request->data['Usuario']['senha'];
			if ($this->Usuario->saveAll($this->request->data, array('validate'=> 'only'))) {
				if ($this->Usuario->saveAll($this->request->data, array('validate'=> false))) {
					if ($this->_logar($this->request->data['Usuario']['email'], $senha)) {
						$this->Session->setFlash('Usuário salvo com sucesso!', 'default', array('class'=> 'alert alert-success'));
						return $this->redirect(array('controller'=> 'site', 'action'=> 'home'));
					} else {
						$this->Session->setFlash('Ocorreu um erro ao logar!', 'default', array('class'=> 'alert alert-danger'));
					}
				}
			} else {
				$errors = $this->_validationUsuarioErrorsToList($this->Usuario->validationErrors);
				$this->Session->setFlash($errors, 'default', array('class'=> 'alert alert-danger'));
			}


			//Valida se email já existe;
			// $options = array();
			// $options['fields'] = array('Usuario.email');
			// $options['conditions'] = array('Usuario.email'=> $this->request->data['Usuario']['email']);
			// $usuario = $this->Usuario->find('first', $options);
			// if (!empty($usuario)) {
			// 	if ($usuario['Usuario']['email'] == $this->request->data['Usuario']['email']) {
			// 		$erro = 1;
			// 		$erro_desc[] = 'O email que você informou já está cadastrado';
			// 	}
			// }

			// Valida data de nascimento
			// $data_fake = $this->DataUtil->setPadrao($this->request->data['Perfil']['data_nascimento']);
			// if (!strtotime($data_fake)) {
			// 	$erro = 1;
			// 	$erro_desc[] = 'A data de nascimento não foi informada corretamente';
			// }
			//Valida repetição de senha
			// if ($this->request->data['Usuario']['repetir_senha'] != $this->request->data['Usuario']['senha']) {
			// 	$erro = 1;
			// 	$erro_desc[] = 'Você não repetiu a senha corretamente';
			// }

			// if ($erro == 0) {
			// 	$this->request->data['Perfil']['data_nascimento'] = $data_fake;

			// 	$this->request->data['Usuario']['token_ativacao'] = String::uuid();
				
			// 	$email = $this->request->data['Usuario']['email'];
			// 	$senha = $this->request->data['Usuario']['senha'];

			// 	$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			// 	$this->request->data['Usuario']['senha'] = $passwordHasher->hash(
			// 		$this->request->data['Usuario']['senha']
			// 	);
			// 	$this->Usuario->create();
			// 	if ($this->Usuario->save($this->request->data)) {
			// 		if (!empty($this->request->data)) {
			// 			$this->request->data['Perfil']['usuario_id'] = $this->Usuario->id;
			// 			if ($this->Usuario->Perfil->save($this->request->data)) {
			// 				//Debugger::dump($senha);
			// 				if($this->_logar($email, $senha)){
			// 					$this->Session->setFlash(__('Cadastro feito com sucesso.'), 'default', array('class'=> 'alert alert-success'));
			// 					$this->redirect(array('controller'=> 'site', 'action'=> 'home'));
			// 				} else {
			// 					$this->Session->setFlash(__('Ocorreu um erro ao logar.'), 'default', array('class'=> 'alert alert-danger'));
			// 					$this->redirect(array('controller'=> 'site', 'action'=> 'home'));
			// 				}
			// 			} else {
			// 				$this->Session->setFlash(__('O <strong>cadastro</strong> não pode ser salva. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			// 			};
			// 		}
			// 	} else {
			// 		$this->Session->setFlash(__('O <strong>usuario</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			// 	}
			// } else {

			// 	$this->Session->setFlash(join('<br>', $erro_desc), 'default', array('class'=> 'alert alert-danger'));
			// }
		}
	}

	public function _uploadUserImage($image_array) {
		if ($this->request->data['Perfil']['imagem']['error'] == 0) {
			$image = WideImage::load($image_array['tmp_name']);
			$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Usuarios/' . $this->auth_custom['id'], true, 0755);
	
			$image
				->resize(60, 60, 'outside')
				->crop('center', 'center', 60, 60)
				->saveToFile($pasta_salvar->path . DS . $image_array['name'], 85);
		}
	}

	public function meusDados() {
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$this->set(compact('widget_estabelecimentos'));
		
		$this->loadModel('Usuario');
		$this->Usuario->recursive = -1;

		if (!empty($this->auth_custom)) {
			if ($this->request->is(array('post', 'put'))) {
				$this->request->data['Usuario']['id'] = $this->auth_custom['id'];
				$this->request->data['Perfil']['id'] = $this->auth_custom['perfil_id'];

				$this->request->data['Usuario']['email_antigo'] = $this->auth_custom['email'];
				$this->request->data['Perfil']['apelido_antigo'] = $this->auth_custom['apelido'];

				$image_array = $this->request->data['Perfil']['imagem'];
				if ($this->Usuario->saveAll($this->request->data, array('validate'=> 'only'))) {
					if ($this->Usuario->saveAll($this->request->data, array('validate'=> false))) {
						
						$this->_uploadUserImage($image_array);
						if ($this->request->data['Perfil']['imagem']['error'] == 0) {
							$this->request->data['Perfil']['imagem'] = $this->request->data['Perfil']['imagem']['name'];
						} else {
							unset($this->request->data['Perfil']['imagem']);
						}
						$this->_loginSession($this->request->data);
						$this->Session->setFlash('As suas alterações foram efetuadas com sucesso!', 'default', array('class'=> 'alert alert-success'));
						return $this->redirect($this->referer());
					}
				} else {
					$errors = $this->_validationUsuarioErrorsToList($this->Usuario->validationErrors);
					$this->Session->setFlash($errors, 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$options['contain'] = array('Perfil');
				$options['fields'] = array(
					'Usuario.email',
					'Perfil.name',
					'Perfil.data_nascimento',
					'Perfil.apelido',
					'Perfil.cidade'
				);
				$options['conditions'] = array('Usuario.id'=> $this->auth_custom['id']);

				$usuario = $this->Usuario->find('first', $options);
				$this->request->data = $usuario;
				$this->request->data['Perfil']['data_nascimento'] = $this->DataUtil->reverse($usuario['Perfil']['data_nascimento']);

				$this->request->data['Usuario']['senha'] = '';
				$this->set(compact('usuario'));
			}
			// 	$options = array();
			// 	$erro = 0;
			// 	$erro_desc = array();			
				
			// 	$this->Usuario->recursive = -1;

			// 	$options['fields'] = array('Usuario.email');
			// 	$options['conditions'] = array(
			// 		'Usuario.email'=> $this->request->data['Usuario']['email'],
			// 		'Usuario.email !='=> $this->auth_email
			// 	);
			// 	$usuario = $this->Usuario->find('all', $options);
			// 	//Debugger::dump($options);

			// 	if (!empty($usuario)) {
			// 		$erro = 1;
			// 		$erro_desc[] = 'O email que você informou já está me uso por outro usuário';
			// 	}

			// 	if ($this->request->data['Perfil']['imagem']['error'] == 4) {
			// 		unset($this->request->data['Perfil']['imagem']);
			// 	} else {
			// 		$image_array = $this->request->data['Perfil']['imagem'];
			// 		if ($image_array['error'] == 0) {
			// 			if ($image_array['type'] != 'image/jpeg' AND $image_array['type'] != 'image/png') {
			// 				$erro_desc[] = 'A imagem deve estar no formato JPG ou PNG.';
			// 				$erro = 1;
			// 			}
			// 			if ($image_array['size'] > 1000000) {
			// 				$erro_desc[] = 'A imagem não pode ser maior que 1MB.';
			// 				$erro = 1;
			// 			}
			// 		} elseif ($image_array['error'] == 2) {
			// 			$erro_desc[] = 'O arquivo ultrapassou o limite do servidor';
			// 			$erro = 1;
			// 		} else {
			// 			$erro_desc[] = 'Ocorreu um erro no upload da sua imagem';
			// 			$erro = 1;
			// 		}

			// 		if ($erro == 0) {
			// 			$this->request->data['Perfil']['imagem'] = $this->request->data['Perfil']['imagem']['name'];
			// 		}
			// 	}
			// 	if (!empty($this->request->data['Usuario']['nova_senha'])) {
			// 		if ($this->request->data['Usuario']['nova_senha'] != $this->request->data['Usuario']['repetir_senha']) {
			// 			$erro_desc[] = 'Você não repetiu a nova senha corretamente.';
			// 			$erro = 1;
			// 		} else {
			// 			if (!empty($this->request->data['Usuario']['senha_fake'])) {
			// 				$senha = $this->Usuario->find('first',
			// 					array(
			// 						'fields'=> array('Usuario.senha'),
			// 						'conditions'=> array(
			// 							'Usuario.id'=> $this->auth_user_id
			// 					)));

			// 				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			// 				$senha_fake = $passwordHasher->hash(
			// 					$this->request->data['Usuario']['senha_fake']);

			// 				if ($senha['Usuario']['senha'] != $senha_fake) {
			// 					$erro_desc[] = 'Você não informou a sua senha atual corretamente.';
			// 					$erro = 1;
			// 				} else {
			// 					$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
			// 					$nova_senha = $passwordHasher->hash(
			// 						$this->request->data['Usuario']['nova_senha']);

			// 					$this->request->data['Usuario']['senha'] = $nova_senha;
			// 				}
			// 			} else {
			// 				$erro_desc[] = 'Para fazer a alteração da senha você deve informar a sua senha atual.';
			// 				$erro = 1;
			// 			}
			// 		}

			// 	}
			// 	$data_fake = $this->DataUtil->setPadrao($this->request->data['Perfil']['data_nascimento']);
			// 	if (!strtotime($data_fake)) {
			// 		$erro_desc[] = 'A data de nascimento não foi informada corretamente.';
			// 		$erro = 1;
			// 	}
			// 	if ($erro == 0) {
			// 		$this->request->data['Perfil']['data_nascimento'] = $data_fake;
			// 		$this->request->data['Usuario']['id'] = $this->auth_user_id;
			// 		// Debugger::dump($this->request->data);
			// 		// exit();
			// 		if ($this->Usuario->save($this->request->data)) {
			// 			$this->request->data['Perfil']['id'] = $this->auth_perfil_id;
			// 			$this->request->data['Perfil']['usuario_id'] = $this->auth_user_id;
			// 			//Debugger::dump($this->request->data['Perfil']);
			// 			if ($this->Usuario->Perfil->save($this->request->data['Perfil'])) {
							
			// 				$this->Cookie->write('Auth.nome', $this->request->data['Perfil']['name']);
			// 				if (isset($this->request->data['Perfil']['imagem'])) {
			// 					$this->Cookie->write('Auth.imagem', $this->request->data['Perfil']['imagem']);
								
			// 					$image = WideImage::load($image_array['tmp_name']);
			// 					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Usuarios/' . $this->auth_user_id, true, 0755);
						
			// 					$image
			// 						->resize(60, 60, 'outside')
			// 						->crop('center', 'center', 60, 60)
			// 						->saveToFile($pasta_salvar->path . DS . $image_array['name'], 85);
			// 				}

			// 				$this->Session->setFlash(__('Os seus dados foram salvos corretamente.'), 'default', array('class'=> 'alert alert-success'));
			// 				return $this->redirect($this->referer());
			// 			}
			// 		} else {
			// 			$this->request->data['Usuario']['senha'] = '';
			// 			$this->request->data['Usuario']['nova_senha'] = '';
			// 			$this->request->data['Usuario']['repetir_senha'] = '';
			// 			$this->Session->setFlash(__('Ocorreu um erro ao salvar os seus dados.'), 'default', array('class'=> 'alert alert-danger'));
			// 		}
			// 	} else {
			// 		$this->Session->setFlash(join('<br>', $erro_desc), 'default', array('class'=> 'alert alert-danger'));
			// 	}
			// } else {
			// 	$usuario = $this->Usuario->find('first', array('conditions'=> array('Usuario.id'=> $this->auth_user_id)));
			
			// 	$this->request->data = $usuario;

			// 	$this->request->data['Perfil']['data_nascimento'] = $this->DataUtil->reverse($this->request->data['Perfil']['data_nascimento']);

			// 	$this->request->data['Usuario']['senha'] = '';

			// 	$this->set(compact('usuario'));
			// }
		} else {
			return $this->redirect(array('controller'=> 'site','action'=> 'home'));
		}

		$title_for_layout = 'Meus dados - ' . $this->site_name;
		$this->set(compact('title_for_layout'));
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
		$this->Cookie->write('Auth.flag', true);
		$this->Cookie->write('Auth.user_id', $usuario['Usuario']['id']);
		$this->Cookie->write('Auth.nome', $usuario['Perfil']['name']);
		$this->Cookie->write('Auth.apelido', $usuario['Perfil']['apelido']);
		$this->Cookie->write('Auth.email', $usuario['Usuario']['email']);
		$this->Cookie->write('Auth.perfil_id', $usuario['Perfil']['id']);
		if (!empty($usuario['Perfil']['imagem'])) {
			$this->Cookie->write('Auth.imagem', $usuario['Perfil']['imagem']);
		}
		
	}

	public function login(){
		$title_for_layout = 'Entrar - ' . $this->site_name;
		$this->set(compact('title_for_layout'));

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
		$this->Cookie->destroy();
		return $this->redirect(array('controller'=> 'site', 'action'=> 'home'));
	}
}
