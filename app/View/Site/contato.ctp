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
			<div id="categorypanels" class="post-loop">
				<div class="section-wrapper">
					<div class="section">
						Entre em contato
					</div><!-- section -->
				</div><!-- section-wraper -->

				<div class="wrap-form-contato">
					<?php
						echo $this->Form->create(
							'Contato',
							array(
								'url'=> array('controller'=> 'contatos', 'action'=> 'add'),
								'inputDefaults'=> array('label'=> false))
						);
					?>
						<label>Nome</label>
						<?php echo $this->Form->input('name'); ?>
						<label>Email</label>
						<?php echo $this->Form->input('email'); ?>
						<?php echo $this->Form->textArea('texto', array('placeholder'=> 'Digite aqui a sua mensagem...')); ?>
						<button type="submit">Enviar</button>
					<?php echo $this->Form->end() ?>
				</div><!-- wrap-form-contato -->

				<br class="clearer" />
			</div><!-- categorypanels -->
			<br class="clearer" />
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

	<?php echo $this->element('Site/footer'); ?>

</div> <!-- page wrapper -->