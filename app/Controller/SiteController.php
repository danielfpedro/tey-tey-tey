<?php
App::uses('AppController', 'Controller');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	
	public $layout = 'Site/default';

	public function _getWidgetEstabelecimentos(){
		$this->loadModel('Estabelecimento');
		// 1 Boate, 2 - Restaurante, 3 - Bar
		$options = array();

		$estabelecimentos = array();

		$restaurantes = array();
		$bares = array();
		$boates = array();
		$todos = array();


		$options['limit'] = 5;

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 2);
		$restaurantes = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 1);
		$boates = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array('Estabelecimento.categoria_id'=> 3);
		$bares = $this->Estabelecimento->find('all', $options);

		$options['conditions'] = array();
		$todos = $this->Estabelecimento->find('all', $options);

		$estabelecimentos['restaurantes'] = $restaurantes;
		$estabelecimentos['bares'] = $bares;
		$estabelecimentos['boates'] = $boates;
		$estabelecimentos['todos'] = $todos;

		return $estabelecimentos;
	}

	public function perfil($slug = null) {
		$this->loadModel('Estabelecimento');
		
		$estabelecimento = $this->Estabelecimento->find('first', array('conditions'=> array('Estabelecimento.slug'=> $slug)));

		if (!empty($estabelecimento)) {
			$title_for_layout = $estabelecimento['Estabelecimento']['name'] .' - ' . $this->site_name;

			$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
			$this->set(compact('title_for_layout', 'estabelecimento', 'widget_estabelecimentos'));
		} else {
			throw new NotFoundException('Este estabelecimento não existe.');
		}
	}

}
