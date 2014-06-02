<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

App::uses('WideImage', 'Lib/WideImage/lib');
/**
 * Estabelecimentos Controller
 *
 * @property Estabelecimento $Estabelecimento
 * @property PaginatorComponent $Paginator
 */
class EstabelecimentosController extends AppController {

public $layout = 'BootstrapAdmin.default';	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		if (!empty($this->request->query['q'])) {
			$q = str_replace(' ', '%', $this->request->query['q']);
			$options['conditions'][] = array('Estabelecimento.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}

		if (!empty($this->request->query['categoria'])) {
			$categoria = $this->request->query['categoria'];
			$options['conditions'][] = array('Estabelecimento.categoria_id'=> $categoria);
		} else {
			$this->request->query['categoria'] = '';	
		}

		$this->Estabelecimento->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('estabelecimentos', $this->Paginator->paginate());

		$categorias = $this->Estabelecimento->Categoria->find('list');

		$this->set(compact('categorias'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Estabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		$options = array('conditions' => array('Estabelecimento.' . $this->Estabelecimento->primaryKey => $id));
		$this->set('estabelecimento', $this->Estabelecimento->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			// Debugger::dump($this->request->data);
			// exit();
			
			$image_array = $this->request->data['Estabelecimento']['imagem'];
			$this->request->data['Estabelecimento']['imagem'] = $this->request->data['Estabelecimento']['imagem']['name'];
			$this->request->data['Estabelecimento']['usuarios_administrativo_id'] = 1;

			if ($image_array['type'] == 'image/jpeg' OR $image_array['type'] == 'image/png') {
				$this->Estabelecimento->create();
				if ($this->Estabelecimento->save($this->request->data)) {
					//Salvando imagem
					$image = WideImage::load($image_array['tmp_name']);
					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Estabelecimentos' . DS . $this->Estabelecimento->id, true, 0755);
					
					$image
						->resize(70, 70, 'outside')
						->crop('center', 'center', 70, 70)
						->saveToFile($pasta_salvar->path . DS . '70x70_' . $image_array['name'], 85);

					$image
						->resize(300, 170, 'outside')
						->crop('center', 'center', 300, 170)
						->saveToFile($pasta_salvar->path . DS . '300X170_' . $image_array['name'], 85);

					$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('A <strong>imagem</strong> deve estar no formato JPG ou PNG.'),
					'default',
					array('class'=> 'alert alert-danger'));
			}
		}
		$categorias = $this->Estabelecimento->Categoria->find('list');
		
		$cartoes = $this->Estabelecimento->Cartao->find('list');

		$clientes = $this->Estabelecimento->Cliente->find('list');

		$subcategorias = $this->Estabelecimento->Subcategoria->find('list');

		$usuariosAdministrativos = $this->Estabelecimento->UsuariosAdministrativo->find('list');
		$this->set(compact('categorias', 'usuariosAdministrativos', 'cartoes', 'subcategorias', 'clientes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Estabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		if ($this->request->is(array('post', 'put'))) {

			
			
			$this->request->data['Estabelecimento']['usuarios_administrativo_id'] = 1;


				if ($this->request->data['Estabelecimento']['imagem']['error'] > 0) {
					unset($this->request->data['Estabelecimento']['imagem']);
				} else {
					$image_array = $this->request->data['Estabelecimento']['imagem'];
					$this->request->data['Estabelecimento']['imagem'] = $this->request->data['Estabelecimento']['imagem']['name'];
				}
				// Debugger::dump($this->request->data);
				// exit();
				if ($this->Estabelecimento->save($this->request->data)) {
					if (isset($this->request->data['Estabelecimento']['imagem'])) {
						$image = WideImage::load($image_array['tmp_name']);
						$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Estabelecimentos' . DS . $this->Estabelecimento->id, true, 0755);
						
						$image
							->resize(70, 70, 'outside')
							->crop('center', 'center', 70, 70)
							->saveToFile($pasta_salvar->path . DS . '70x70_' . $image_array['name'], 85);

						$image
							->resize(300, 170, 'outside')
							->crop('center', 'center', 300, 170)
							->saveToFile($pasta_salvar->path . DS . '300X170_' . $image_array['name'], 85);
					}
					$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				}
			// } 
			//else {
			// 	$this->Session->setFlash(__('A <strong>imagem</strong> deve estar no formato JPG ou PNG.'),
			// 		'default',
			// 		array('class'=> 'alert alert-danger'));
			// }
		} else {
			$options = array('conditions' => array('Estabelecimento.' . $this->Estabelecimento->primaryKey => $id));
			$this->request->data = $this->Estabelecimento->find('first', $options);
		}

		$categorias = $this->Estabelecimento->Categoria->find('list');
		$subcategorias = $this->Estabelecimento->Subcategoria->find('list');
		$clientes = $this->Estabelecimento->Cliente->find('list');

		$usuariosAdministrativos = $this->Estabelecimento->UsuariosAdministrativo->find('list');
		$this->set(compact('categorias', 'usuariosAdministrativos', 'clientes', 'subcategorias'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Estabelecimento->id = $id;
		if (!$this->Estabelecimento->exists()) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estabelecimento->delete()) {
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
