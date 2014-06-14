		<title><?php echo $this->title ?></title>
		<link rel="icon" href="<?php echo $this->favicon ?>" type="image/vnd.microsoft.icon" />
		<link rel="shortcut icon" href="<?php echo $this->favicon ?>" type="image/vnd.microsoft.icon" />
		<?php
			foreach ($this->script as $key => $value) {
				?>
				<script type="text/javascript" src="<?php echo $value ?>"></script>
				<?php
			}
		?>
		<link rel="stylesheet" href="<?php echo $this->rootURL ?>/css/styles.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $this->rootURL ?>/js/scripts.js"></script>