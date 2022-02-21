</main>

<?php do_action( 'skinft_content_end' ); ?>

</div>

<?php do_action( 'skinft_content_after' ); ?>

<footer id="colophon" class="site-footer pt-12 pb-16 lg:pb-56 bg-footer text-dark" role="contentinfo">
	<?php do_action( 'skinft_footer' ); ?>

	<div class="max-w-3xl mx-auto">
		<div class="w-full flex flex-col lg:flex-row">
			<div class="w-full lg:w-1/2 text-sm">
				<img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft.svg" width="366" height="83" alt="SkinFT" class="mx-auto mb-6 lg:mx-0"/>
				<span class="hidden lg:inline">@2022-All rights reserved to SkinFT</span>
			</div>
			<div class="w-full lg:w-1/2">
				<div class="flex justify-center lg:justify-end gap-10 mt-4 mb-2"> 
					<a href="https://twitter.com/ft_skin" target="_blank" class="icon-tw-br w-10 h-10 border-b-0 hover:brightness-125 lg:w-14 lg:h-14"></a>
					<a href="https://discord.com/channels/933955962308542495/933955965034856539" target="_blank" class="icon-ds-br w-10 h-10 border-b-0 hover:brightness-125 lg:w-14 lg:h-14"></a>
				</div>
				<div class="text-center lg:text-right mb-8">
					<a href="https://rinkeby.etherscan.io/address/0xcFf1D4DBF5C54546a553866C12094a624a33450a#code" class="border-text lg:text-2xl text-base underline" target="_blank">Verified Smart Contract</a>
					<span class="block mt-4 lg:hidden">@2022-All rights reserved to SkinFT</span>
				</div>
			</div>
		</div>
	</div>
	<p class="text-xs px-3 lg:px-0 lg:text-sm text-center">SkinFT is in no way associated with, endorsed by, or a partner of Minecraft, Mojang, Microsoft or any related parties.</p>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
