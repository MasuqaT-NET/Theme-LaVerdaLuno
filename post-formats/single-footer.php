<footer class="article-footer">
	<div class="ninja_onebutton">
	<script type="text/javascript">
	//<![CDATA[
	(function(d){
	if(typeof(window.NINJA_CO_JP_ONETAG_BUTTON_fbe46ce8651f06acc4ba37fb41573c3e)=='undefined'){
		document.write("<sc"+"ript type='text\/javascript' src='\/\/omt.shinobi.jp\/b\/fbe46ce8651f06acc4ba37fb41573c3e'><\/sc"+"ript>");
	}else{
		window.NINJA_CO_JP_ONETAG_BUTTON_fbe46ce8651f06acc4ba37fb41573c3e.ONETAGButton_Load();}
	})(document);
	//]]>
	</script><span class="ninja_onebutton_hidden" style="display:none;"><?php the_permalink(); ?></span><span style="display:none;" class="ninja_onebutton_hidden"><?php the_title(); ?></span>
	</div>
	<?php if(is_single()) { ?>
		<nav id="nav-below" class="cf post-navigation" role="navigation">
			<?php previous_post_link('<div class="nav-previous">%link</div>', '<span class="meta-nav"><i class="fa fa-chevron-left"></i> Previous Article</span> %title'); ?>
			<?php next_post_link('<div class="nav-next">%link</div>', '<span class="meta-nav">Next Article <i class="fa fa-chevron-right"></i></span> %title'); ?>
		</nav>
	<?php } ?>
</footer>