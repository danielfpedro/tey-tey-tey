<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 * @property Estabelecimento $Estabelecimento
 */
class AdminMainMenu extends AppModel {

	public function get() {
		return array(
			array(
				'label'=> 'Carrossel',
				'url'=> array(
					'controller'=> 'home_destaques',
					'action'=> 'index'),
				'icon'=> 'th-large'),
			array(
				'label'=> 'Banners',
				'url'=> array(
					'controller'=> 'banners',
					'action'=> 'index'),
				'icon'=> 'picture'),
			array(
				'label'=> 'Estabelecimentos',
				'url'=> array(
					'controller'=> 'estabelecimentos',
					'action'=> 'index'),
				'icon'=> 'stats'),
			array(
				'label'=> 'Categorias',
				'url'=> array(
					'controller'=> 'categorias',
					'action'=> 'index'),
				'icon'=> 'th-list'),
			array(
				'label'=> 'Comentários',
				'url'=> array(
					'controller'=> 'comentarios',
					'action'=> 'index'),
				'icon'=> 'comment'),
			array(
				'label'=> 'Contatos',
				'url'=> array(
					'controller'=> 'contatos',
					'action'=> 'index'),
				'icon'=> 'envelope'),
			array(
				'label'=> 'Usuários',
				'url'=> array(
					'controller'=> 'usuarios_administrativos',
					'action'=> 'index'),
				'icon'=> 'user'));
	}

}
