<?php
App::uses('AppController', 'Controller');
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
 * index method
 *
 * @return void
 */
	public function index() {
		if (!isset($this->request->query['q'])) {
			$this->request->query['q'] = '';
		}
		$this->Estabelecimento->recursive = 0;
		$this->set('estabelecimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Estabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		$options = array('conditions' => array('Estabelecimento.' . $this->Estabelecimento->primaryKey => $id));
		$this->set('estabelecimento', $this->Estabelecimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estabelecimento->create();
			if ($this->Estabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$comentarios = $this->Estabelecimento->Comentario->find('list');
		$this->set(compact('comentarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Estabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Estabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estabelecimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Estabelecimento.' . $this->Estabelecimento->primaryKey => $id));
			$this->request->data = $this->Estabelecimento->find('first', $options);
		}
		$comentarios = $this->Estabelecimento->Comentario->find('list');
		$this->set(compact('comentarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Estabelecimento->id = $id;
		if (!$this->Estabelecimento->exists()) {
			throw new NotFoundException(__('Invalid estabelecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Estabelecimento->delete()) {
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
		$this->Estabelecimento->recursive = 0;
		$this->set('estabelecimentos', $this->Paginator->paginate());
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
			$this->Estabelecimento->create();
			if ($this->Estabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		}
		$comentarios = $this->Estabelecimento->Comentario->find('list');
		$this->set(compact('comentarios'));
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
			if ($this->Estabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estabelecimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Estabelecimento.' . $this->Estabelecimento->primaryKey => $id));
			$this->request->data = $this->Estabelecimento->find('first', $options);
		}
		$comentarios = $this->Estabelecimento->Comentario->find('list');
		$this->set(compact('comentarios'));
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
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('O <strong>estabelecimento</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
