<?php
App::uses('AppController', 'Controller');
/**
 * Site Controller
 *
 */
class SiteController extends AppController {
	
	public $layout = 'Site/default';

	public $components = array('Paginator');

	public $paginate = array(
		'Estabelecimento'=> array(
			'limit'=> 1,
			'fields'=> array(
				'Estabelecimento.id',
				'Estabelecimento.name',
				'Estabelecimento.descricao',
				'Estabelecimento.slug',
				'Estabelecimento.imagem',
			),
			'contain'=> 'Comentario'
			)
	);

	public function preview(){
		$this->layout = 'Site/preview';

		$title_for_layout = $this->site_name;

		$this->set(compact('title_for_layout'));

	}

	public function _getWidgetEstabelecimentos(){
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = -1;
		// 1 Boate, 2 - Restaurante, 3 - Bar
		$options = array();

		$estabelecimentos = array();

		$restaurantes = array();
		$bares = array();
		$boates = array();
		$todos = array();

		$options['contain'] = array('Categoria');
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

		// Debugger::dump($estabelecimentos['restaurantes']);

		return $estabelecimentos;
	}

	public function perfil($slug = null) {
		
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = -1;

		$this->loadModel('Comentario');
		$this->Comentario->recursive = -1;

		//Conta comentarios por que ele só exibe 10 mas precisa exibir também quantos tem ao todo
		$comentarios_count = $this->Comentario->find('count', array('conditions'=> array('Comentario.ativo'=> 1)));

		$estabelecimento = $this->Estabelecimento->find(
			'first',
			array(
				'contain'=> array('Comentario'=> array('Usuario'=> array('Perfil'))),
				'conditions'=> array('Estabelecimento.slug'=> $slug)
			)
		);

		if (!empty($estabelecimento)) {
			$title_for_layout = $estabelecimento['Estabelecimento']['name'] .' - ' . $this->site_name;

			$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
			$this->set(compact('title_for_layout', 'estabelecimento', 'widget_estabelecimentos', 'comentarios_count'));

			//Debugger::dump($estabelecimento);
		} else {
			throw new NotFoundException('Este estabelecimento não existe.');
		}
	}

	public function estabelecimentos($categoria = null){
		$this->loadModel('Estabelecimento');
		$this->Estabelecimento->recursive = -1;

		$this->Paginator->settings = $this->paginate;
    	// similar to findAll(), but fetches paged results
    	$estabelecimentos = $this->Paginator->paginate('Estabelecimento');

		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		//Debugger::dump($estabelecimentos);
		$this->set(compact('estabelecimentos','widget_estabelecimentos','categoria'));
	}

	public function contato(){
		$widget_estabelecimentos = $this->_getWidgetEstabelecimentos();
		$this->set(compact('widget_estabelecimentos'));
	}
}
