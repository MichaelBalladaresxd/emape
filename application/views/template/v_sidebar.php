<div class="sidebar" data-background-color="dark2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="https://ricv.pe/wp-content/uploads/2018/07/cropped-23031663_1835170486510397_2454251087538217690_n-3.jpg" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true" >
						<span >
							<?php
							// $perfil = perfil();
							// ver($perfil);
							// echo $perfil->fullname; 
							?>
							<!-- <span class="user-level"><?php echo strtoupper($_SESSION['tipoUser']); ?></span> -->
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>
					<div class="collapse in show" id="collapseExample">
						<ul class="nav">
						<!-- 	<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li> -->
							<li>
								<a href="<?php echo base_url('logout'); ?>">
									<span class="link-collapse">Cerrar Sesión</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-default" id="sideBar">
				<?php 
				foreach (GEM_MENU as $key => $value) {
					?>
					<li class="nav-item">
						<a href="<?php echo base_url().$value['page']; ?>">
							<i class="<?php echo (isset($value['icon']))?$value['icon']:''; ?>"></i>
							<p><?php echo $value['title']; ?></p>
						</a>
					</li>
					<?php 
				}
				?>
			</ul>
		</div>
	</div>
</div>