<?php
App::uses('AppController', 'Controller');
/**
 * Perfis Controller
 *
 * @property Perfil $Perfil
 * @property PaginatorComponent $Paginator
 */
class PerfisController extends AppController {

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
			$options['conditions'][] = array('Perfil.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->Perfil->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('perfis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
		$this->set('perfil', $this->Perfil->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Perfil->create();
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$usuarios = $this->Perfil->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
			$this->request->data = $this->Perfil->find('first', $options);
		}
		$usuarios = $this->Perfil->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Perfil->id = $id;
		if (!$this->Perfil->exists()) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Perfil->delete()) {
			$this->Session->setFlash(__('O <strong>perfil</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
			$options['conditions'][] = array('Perfil.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->Perfil->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('perfis', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
		$this->set('perfil', $this->Perfil->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Perfil->create();
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$usuarios = $this->Perfil->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
			$this->request->data = $this->Perfil->find('first', $options);
		}
		$usuarios = $this->Perfil->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Perfil->id = $id;
		if (!$this->Perfil->exists()) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Perfil->delete()) {
			$this->Session->setFlash(__('O <strong>perfil</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
