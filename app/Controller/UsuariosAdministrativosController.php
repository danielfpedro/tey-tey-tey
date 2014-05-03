<?php
App::uses('AppController', 'Controller');
/**
 * UsuariosAdministrativos Controller
 *
 * @property UsuariosAdministrativo $UsuariosAdministrativo
 * @property PaginatorComponent $Paginator
 */
class UsuariosAdministrativosController extends AppController {

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
		$this->UsuariosAdministrativo->recursive = 0;
		$this->set('usuariosAdministrativos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsuariosAdministrativo->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		$options = array('conditions' => array('UsuariosAdministrativo.' . $this->UsuariosAdministrativo->primaryKey => $id));
		$this->set('usuariosAdministrativo', $this->UsuariosAdministrativo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsuariosAdministrativo->create();
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->UsuariosAdministrativo->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios administrativo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios administrativo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsuariosAdministrativo.' . $this->UsuariosAdministrativo->primaryKey => $id));
			$this->request->data = $this->UsuariosAdministrativo->find('first', $options);
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
		$this->UsuariosAdministrativo->id = $id;
		if (!$this->UsuariosAdministrativo->exists()) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsuariosAdministrativo->delete()) {
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		$this->UsuariosAdministrativo->recursive = 0;
		$this->set('usuariosAdministrativos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UsuariosAdministrativo->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		$options = array('conditions' => array('UsuariosAdministrativo.' . $this->UsuariosAdministrativo->primaryKey => $id));
		$this->set('usuariosAdministrativo', $this->UsuariosAdministrativo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UsuariosAdministrativo->create();
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		if (!$this->UsuariosAdministrativo->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios administrativo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios administrativo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsuariosAdministrativo.' . $this->UsuariosAdministrativo->primaryKey => $id));
			$this->request->data = $this->UsuariosAdministrativo->find('first', $options);
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
		$this->UsuariosAdministrativo->id = $id;
		if (!$this->UsuariosAdministrativo->exists()) {
			throw new NotFoundException(__('Invalid usuarios administrativo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsuariosAdministrativo->delete()) {
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
