<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

App::uses('WideImage', 'Lib/WideImage/lib');
/**
 * Cartoes Controller
 *
 * @property Cartao $Cartao
 * @property PaginatorComponent $Paginator
 */
class CartoesController extends AppController {

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
			$options['conditions'][] = array('Cartao.name LIKE'=> '%'.$q.'%');
		} else {
			$this->request->query['q'] = '';
		}
		$this->Cartao->recursive = 0;

		$this->Paginator->settings = $options;
		$this->set('cartoes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Cartao->exists($id)) {
			throw new NotFoundException(__('Invalid cartao'));
		}
		$options = array('conditions' => array('Cartao.' . $this->Cartao->primaryKey => $id));
		$this->set('cartao', $this->Cartao->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cartao->create();
						
			$image_array = $this->request->data['Cartao']['imagem'];
			$this->request->data['Cartao']['imagem'] = $this->request->data['Cartao']['imagem']['name'];
			
			if ($image_array['type'] == 'image/jpeg' OR $image_array['type'] == 'image/png') {
				if ($this->Cartao->save($this->request->data)) {

					$image = WideImage::load($image_array['tmp_name']);
					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Cartoes', true, 0755);
					
					$image
						->resize(51, 32, 'outside')
						->crop('center', 'center', 51, 32)
						->saveToFile($pasta_salvar->path . DS . $image_array['name'], 90);

					$this->Session->setFlash(__('O <strong>cartao</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O <strong>cartao</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('A <strong>imagem</strong> deve estar no formato JPG ou PNG.'),
					'default',
					array('class'=> 'alert alert-danger'));
			}
		}
		$estabelecimentos = $this->Cartao->Estabelecimento->find('list');
		$this->set(compact('estabelecimentos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Cartao->exists($id)) {
			throw new NotFoundException(__('Invalid cartao'));
		}
		if ($this->request->is(array('post', 'put'))) {

			if ($this->request->data['Cartao']['imagem']['error'] > 0) {
				unset($this->request->data['Cartao']['imagem']);
			} else {
				$image_array = $this->request->data['Cartao']['imagem'];
				$this->request->data['Cartao']['imagem'] = $this->request->data['Cartao']['imagem']['name'];
			}

			if ($this->Cartao->save($this->request->data)) {
				if (isset($this->request->data['Cartao']['imagem'])) {
					$image = WideImage::load($image_array['tmp_name']);
					$pasta_salvar = new Folder(WWW_ROOT . 'img' . DS . 'Cartoes', true, 0755);
					
					$image
						->resize(51, 32, 'outside')
						->crop('center', 'center', 51, 32)
						->saveToFile($pasta_salvar->path . DS . $image_array['name'], 100);
				}
				$this->Session->setFlash(__('O <strong>cartao</strong> foi salvo com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O <strong>cartao</strong> não pode ser salvo. Por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Cartao.' . $this->Cartao->primaryKey => $id));
			$this->request->data = $this->Cartao->find('first', $options);
		}
		$estabelecimentos = $this->Cartao->Estabelecimento->find('list');
		$this->set(compact('estabelecimentos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cartao->id = $id;
		if (!$this->Cartao->exists()) {
			throw new NotFoundException(__('Invalid cartao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cartao->delete()) {
			$this->Session->setFlash(__('O <strong>cartao</strong> foi deletado com sucesso.'), 'default', array('class'=> 'alert alert-custom'));
		} else {
			$this->Session->setFlash(__('O <strong>cartao</strong> não pode ser deletado, por favor, tente novamente.'), 'default', array('class'=> 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
