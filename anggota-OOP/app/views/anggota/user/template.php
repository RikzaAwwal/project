<div class="container bg-light mt-2 mb-3 p-3">
	<div class="d-flex justify-content-between mb-3">
    	<div class="btn-group">
    		<button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
				Views
		  	</button>
		  	<ul class="dropdown-menu">
			    <li><a class="dropdown-item" href="<?= BASEURL; ?>/anggota">Grid <i class="bi bi-grid float-end"></i></a></li>
			    <li><a class="dropdown-item list" href="<?= BASEURL; ?>/anggota/list">List <i class="bi bi-list-ul float-end"></i></a></li>
		  	</ul>
    	</div>
    	<form action="<?= BASEURL; ?>/anggota/cari" method="post" style="width: 35%;">
	    	<div class="input-group">
			 	<input type="text" class="form-control" placeholder="Search..." name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off">
				<button class="btn btn-outline-info bi bi-search" type="submit" id="button-addon2"></button>
			</div>
		</form>
 	</div>
 	<hr>
 	<div class="d-flex justify-content-between mb-3">
	 	<div>
	 		<?php Alert::flash(); ?>
	 	</div>
	 	<div>
	 	</div>
 	</div>