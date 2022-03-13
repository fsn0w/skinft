<?php
/*
 * Template Name: SkinFT
 *
 */

get_header();

$path = "/var/www/html/wp-content/themes/skinft/assets/json/";

$token = get_query_var('token');

$json = file_get_contents($path."real/".$token);
$nft = json_decode($json, true);

$nft_img = str_replace("://", "/", $nft['image']);

?>

<div id="content" class="relative site-content text-light">

<!-- SkinFT Section -->

    <div class="w-full pt-32 lg:pt-52 pb-32 bg-title text-center"> 
        <div class="container mx-auto">
            <h2 class="hidden text-center text-light mb-6 lg:mb-16 text-lg lg:block"><span>S</span>kin<span>FT #<?=$token?></span></h2>
            <div class="w-full flex flex-col justify-center lg:flex-row font-bold">
                <div class="flex flex-row w-full justify-around lg:w-1/3 lg:justify-center">
                    <span class="lg:px-3 mb-11 pt-2">Show SkinFT #</span>
                    <form action="" type="GET" class="flex flex-row rounded-xl border-4 border-light h-11 text-lg lg:text-2xl outline-none">
                        <input type="text" name="nft" id="nft_num" value="<?=$token?>" class="px-4 h-9 w-24 font-light text-light bg-transparent text-center focus-visible:outline-none" autofocus>
                        <input type="submit" value="Show" class="h-9 w-24 bg-light text-counter font-bold cursor-pointer">
                    </form>
                </div>
                <div class="w-full mb-11 lg:order-3 lg:w-1/3">
                    <h2 class="lg:hidden text-center text-light mb-6 lg:mb-16 text-lg lg:block"><span>S</span>kin<span>FT #<?=$token?></span></h2>
                    <img src="https://ipfs.io/<?=$nft_img?>" class="mx-auto mb-3"/>
                    <a href="" class="block underline">Download 3d model image</a>
                </div>
                <div class="w-full lg:flex lg:flex-col lg:justify-center lg:w-1/3">
                    <img src="<?=get_stylesheet_directory_uri()?>/assets/img/nft/ingame/322.png" class="mx-auto mb-3"/>
                    <a href="" class="block underline">Download in-game image</a>
                </div>
            </div> 
        </div>
    </div>

<!-- /SkinFT Section -->

</div>

<?php

get_footer();