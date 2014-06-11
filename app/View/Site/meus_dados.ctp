<?php echo $this->Html->script('Site/widget_estabelecimentos', array('inline'=> false)); ?>
<?php echo $this->Html->script('Site/cadastro', array('inline'=> false)); ?>
<?php echo $this->Html->script('../lib/maskedinput-1.3.1/jquery.maskedinput.min', array('inline'=> false)); ?>

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
						Meus dados
					</div><!-- section -->
				</div><!-- section-wraper -->

				<div class="wrap-form-contato">

					<div style="margin-bottom: 30px;">
						<?php echo $this->Session->flash(); ?>
					</div>
					
					<?php
						echo $this->Form->create(
							'Usuario',
							array(
								'type'=> 'file',
								'inputDefaults'=> array('label'=> false))
						);
					?>
						<div style="margin-bottom: 5px;">
							<?php
								if (!empty($auth_imagem)) {
									$img_url = ''.
										'Usuarios/' . 
										$auth_user_id .
										'/' . 
										$auth_imagem;
								} else {
									$img_url = 'Usuarios/default_avatar.png';
								}
								echo $this->Html->image($img_url, $options = array('width'=> 60, 'height'=> 60)); ?>
						</div>
						<?php echo $this->Form->input('Perfil.imagem', array('type'=> 'file')); ?>

						<label>Nome</label>
						<?php echo $this->Form->input('Perfil.name'); ?>
						<label>Email</label>
						<?php echo $this->Form->input('email'); ?>
						<label>Data de nascimento</label>
						<?php echo $this->Form->input('Perfil.data_nascimento', array('type'=> 'text', 'class'=> 'data')); ?>
						<label>Cidade</label>
						<?php echo $this->Form->input('Perfil.cidade'); ?>
						
						<hr>
						<br>

						<label>Nova senha</label>
						<?php echo $this->Form->input('nova_senha', array('type'=> 'password', 'required'=> false)); ?>
						<label>Repetir senha</label>
						<?php echo $this->Form->input('repetir_senha', array('type'=> 'password', 'required'=> false)); ?>
						<label>Senha atual</label>
						<?php echo $this->Form->input('senha_fake', array('type'=> 'password', 'required'=> false)); ?>

						<button type="submit">Salvar alterações</button>
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