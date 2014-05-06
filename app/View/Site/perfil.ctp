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
			 <div class="content-panel"> 
				<div class="page-content review">                   
					<h1 class="title">
						<?php echo $estabelecimento['Estabelecimento']['name']; ?> (<?php echo $estabelecimento['Estabelecimento']['cidade']; ?>)
					</h1>

					<!-- Barrinha com o icone de comentarios -->
					<div class="section-wrapper review">
						<div class="comment-bubble">
							<a href="#comentarios">
							<?php echo count($estabelecimento['Comentario']); ?>
							</a>  
						</div>
						<div class="section">
							20 de Janeiro, 2013 por <a href="#" title="" rel="external">Administrador</a>	
						</div>        
					</div>
					<div class="overview">
					   <div class="left-panel">       
							<div class="article-image">
								<a href="" title="">
									<?php
										$img_url = ''.
											'Estabelecimentos/'.
											$estabelecimento['Estabelecimento']['id'].
											'/300x170_'.
											$estabelecimento['Estabelecimento']['imagem'];

										echo $this->Html->image(
											$img_url,
											array('width'=> '260px')
										);
									?>
									<!-- <img alt="Image Alt" src="" width="260px" height="195px" /> -->
								</a>		
							</div>        
							Descrição aqiu iasd oashd iuash du
							<br class="clearer" />    	
					  	</div>										  
						<div class="right-panel">
							<div class="inner">
								<h2>Nossa Tomada!!</h2>
						
								<span class="taxName">Site</span>: 
								
								<span class="metaContent">
									<a href="http://<?php echo $estabelecimento['Estabelecimento']['site']; ?>">
										<?php echo $estabelecimento['Estabelecimento']['site']; ?>
									</a>
								</span>
								
								<div class="separator">&nbsp;</div>
								
								<span class="metaName">Telefone</span>: 
								
								<span class="metaContent"><?php echo $estabelecimento['Estabelecimento']['telefone']; ?></span>
								
								<div class="separator">&nbsp;</div>
								
								<span class="metaName">Endereço</span>: 
								
								<span class="metaContent"><?php echo $estabelecimento['Estabelecimento']['endereco']; ?></span>
								
								<div class="separator">&nbsp;</div>

								<span class="metaName">Área para fumantes</span>: 
								
								<span class="metaContent">
									<?php echo ($estabelecimento['Estabelecimento']['area_fumantes']) ? 'Sim' : 'Não'; ?>
								</span>
								
								<div class="separator">&nbsp;</div>

								<span class="metaName">Faz reservas</span>: 
								
								<span class="metaContent">
									<?php echo ($estabelecimento['Estabelecimento']['faz_reserva']) ? 'Sim' : 'Não'; ?>
								</span>
								
								<div class="separator">&nbsp;</div>

								<span class="metaName">Ar condicionado</span>: 
								
								<span class="metaContent">
									<?php echo ($estabelecimento['Estabelecimento']['ar_condicionado']) ? 'Sim' : 'Não'; ?>
								</span>
								
								<div class="separator">&nbsp;</div>

								<span class="metaName">Ar livre</span>: 
								
								<span class="metaContent">
									<?php echo ($estabelecimento['Estabelecimento']['ar_livre']) ? 'Sim' : 'Não'; ?>
								</span>
								
								<div class="separator">&nbsp;</div>

								<span class="metaName">Estacionamento</span>: 
								
								<span class="metaContent">
									<?php echo ($estabelecimento['Estabelecimento']['estacionamento']) ? 'Sim' : 'Não'; ?>
								</span>
								
								<div class="separator">&nbsp;</div>

								<div class="bottom-line">Desde</div>
								
								<span class="metaContent">
									<?php echo $estabelecimento['Estabelecimento']['desde']; ?>
								</span>
							</div><!-- inner -->
						</div><!-- right panel -->
						<br class="clearer" />
					</div><!-- overview -->
					<br class="clearer" />

				</div><!-- page content -->
				<br class="clearer" />
			</div><!-- content-panel -->
			<br class="clearer" />

			<!-- Block de comentarios -->
			<?php echo $this->element('Site/comentarios'); ?>

		</div><!-- main-content-left -->

		<div class="sidebar">
			<div class="unwrapped">
				<?php
					echo $this->Html->image('banners/banner1.jpg', array('url'=>'#', 'width'=> '300px', 'height'=> '420px'));
				?>
			</div><!-- unwrapped -->

			<!-- Widget lateral dos estabelecimentos -->
			<?php echo $this->element('Site/widget_estabelecimentos'); ?>

			<div class="unwrapped">
				<?php
					echo $this->Html->image('banners/banner2.png', array('url'=>'#'));
				?>
			</div><!-- unwrapped -->
		</div><!-- sidebar -->
		<br class="clearer" />

	</div><!-- content-wrapper -->
</div> <!-- page wrapper -->