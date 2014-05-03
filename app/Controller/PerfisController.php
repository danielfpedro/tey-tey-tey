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
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Perfil->recursive = 0;
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
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('The perfil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
			$this->request->data = $this->Perfil->find('first', $options);
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
		$this->Perfil->id = $id;
		if (!$this->Perfil->exists()) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Perfil->delete()) {
			$this->Session->setFlash(__('O <strong>perfil</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
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
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Perfil->recursive = 0;
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
				$this->Session->setFlash(__('O <strong>perfil</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->Perfil->exists($id)) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perfil->save($this->request->data)) {
				$this->Session->setFlash(__('The perfil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perfil.' . $this->Perfil->primaryKey => $id));
			$this->request->data = $this->Perfil->find('first', $options);
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
		$this->Perfil->id = $id;
		if (!$this->Perfil->exists()) {
			throw new NotFoundException(__('Invalid perfil'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Perfil->delete()) {
			$this->Session->setFlash(__('O <strong>perfil</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>perfil</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
