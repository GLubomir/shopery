<div class="dropdown <?php echo $args['class'];?>">
	<div class="dropdown__current">
		<span><?php echo $args['current']?></span>
		<img src="<?php echo connect_image('icon/vector.svg')?>" alt="">
	</div>
	
	<ul class="dropdown__list">
		<?php foreach($args['items'] as $item) :?>
			<li class="dropdown__item"><?php echo $item;?></li>
		<?php endforeach;?>
	</ul>
</div>