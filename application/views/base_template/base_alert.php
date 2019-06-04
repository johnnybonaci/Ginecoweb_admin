								<?php if ($this->session->flashdata('success')): ?>
									
									<div class="alert alert-success">
										<button class="close" data-close="success" id="eliminar"></button>
										<span><?php echo $this->session->flashdata('success'); ?></span>
									</div>

								<?php endif ?>

								<?php if ($this->session->flashdata('error')): ?>

								<div class="alert alert-danger">
									<button class="close" data-close="danger" id="eliminar"></button>
										<span><?php echo $this->session->flashdata('error'); ?></span>
								</div>

								<?php endif ?>
								
								
								<?php if ($this->session->flashdata('danger')): ?>

								<div class="note note-danger">
									<button class="close" data-close="danger" id="eliminar"></button>
									<h4 class="block">No tiene suficientes privilegios para entrar en esta zona</h4>
										<span><?php echo $this->session->flashdata('danger'); ?></span>
								</div>

								<?php endif ?>