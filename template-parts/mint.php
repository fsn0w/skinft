<?php
/*
 * Template Name: Mint
 *
 */

get_header();
?>

<div id="content" class="relative site-content text-light">

<!-- Mint Section -->

<div class="w-full pt-32 lg:pt-52 pb-32 bg-title text-center">

            <div class="inline-block mx-auto text-center bg-[#f7f0e834] p-6 lg:px-32 rounded relative">
                <h2 class="text-center text-light mb-6 lg:mb-16 text-lg lg:block"><span>M</span>int your <span>S</span>kin<span>FT</span></h2> 
                <div class="whitespace-nowrap text-light text-5xl text-center flex flex-row justify-center items-center my-4 lg:text-5xl">
                    <button class="minus border-[3px] border-light rounded-xl font-light w-12 h-12 leading-[1px] mt-2 mr-6 lg:mt-4 lg:mx-8 lg:w-12 lg:h-12">&#8211;</button>
                        <span><input value="1" id="mint_n" class="mint-number bg-transparent border-0 inline-block w-8 font-bold text-5xl text-center lg:w-12 lg:text-7xl" disabled />/7</span>
                    <button class="plus border-[3px] border-light rounded-xl font-light w-12 h-12 leading-[1px] mt-2 ml-6 lg:mt-4 lg:mx-8 lg:w-12 lg:h-12">&#43;</button>
                </div>
                <span class="text-light text-2xl">Price: 
                    <input value="0.077" class="mint-price bg-transparent border-0 inline-block w-20 font-bold text-center text-2xl lg:w-20" disabled /> 
                    <span class="font-bold text-sm">ETH</span>
                </span> 
                <div class="mt-6 lg:mt-16 text-center relative">
                    <button id="mintbtn" class="inline-block text-xl lg:text-4xl text-white bg-primary p-3 rounded font-normal hover:bg-[#56952b] mr-2 whitespace-nowrap">
                        <span class="hidden lg:inline">Mint</span><span class="lg:hidden">Mint a SkinFT</span></button>
                </div>
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/mint-3d-model-front.png" class="absolute h-32 w-auto -left-4 -bottom-24 lg:-left-60 lg:top-0" />
                <img src="<?=get_stylesheet_directory_uri()?>/assets/img/mint-3d-model-back.png" class="hidden absolute -right-60 -bottom-16 lg:inline-block" />
            </div>
</div>

<!-- /Mint Section -->

</div>

<?php

get_footer();