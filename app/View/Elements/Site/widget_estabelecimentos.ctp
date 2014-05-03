<div class="widget-wrapper" style="margin-top:45px">
	<div class="widget">
		<div id="tabbed-reviews" class="complex-list">
			
			<ul class="tabnav">
				<li>
					<a href="#tabs-os_restaurant-">Restaurantes</a>
				</li>
				<li>
					<a href="#tabs-os_movie-">Bares</a>
				</li>
				<li>
					<a href="#tabs-os_fashion-">Festas</a>
				</li>
				<li>
					<a href="#tabs-os_product-">Todos</a>
				</li>
			</ul>

			<br class="clearer" />

			<div class="tabdiv-wrapper">
				<div id="tabs-os_restaurant-" class="tabdiv">
					<ul>
						<li>
							<div class="icon" style="background-color:#cf6925">
								<?php
									echo $this->Html->image(
										'review-restaurant-light.png',
										array('url'=> '#'));
								?>
							</div>
							<div class="floatleft">
								<?php
									echo $this->Html->link(
										$this->Html->image('Estabelecimentos/1/70x70_20140106002621.jpg'),
										array(),
										array('escape'=> false, 'class'=> 'thumbnail darken small')
									);
								?>	 
							</div>
							<div class="floatleft">
								<?php
									echo $this->Html->link(
										'<strong>Nome</strong>',
										array('controller' => '', 'action' => ''),
										array('escape'=> false, 'class'=> 'post-title'));
								?>
								<br>
								Volta Redonda
							</div>
							<br class="clearer" /> 
						</li>
						<li class="more" title="Ver todos"><a href="#">Mais</a></li>
						<li class="last">&nbsp;</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>