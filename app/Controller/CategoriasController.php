<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

App::uses('WideImage', 'Lib/WideImage/lib');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 */
class CategoriasController extends AppController {

public $layout = 'BootstrapAdmin.default';	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options = array();
		if (!empty($this->request->query['q'])) {
			$q = str_replace(' ', '%', $this->request->query['q']);
			$options['conditions'][] = array('Categoria.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->Categoria->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('categorias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>categoria</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>categoria</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('O <strong>categoria</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		if (!empty($this->request->query['q'])) {
			$q = str_replace(' ', '%', $this->request->query['q']);
			$options['conditions'][] = array('Categoria.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->Categoria->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('categorias', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {

			$image_array = $this->request->data['Categoria']['imagem'];
			$this->request->data['Categoria']['imagem'] = $this->request->data['Categoria']['imagem']['name'];

			if ($image_array['type'] == 'image/jpeg' OR $image_array['type'] == 'image/png') {
				$this->Categoria->create();
				if ($this->Categoria->save($this->request->data)) {

					$image = WideImage::load($image_array['tmp_name']);
					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'icones_categorias', true, 0755);
					
					$image
						->resize(25, 25, 'outside')
						->crop('center', 'center', 25, 25)
						->saveToFile($pasta_salvar->path . DS . $image_array['name'], 100);

					$this->Session->setFlash(__('O <strong>categoria</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('A <strong>imagem</strong> deve estar no formato JPG ou PNG.'),
					'default',
					array('class'=> 'alert alert-danger'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['Categoria']['imagem']['error'] > 0) {
				unset($this->request->data['Categoria']['imagem']);
			} else {
				$image_array = $this->request->data['Categoria']['imagem'];
				$this->request->data['Categoria']['imagem'] = $this->request->data['Categoria']['imagem']['name'];
			}
			if ($this->Categoria->save($this->request->data)) {
				if (isset($this->request->data['Categoria']['imagem'])) {
					$image = WideImage::load($image_array['tmp_name']);
					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'icones_categorias', true, 0755);
					
					$image
						->resize(25, 25, 'outside')
						->crop('center', 'center', 25, 25)
						->saveToFile($pasta_salvar->path . DS . $image_array['name'], 100);
				}
				$this->Session->setFlash(__('O <strong>categoria</strong> foi salva com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('O <strong>categoria</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>categoria</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
