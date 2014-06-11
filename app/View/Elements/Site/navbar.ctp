<div id="top-menu-wrapper"> <!-- begin top menu -->
		<div id="top-menu">
			<div class="container mid">
				<div class="menu">
					<ul>
						<?php if (!$auth_flag): ?>
							<li>
								<?php echo $this->Html->link('Cadastre-se', array('controller' => 'site', 'action' => 'cadastro')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Login', array('controller' => 'site', 'action' => 'login')); ?>
							</li>							
						<?php else: ?>
							<li>
								<?php echo $this->Html->link('Meu dados', array('controller' => 'site', 'action' => 'meusDados')); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Sair', array('controller' => 'site', 'action' => 'logout')); ?>
							</li>
						<?php endif ?>
					</ul>                            
				</div> 
			</div>
			<!-- social links -->
			<div id="top-widget">
										
				<div class="top-social">
					<a href="https://facebook.com/agito.riosul" class="facebook" target="_blank">&nbsp;</a>
				</div>
			</div>     
			<br class="clearer" />
		</div>
	</div>
</div>