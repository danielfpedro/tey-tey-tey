<div class="widget-wrapper" style="margin-top:45px">
	<div class="widget">
		<div id="tabbed-reviews" class="complex-list">
			
			<ul id="widget-abas" class="tabnav">
				<li class="" rel="1">
					<a href="#">Restaurantes</a>
				</li>
				<li rel="2">
					<a href="#">Bares</a>
				</li>
				<li rel="3">
					<a href="#">Boates</a>
				</li>
				<!-- <li rel="4">
					<a href="#">Todos</a>
				</li> -->
			</ul>

			<br class="clearer" />

			<div class="tabdiv-wrapper" id="aba-contents">

				<?php
					$items = array('restaurantes', 'bares', 'boates', 'todos');
					$i = 1;
				?>
				<?php foreach ($items as $value): ?>
					<div id="tab-content" class="tabdiv" rel="<?php echo $i; ?>"><!-- Restaurantes -->
						<ul>
							<?php if (!empty($widget_estabelecimentos[$value])): ?>
								<?php foreach ($widget_estabelecimentos[$value] as $item): ?>
									<?php
										$perfil_url = array(
											'controller'=> 'site',
											'action'=> 'perfil',
											$item['Estabelecimento']['slug']
										);
										$perfil_img = ''.
											'Estabelecimentos/' .
											$item['Estabelecimento']['id'] .
											'/70x70_' .
											$item['Estabelecimento']['imagem'];

										$categoria_img = 'icones_categorias/' . $item['Categoria']['imagem'];
									?>
									<li>
										<div class="icon" style="background-color:#cf6925">
											<?php
												echo $this->Html->image(
													$categoria_img,
													array('url'=> $perfil_url)
												);
											?>
										</div>
										<div class="floatleft" id="thumbnail">
											<?php
												echo $this->Html->link(
													$this->Html->image($perfil_img, array('class'=> 'thumb-img')),
													$perfil_url,
													array('escape'=> false, 'class'=> 'thumbnail darken small')
												);
											?>	 
										</div>
										<div class="floatleft">
											<?php
												echo $this->Html->link(
													'<strong>'.$item['Estabelecimento']['name'].'</strong>',
													$perfil_url,
													array('escape'=> false, 'class'=> 'post-title'));
											?>
											<br>
											<?php echo $item['Estabelecimento']['cidade']; ?>
										</div>
										<br class="clearer" /> 
									</li>
								<?php endforeach ?>
							<?php else: ?>
								<li>
									<div class="floatleft">
										Nenhuma informação encontrada
									</div>
									<br class="clearer" /> 
								</li>
							<?php endif ?>
							

							<li class="more">
								<?php
									echo $this->Html->link(
										'Mais',
										array(
											'controller' => 'site',
											'action' => 'estabelecimentos',
											$item['Categoria']['slug']
										)
									);
								?>
							</li>
							<li class="last">&nbsp;</li>
						</ul>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>

			</div>
		</div>
	</div>
</div>