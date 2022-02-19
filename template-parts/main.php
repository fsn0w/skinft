<?php
/*
 * Template Name: Main
 *
 */

get_header();
?>

<div id="content" class="relative site-content text-light pb-5">

<!-- Title Section -->

<div class="flex pt-32 lg:pt-52 pb-10 bg-title">

    <div class="container mx-auto flex">
        <div class="w-full lg:w-3/5 text-sm lg:text-3xl font-thin">
            <h1>an nft collection you can play with</h1>
            <div class=" w-3/4">
                <p>The first ever NFT you can use in-game from the get go.</p>
                <p>SkinFT is an NFT skin collection designed for <span class="minecraft">MineCraft</span></p>
            </div>
            <div class="flex justify-between items-center mt-5">
                <div><a href="" class="inline-block text-xl lg:text-4xl text-white bg-primary p-3 rounded font-normal hover:bg-[#56952b] mr-2">Mint a SkinFT</a></div>
                <div class="text-center text-xs lg:text-xl">
                    <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skin-sample.png" class=" w-28 h-auto lg:w-auto mx-auto mb-4" />
                    <p>In-game image file</p>
                </div>
            </div>
        </div>
        <div class="hidden lg:block w-2/5 text-center">
            <img src="<?=get_stylesheet_directory_uri()?>/assets/img/3-model-sample.png" class="mb-4" />
            <p>3d model of the SkinFT</p>
        </div>
    </div>
</div>

<!-- /Title Section -->

</div>

<?php

get_footer();