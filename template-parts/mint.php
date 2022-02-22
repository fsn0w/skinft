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

            <div class="inline-block mx-auto text-center bg-[#f7f0e834] py-8 px-32 rounded">
                <h2 class="hidden text-center text-light mb-16 lg:block"><span>M</span>int your <span>S</span>kin<span>FT</span></h2> 
                <div class="whitespace-nowrap text-light text-3xl text-center flex flex-row justify-center items-center my-4 lg:text-5xl">
                    <button class="minus border-[3px] border-light rounded-lg w-8 h-8 font-light leading-[1px] mt-2 mx-4 lg:mt-4 lg:mx-8 lg:w-12 lg:h-12">&#8211;</button>
                        <span><input value="1" id="mint_n" class="mint-number bg-transparent border-0 inline-block w-8 font-bold text-5xl text-center lg:w-12 lg:text-7xl" disabled />/7</span>
                    <button class="plus border-[3px] border-light rounded-lg w-8 h-8 font-light leading-[1px] mt-2 mx-4 lg:mt-4 lg:mx-8 lg:w-12 lg:h-12">&#43;</button>
                </div>
                <span class="text-light text-lg lg:text-2xl">Price: 
                    <input value="0.05" class="mint-price bg-transparent border-0 inline-block w-12 font-bold text-center text-lg lg:w-14 lg:text-2xl" disabled /> 
                    <span class="text-xs font-bold lg:text-sm">ETH</span>
                </span> 
                <div class="mt-16 text-center relative">
                    <button id="mintbtn" class="inline-block text-xl lg:text-4xl text-white bg-primary p-3 rounded font-normal hover:bg-[#56952b] mr-2 whitespace-nowrap">Mint</button>
                </div>
            </div>
</div>

<!-- /Mint Section -->

</div>

<?php

get_footer();