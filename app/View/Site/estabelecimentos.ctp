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
						<?php echo $categoria; ?>
					</div><!-- section -->
				</div><!-- section-wraper -->

				<?php foreach ($estabelecimentos as $estabelecimento): ?>
					<?php 
						$perfil_url = array('action'=> 'perfil', $estabelecimento['Estabelecimento']['slug']);
					?>
                	<div class="categorypanel wide right vertical">
                        <div class="left-panel">
                        	<?php
                        		$img_url = ''.
                        			'Estabelecimentos/'.
                        			$estabelecimento['Estabelecimento']['id'].
                        			'/300x170_' . $estabelecimento['Estabelecimento']['imagem'];
                        		$img = $this->Html->image(
                        			$img_url,
                        			array(
                        				'class'=> 'thumb-img attachment-spotlight wp-post-image',
                        				'height'=> '170',
                        				'width'=> '300'
                        			)
                        		);
                        		echo $this->Html->link(
                        			$img,
                        			$perfil_url,
                        			array('escape'=> false, 'class'=> 'darken')
                        			);
                        	?>
                   		 	<!-- <a class="darken" href="#"><img style="opacity: 1;" src="" class="attachment-spotlight wp-post-image" alt="test" title="" height="170" width="300"></a> -->
                        </div><!-- left-panel -->
                        <div class="right-panel">
                   			<h2>
                   				<?php
                   					echo $this->Html->link(
                   						$estabelecimento['Estabelecimento']['name'],
                   						$perfil_url
                   					);
                   				?>
                   			</h2>
                    		<div class="excerpt">
                    			<?php echo $estabelecimento['Estabelecimento']['descricao']; ?>
                    		</div>
                        	<div class="clearer"></div>
                        	<div class="more-button">
                        		<?php 
                        			echo $this->Html->link('&nbsp', $perfil_url, array('escape'=> false));
                        		?>
                        	</div>
                            <div class="post-meta">
                                <div class="date"> 
                                	10/10/2010
                                </div>
                                <div class="comments">
                                	<?php
                                		echo $this->Html->link(
                                			count($estabelecimento['Comentario']) . 
                                			' Comentários',
                                			array('controller' => 'site', 'action' => 'perfil')
                                		);
                                	?>
                                </div><!-- comments -->     
                                <div class="clearer"></div>
                            </div><!-- post-meta -->
						</div><!-- Right panel -->
					</div><!-- category panel -->
                    <div class="clearer"></div>                        
				<?php endforeach ?>
				<br class="clearer" />
				<?php echo $this->element('Site/paginator'); ?>
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