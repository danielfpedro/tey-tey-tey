<?php echo $this->Html->script('Site/widget_estabelecimentos', array('inline'=> false)); ?>

<div id="page-wrapper"> <!-- everything below the top menu should be inside the page wrapper div -->
	<div id="logo-bar"> <!--begin the main header logo area-->
		<div id="logo-wrapper">
			<div id="logo"><!--logo and section header area-->
				<?php
					echo $this->Html->image(
						'logo_agito.png',
						array('url'=> '/', 'id'=> 'site-logo')
					);
				?>
			</div>
			
			<br class="clearer" />
			
			<div class="subtitle"></div>	
		</div>  
		
		<div id="ad-header">  <!--header ad--> 
			<a href="ad-top.png" alt="ad" /></a>        
		</div>
					
		<br class="clearer" />
	</div> <!--end the logo area -->
	
	<div id="content-wrapper-top">&nbsp;</div> <!--the top rounded edge of the main white content area-->
	
	<div id="content-wrapper"> <!--begin main white content wrapper-->
		
		<!-- MAIN MENU -->
		<?php echo $this->element('Site/main-menu'); ?>

		<br class="clearer" />
		<br />

		<div class="main-content-left">
			<div id="featured-wrapper">
				<div id="featured">
					<?php foreach (array(1,2,3,4,5) as $item): ?>
						<?php
							echo $this->Html->image('Carrosel/banner1-540x390.jpg', 
								array('url'=> '#', 'title'=>'#div' . $item, 'alt'=> 'Image Alt'));
						?>	
					<?php endforeach ?>
				</div><!-- Featured -->
				<?php foreach (array(1,2,3,4,5) as $item): ?>
					<div id="div<?php echo $item; ?>" class="nivo-html-caption">
						<h1>
							<a href="#" class="bebas">Pullse</a>
						</h1>
					</div><!-- Div1 -->
				<?php endforeach; ?>
			</div><!-- Featured-wrapper -->	   

			<br class="clearer" />

			<div id="categorypanels">
				
				<?php $i = 1; ?>
				<?php foreach ($destaques as $key => $value): ?>
					<?php
						$url_mais = array(
							'controller' => 'site',
							'action' => 'estabelecimentos',
							$value['Categoria']['name']);
					?>
					<div class="categorypanel <?php echo ($i % 2 == 0)? 'right' : ''; ?>"><!-- Box Do estabelecimento -->
						<div class="section-wrapper">
							<!-- categorypanels section -->
							<?php
								echo $this->Html->link('&nbsp;',
									$url_mais,
									array('escape'=> false, 'class'=> 'more')
									);
							?>
							<div class="section">
								<?php echo $value['Categoria']['name']; ?>
							</div>
						</div><!-- section-wrapper -->

						<div class="vertical">
							<?php
								$perfil_url = array(
									'controller'=> 'site',
									'action'=> 'perfil',
									$value['Estabelecimento']['slug']);
								$image = $this->Html->image(
									'estabelecimentos/' .
									'300x170_'.
									$value['Estabelecimento']['imagem']);

								echo $this->Html->link($image, $perfil_url, array('escape'=> false));
							?><!-- Imagem do estabelecimento -->
							<h2>
								<?php
									$label_link = 
									$value['Estabelecimento']['name'];
									echo $this->Html->link(
										$label_link,
										$perfil_url); 
								?>
							</h2><!-- Titulo -->
							<div class="excerpt">
								<?php echo $value['Estabelecimento']['descricao']; ?>
							</div><!-- Descrição -->
							<br class="clearer" />
							<div class="more-button">
								<?php
									echo $this->Html->link('&nbsp;',
										$perfil_url,
										array('escape'=> false)
										);
								?>
							</div><!-- Botao mais -->
							<br class="clearer" />
						</div><!-- Vertical -->
					</div><!-- Categorypanel -->
					<?php $i++; ?>
				<?php endforeach ?>

					<div class="categorypanel right"><!-- Box Do estabelecimento -->
						<div class="section-wrapper">
							<!-- categorypanels section -->
							<?php
								echo $this->Html->link('&nbsp;',
									'#',
									array('escape'=> false, 'class'=> 'more')
									);
							?>
							<div class="section">
								Fotos
							</div>
						</div><!-- section-wrapper -->

						<div class="vertical">
							<?php
								$perfil_url = '#';
								echo $this->Html->image('fotos_baladas.jpg');
							?><!-- Imagem do estabelecimento -->
							<h2>
								Fotos
							</h2><!-- Titulo -->
							<div class="excerpt">
								<?php echo 'Em breve fotos das baldas'; ?>
							</div><!-- Descrição -->
							<br class="clearer" />
						</div><!-- Vertical -->
					</div><!-- Categorypanel -->

			</div><!-- categorypanels -->

			<br class="clearer" />

			<div id="homepage-widgets"> <!--Container do Banner horizontal do final -->
				<div class="widget"><!--Banner horizontal do final -->
					<div class="textwidget">
						<p>
							<?php echo $this->Html->image(
								'banners/banner3.jpg',
								array('alt'=> 'ad', 'url'=> 'google.com')); ?>
						</p>
					</div>
				</div><!--Banner horizontal do final -->
			</div> <!--Container do Banner horizontal do final -->

		</div><!-- main-content-left -->

		<div class="sidebar">
			<div class="unwrapped">
				<?php
					echo $this->Html->image('banners/banner1.jpg', array('url'=>'#', 'width'=> '300px', 'height'=> '420px'));
				?>
			</div><!-- unwrapped -->

			<!-- Widget lateral dos estabelecimentos -->
			<div style="margin-top: -20px;">
				<?php echo $this->element('Site/widget_estabelecimentos'); ?>
			</div>

			<div class="unwrapped">
				<?php
					echo $this->Html->image('banners/banner2.png', array('url'=>'#'));
				?>
			</div><!-- unwrapped -->
		</div><!-- sidebar -->
		<br class="clearer" />

	</div><!-- content-wrapper -->

	<?php echo $this->element('Site/footer'); ?>

</div> <!-- page wrapper -->