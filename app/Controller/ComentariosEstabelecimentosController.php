<?php
App::uses('AppController', 'Controller');
/**
 * ComentariosEstabelecimentos Controller
 *
 * @property ComentariosEstabelecimento $ComentariosEstabelecimento
 * @property PaginatorComponent $Paginator
 */
class ComentariosEstabelecimentosController extends AppController {

public $layout = 'admin';	
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
		$this->ComentariosEstabelecimento->recursive = 0;
		$this->set('comentariosEstabelecimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ComentariosEstabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		$options = array('conditions' => array('ComentariosEstabelecimento.' . $this->ComentariosEstabelecimento->primaryKey => $id));
		$this->set('comentariosEstabelecimento', $this->ComentariosEstabelecimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ComentariosEstabelecimento->create();
			if ($this->ComentariosEstabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comentarios estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentarios estabelecimento could not be saved. Please, try again.'));
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
		if (!$this->ComentariosEstabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComentariosEstabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comentarios estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentarios estabelecimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ComentariosEstabelecimento.' . $this->ComentariosEstabelecimento->primaryKey => $id));
			$this->request->data = $this->ComentariosEstabelecimento->find('first', $options);
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
		$this->ComentariosEstabelecimento->id = $id;
		if (!$this->ComentariosEstabelecimento->exists()) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ComentariosEstabelecimento->delete()) {
			$this->Session->setFlash(__('The comentarios estabelecimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comentarios estabelecimento could not be deleted. Please, try again.'));
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
		$this->ComentariosEstabelecimento->recursive = 0;
		$this->set('comentariosEstabelecimentos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ComentariosEstabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		$options = array('conditions' => array('ComentariosEstabelecimento.' . $this->ComentariosEstabelecimento->primaryKey => $id));
		$this->set('comentariosEstabelecimento', $this->ComentariosEstabelecimento->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ComentariosEstabelecimento->create();
			if ($this->ComentariosEstabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comentarios estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentarios estabelecimento could not be saved. Please, try again.'));
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
		if (!$this->ComentariosEstabelecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComentariosEstabelecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comentarios estabelecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comentarios estabelecimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ComentariosEstabelecimento.' . $this->ComentariosEstabelecimento->primaryKey => $id));
			$this->request->data = $this->ComentariosEstabelecimento->find('first', $options);
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
		$this->ComentariosEstabelecimento->id = $id;
		if (!$this->ComentariosEstabelecimento->exists()) {
			throw new NotFoundException(__('Invalid comentarios estabelecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ComentariosEstabelecimento->delete()) {
			$this->Session->setFlash(__('The comentarios estabelecimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comentarios estabelecimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
