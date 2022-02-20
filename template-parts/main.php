<?php
/*
 * Template Name: Main
 *
 */

get_header();
?>

<div id="content" class="relative site-content text-light pb-5">

<!-- Title Section -->

<div class="w-full pt-32 lg:pt-52 pb-10 bg-title">

    <div class="container mx-auto flex">
        <div class="w-full lg:w-3/5 text-sm lg:text-3xl font-thin">
            <h1>an nft collection you can play with</h1>
            <div class="w-3/4">
                <p>The first ever NFT you can use <nobr>in-game</nobr> from the get go.</p>
                <p>SkinFT is an NFT skin collection designed for <span class="minecraft">MineCraft</span></p>
            </div>
            <div class="flex justify-between items-center mt-5 w-11/12">
                <div><a href="" class="inline-block text-xl lg:text-4xl text-white bg-primary p-3 rounded font-normal hover:bg-[#56952b] mr-2">Mint a SkinFT</a></div>
                <div class="text-center text-xs lg:text-xl">
                    <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skin-sample.png" class=" w-28 h-auto lg:w-auto mx-auto mb-4" />
                    <p>In-game image file</p>
                </div>
            </div>
        </div>
        <div class="hidden lg:block w-2/5 text-center text-xs lg:text-xl">
            <img src="<?=get_stylesheet_directory_uri()?>/assets/img/3-model-sample.png" class="mb-4" />
            <p>3d model of the SkinFT</p>
        </div>
    </div>
</div>

<!-- /Title Section -->
<!-- What is SkinFT? -->
<div class="container mx-auto pt-24 pb-10" id="skinft">
    <div class="w-full mb-16 text-center"><h2><span>W</span>hat is <span>S</span>kin<span>FT?</span></h2></div>
    <div class="flex gap-4">
        <div class="w-2/5">
            <div class="flex justify-around w-full mb-4">
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r1-1.png" width="175" height="175"/>
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r1-2.png"/>
            </div>
            <div class="flex justify-around w-full mb-4">
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r2-1.png" width="175" height="175"/>
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r2-2.png"/>
            </div>
            <div class="flex justify-around w-full">
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r3-1.png" width="175" height="175"/>
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft-r3-2.png"/>
            </div>
        </div>
        <div class="w-3/5 flex justify-between flex-col">
            <p>SkinFT is a first of its kind collection of 7777 unique Minecraft skins. Each SkinFT is algorithmically composed from a pool of professionaly designed elements.</p>
            <p>When you mint a SkinFT, you are rewarded with two images.<br/>
    The first is an image file can be imported to <span class="minecraft">MineCraft</span> and your character can wear it proudly in-game.<br/>
    Imagine beating the Ender Dragon while wearing one of your SkinFTs. Wouldn’t that be a once in a lifetime experience!</p>
            <p>The second image is a 3d model of your SkinFT. You can show it to your friends and share it on your favorite social network.</p>
            <p>The future of SkinFT will be decided by our community. You can make an impact on the next game that will get SkinFTs.</p>
        </div>
    </div>
</div>
<!-- /What is SkinFT? -->
<!-- FAQ -->
<div class="container mx-auto pt-24 pb-16" id="faq">
    <div class="text-center mb-16"><h2><span>FAQ</span></h2></div>
    <div class="flex">
        <div class="w-3/5">
            <p>
                <strong class="block mb-3">What is the price of a SkinFT?</strong>
                Each SkinFT you mint is 0.077 ETH.
            </p>
            <p>
                <strong class="block mb-3">When can I get some SkinFTs?</strong>
                The SkinFT sale date will be announced soon.
            </p>
            <p>
                <strong class="block mb-3">Are there secondary sale royalties?</strong>
                No. Once you mint a SkinFT, it is 100% yours. 
            </p>
            <p>
                <strong class="block mb-3">Where can I view my SkinFTs?</strong>
                In the My SkinFTs section you can view both files.<br/>
                The collection is also displayed on OpenSea.<br/>
                Some wallets support NFTs as well.
            </p>
            <p>
                <strong class="block mb-3">How do I use my SkinFT in-game?</strong>
                <span class="text-xl">
                    <strong>Java edition</strong>: In the launcher, before playing, select the “Skins” tab and click on the “New Skin” plus icon. Then select your SkinFT.<br/>
                    <strong>Bedrock:</strong> Go to “Dressing Room” <nobr>-></nobr> “Edit Character” <nobr>-></nobr> “Owned” <nobr>-></nobr> “Import” <nobr>-></nobr> “Choose New Skin” and select your SkinFT 
                </span>
            </p>
        </div>
        <div class="w-2/5"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/faq.png" class="mx-auto"/></div>
    </div>
</div>
<!-- /FAQ -->

</div>

<?php

get_footer();