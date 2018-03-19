<?php if(isset($_SESSION)): ?>
	<?php session_start(); ?>
<?php endif; ?>

<?php if(isset($_SESSION["errors"])): ?>

	<div class="alert alert-danger alert-dismissable fade show text-center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<b><?php echo $_SESSION["errors"][0]; ?></b>
		<?php unset($_SESSION["errors"][0]); ?>
	</div>						

<?php endif; ?>

<?php if(isset($_SESSION["success"])): ?>

	<div class="alert alert-success alert-dismissable fade show text-center">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<b><?php echo $_SESSION["errors"][0]; ?></b>
		<?php unset($_SESSION["errors"][0]); ?>
	</div>						

<?php endif; ?>