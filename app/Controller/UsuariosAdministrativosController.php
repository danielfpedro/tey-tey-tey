<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
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
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		if (!empty($this->request->query['q'])) {
			$q = str_replace(' ', '%', $this->request->query['q']);
			$options['conditions'][] = array('UsuariosAdministrativo.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->UsuariosAdministrativo->recursive = 0;

		$this->Paginator->settings = $options;
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
			if (!empty($this->request->data['UsuariosAdministrativo']['senha'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
					$this->request->data['UsuariosAdministrativo']['senha'] = $passwordHasher->hash(
					$this->request->data['UsuariosAdministrativo']['senha']
				);
			}
			$this->UsuariosAdministrativo->create();
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
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
			if (!empty($this->request->data['UsuariosAdministrativo']['senha'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
					$this->request->data['UsuariosAdministrativo']['senha'] = $passwordHasher->hash(
					$this->request->data['UsuariosAdministrativo']['senha']
				);
			}
			if ($this->UsuariosAdministrativo->save($this->request->data)) {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
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
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>usuarios administrativo</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
