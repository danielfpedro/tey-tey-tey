<?php
App::uses('AppController', 'Controller');
/**
 * Comentarios Controller
 *
 * @property Comentario $Comentario
 * @property PaginatorComponent $Paginator
 */
class ComentariosController extends AppController {

public $layout = 'BootstrapAdmin.admin';	
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
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
		$this->set('comentario', $this->Comentario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('The comentario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Comentario->Usuario->find('list');
		$estabelecimentos = $this->Comentario->Estabelecimento->find('list');
		$this->set(compact('usuarios', 'estabelecimentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('The comentario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
			$this->request->data = $this->Comentario->find('first', $options);
		}
		$usuarios = $this->Comentario->Usuario->find('list');
		$estabelecimentos = $this->Comentario->Estabelecimento->find('list');
		$this->set(compact('usuarios', 'estabelecimentos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comentario->delete()) {
			$this->Session->setFlash(__('The comentario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comentario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
		$this->set('comentario', $this->Comentario->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('The comentario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Comentario->Usuario->find('list');
		$estabelecimentos = $this->Comentario->Estabelecimento->find('list');
		$this->set(compact('usuarios', 'estabelecimentos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Comentario->exists($id)) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash(__('The comentario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comentario.' . $this->Comentario->primaryKey => $id));
			$this->request->data = $this->Comentario->find('first', $options);
		}
		$usuarios = $this->Comentario->Usuario->find('list');
		$estabelecimentos = $this->Comentario->Estabelecimento->find('list');
		$this->set(compact('usuarios', 'estabelecimentos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException(__('Invalid comentario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comentario->delete()) {
			$this->Session->setFlash(__('The comentario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comentario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
