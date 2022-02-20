</main>

<?php do_action( 'skinft_content_end' ); ?>

</div>

<?php do_action( 'skinft_content_after' ); ?>

<footer id="colophon" class="site-footer pt-12 pb-56 bg-footer text-dark" role="contentinfo">
	<?php do_action( 'skinft_footer' ); ?>

	<div class="max-w-3xl mx-auto">
		<div class="flex ">
			<div class="w-1/2 text-sm">
				<img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft.svg" class="mb-6" width="366" height="83"/>
				@2022-All rights reserved to SkinFT
			</div>
			<div class="w-1/2">
				<div class="flex justify-end gap-10 mt-4 mb-2"> 
					<a href="https://twitter.com/" target="_blank" class="icon-tw-br w-10 h-10 border-b-0 hover:brightness-125 lg:w-14 lg:h-14"></a>
					<a href="https://discord.gg/" target="_blank" class="icon-ds-br w-10 h-10 border-b-0 hover:brightness-125 lg:w-14 lg:h-14"></a>
				</div>
				<div class="text-right mb-8"><a href="" class="border-text lg:text-2xl text-base underline" target="_blank">Verified Smart Contract</a></div>
			</div>
		</div>
	</div>
	<p class="text-sm text-center">SkinFT is in no way associated with, endorsed by, or a partner of Minecraft, Mojang, Microsoft or any related parties.</p>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
