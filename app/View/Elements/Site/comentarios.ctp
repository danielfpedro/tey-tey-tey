<!-- coloquei comentarios de wrap pq a hash deve ficar em portugues, se eu trocasse o 
comments ele perde o estilo pq o estilo estah no id -->

<div id="comentarios">
	<div id="comments">
		<div id="respond">
		
			<h3 id="reply-title">Deixe seu Comentário</h3>
			<?php
				echo $this->Form->create('Comentario',
					array('type'=> 'post', 'url'=> array('controller'=> 'comentarios','action'=> 'add'))
				);
			?>
			
				<p class="logged-in-as">
					Logado como <a href="#">Jason Miller</a>.
					<?php
						echo $this->Html->link('Deseja sair?', array('controller' => 'site', 'action' => 'logout'));
					?>
				</p>
				
				<div class="comment-form-comment">
					<div class="label"><label for="comment">Comentário</label></div>
					<div class="input-wrapper">
						<div class="shadow">
							<div class="icon">
								<?php
									echo $this->Form->text(
										'estabelecimento_id',
										array(
											'label'=> false,
											'type'=> 'hidden',
											'value'=> $estabelecimento['Estabelecimento']['id']
										)
									);
									echo $this->Form->textarea('texto', array('label'=> false));
								?>
								<!-- <textarea id="comment" name="comment" rows="8" cols="50"></textarea> -->
							</div>
						</div>
					</div>
				</div>
				
				<br class="clearer" />	
															
				<p class="form-submit">
					<button type="submit" class="btn-comentario">Comentar</button>
				</p>
			<?php echo $this->Form->end(); ?>
		</div>
	</div> 

	<br>
	<hr>
	<br>

	<!-- Lista comentarios -->
	<?php if (!empty($estabelecimento['Comentario'])): ?>
		<?php foreach ($estabelecimento['Comentario'] as $comentario): ?>
			<div class="media-wrap">
				<div class="media-thumb">
					<?php

						$img_url = ''.
							'Usuarios/' . 
							$comentario['Usuario']['id'] .
							'/' . 
							$comentario['Usuario']['Perfil']['imagem'];

						echo $this->Html->image($img_url, $options = array());
					?>
				</div>
				<div class="media-body">
					<h4>
						<?php echo $comentario['Usuario']['Perfil']['name']; ?>
					</h4>
					<p>
						<?php echo $comentario['texto']; ?>
					</p>
				</div>
				<br style="clear: both;">
			</div>
		<?php endforeach ?>
	<?php endif ?>

</div>