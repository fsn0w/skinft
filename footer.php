</main>

<?php do_action( 'skinft_content_end' ); ?>

</div>

<?php do_action( 'skinft_content_after' ); ?>

<footer id="colophon" class="site-footer pt-12 pb-16 lg:pb-32 xl:pb-56 bg-footer text-dark" role="contentinfo">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/3.0.0-rc.5/web3.min.js"></script>

<script>
	function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
</script>

<script>

let currentAccount = null;
let web3;
let walletBtn = jQuery('.wallet-btn');
let walletBtnMsg = jQuery('.wallet-btn a');
let mintBtn = jQuery('#mintbtn');

let contactAddress = "0xcFf1D4DBF5C54546a553866C12094a624a33450a";
let abi = [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"approved","type":"address"},{"indexed":true,"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"operator","type":"address"},{"indexed":false,"internalType":"bool","name":"approved","type":"bool"}],"name":"ApprovalForAll","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":true,"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"IS_SALE_ACTIVE","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"MAX_SUPPLY","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"SALE_PRICE","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"approve","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"getApproved","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"operator","type":"address"}],"name":"isApprovedForAll","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"maxSkinftsPerMint","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tokensAmount","type":"uint256"}],"name":"mintReserved","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"tokensAmount","type":"uint256"}],"name":"mintSale","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"ownerOf","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"provenanceHash","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"safeTransferFrom","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"tokenId","type":"uint256"},{"internalType":"bytes","name":"_data","type":"bytes"}],"name":"safeTransferFrom","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"operator","type":"address"},{"internalType":"bool","name":"approved","type":"bool"}],"name":"setApprovalForAll","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"baseURI","type":"string"}],"name":"setBaseURI","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"_provenanceHash","type":"string"}],"name":"setProvenanceHash","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bool","name":"_isSaleActive","type":"bool"}],"name":"setSaleStatus","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bytes4","name":"interfaceId","type":"bytes4"}],"name":"supportsInterface","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"index","type":"uint256"}],"name":"tokenByIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"uint256","name":"index","type":"uint256"}],"name":"tokenOfOwnerByIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"tokenURI","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"tokenId","type":"uint256"}],"name":"transferFrom","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"withdraw","outputs":[],"stateMutability":"nonpayable","type":"function"}];

function detectMetaMask() {
            if (typeof window.ethereum !== 'undefined') {
                return true
            } else {
                return false
            }
        }

function handleAccountsChanged(accounts) {
            console.log('Calling handleAccountsChanged')

            if (accounts.length === 0) {
                console.log('Please connect to MetaMask.');
                walletBtnMsg.html('Connect with Metamask')
            } else if (accounts[0] !== currentAccount) {
                currentAccount = accounts[0];
				walletBtnMsg.html(currentAccount.substring(0, 4)+'...'+currentAccount.slice(-4))
				walletBtn.addClass('wallet-connected')
                if(currentAccount != null) {
                    // Set the button label
					walletBtnMsg.html(currentAccount.substring(0, 4)+'...'+currentAccount.slice(-4))
					walletBtn.addClass('wallet-connected')
                }
				//setCookie

				jQuery('#mintaction').removeClass("opacity-50 cursor-not-allowed pointer-events-none");
				setCookie('wallet',currentAccount,2);

				// goto Rinkeby network
				ethereum.request({ method: 'wallet_switchEthereumChain', params:[{chainId: '0x4'}]});

                //supplyTotal();

            }
        }

function supplyTotal() {
	var token = new web3.eth.Contract(
                        abi,
                        contactAddress
            );


	const totalSupply = token.methods.totalSupply().call().then(result => {
    	console.log(result);
	});

}

async function mint(maxTokens,tokens,amount) {
            console.log("Mint " + tokens + " // Amount: "+amount+" ETH")
            const skinftContract = new web3.eth.Contract(
                        abi,
                        contactAddress
            );
			skinftContract.methods.mintSale(tokens).send({ from: ethereum.selectedAddress, value: web3.utils.toWei(amount, "ether"), }).then(receipt=> {console.log(receipt)});
        }


async function connect() {
            console.log('Calling connect()')
            ethereum
            .request({ method: 'eth_requestAccounts' })
            .then(handleAccountsChanged)
            .catch((err) => {

                console.error(err);

            });

			window.ethereum.enable(); // get permission to access accounts

			// detect Metamask account change
			window.ethereum.on('accountsChanged', function (accounts) {
				handleAccountsChanged(accounts);
			});

			// detect Network account change
			window.ethereum.on('networkChanged', function(networkId){
				console.log('networkChanged',networkId);
				if (networkId != 1) {
					walletBtnMsg.html('Mainnet Network Only')
					walletBtn.addClass('wallet-error')
				}
				else {
					walletBtnMsg.html(currentAccount.substring(0, 4)+'...'+currentAccount.slice(-4))
					walletBtn.removeClass('wallet-error')
					walletBtn.addClass('wallet-connected')
				}
			});

        }

</script>
<script>

jQuery(document).ready(function() {
            m = detectMetaMask()
            if(m) {
				if (getCookie('wallet')) {
					connect()
				}
            } else {
				walletBtnMsg.html('Install Metamask')
				walletBtnMsg.attr('href','https://metamask.io/download.html')
				walletBtn.addClass('wallet-error')
            }

            try {
                web3 = new Web3(Web3.givenProvider);
            } catch (error) {
                alert(error)
            }

			// Main menu Btn

			walletBtn.click(function() {
                connect()
            });

			// Mint form

			mintBtn.click(function() {

				var maxTokens = "7";
				var tokens = jQuery("#mint_n").val();
				var amount = 0.077*tokens;

				if (tokens>0) {
					mint(maxTokens, tokens.toString(), amount.toString())
				}
			});

})

</script>


<script>
/*
 
	+/- buttons

*/

jQuery(document).ready(function($) {

	const mintMin = 1;
    const mintMax = 7;
	const tokenPrice = 0.077;

    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < mintMin ? mintMin : count;
        $input.val(count);
        $input.change();

		$('.mint-price').val((parseInt($input.val())*tokenPrice).toFixed(3));
		$('.mint-price').change();

        return false;
    });
    
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');

        if (parseInt($input.val())<mintMax) {
            $input.val(parseInt($input.val()) + 1);
            $input.change();

			$('.mint-price').val((parseInt($input.val())*tokenPrice).toFixed(3));
			$('.mint-price').change();
        }

        return false;
    });

});

</script>

</body>
</html>
