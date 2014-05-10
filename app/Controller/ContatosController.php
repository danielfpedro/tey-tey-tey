<?php
App::uses('AppController', 'Controller');
/**
 * Contatos Controller
 *
 * @property Contato $Contato
 * @property PaginatorComponent $Paginator
 */
class ContatosController extends AppController {

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
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Contato->recursive = 0;
		$this->set('contatos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
		$this->set('contato', $this->Contato->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contato->create();
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>contato</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
			} else {
				$this->Session->setFlash(__('O <strong>contato</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
			return $this->redirect($this->referer());
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
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('The contato has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contato could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
			$this->request->data = $this->Contato->find('first', $options);
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
		$this->Contato->id = $id;
		if (!$this->Contato->exists()) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contato->delete()) {
			$this->Session->setFlash(__('O <strong>contato</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>contato</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		$this->Contato->recursive = 0;
		$this->set('contatos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
		$this->set('contato', $this->Contato->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Contato->create();
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>contato</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>contato</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('The contato has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contato could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
			$this->request->data = $this->Contato->find('first', $options);
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
		$this->Contato->id = $id;
		if (!$this->Contato->exists()) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contato->delete()) {
			$this->Session->setFlash(__('O <strong>contato</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>contato</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
