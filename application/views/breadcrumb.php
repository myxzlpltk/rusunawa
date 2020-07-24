<div id="breadcrumbs-wrapper">
	<div class="container">
		<div class="row">
			<div class="col s10 m6 l6">
				<h5 class="breadcrumbs-title"><?= $title ?></h5>
				<ol class="breadcrumbs">
					<?php $last = ucwords(array_pop($breadcrumb)) ?>
					<?php
						$breadcrumb = array_values($breadcrumb);
						for($i=0;$i<count($breadcrumb);$i++){
							$link = array();
							for($j=0;$j<=$i;$j++){
								$link[] = $breadcrumb[$j];
							}
							$link = html_escape(implode('/', $link));
							$now = ucwords(html_escape($breadcrumb[$i]));

							echo '<li><a href="'.base_url($link).'">'.humanize($now).'</a></li>';
						}
					?>
					<li class="active"><?= humanize($last) ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>