<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-secondary antialiased font-sans font-thin text-base xl:text-2xl xl:leading-8' ); ?>>

<?php do_action( 'skinft_site_before' ); ?>

<div id="page" class="flex flex-col overflow-x-hidden">

	<?php do_action( 'skinft_header' ); ?>
	<header class="absolute w-full z-50 bg-header xl:h-40">
		<div class="mx-auto xl:bg-menuline mt-9 lg:mt-16">
			<div class="mx-auto xl:flex xl:justify-between xl:items-center container">
				<div class="w-full flex justify-between items-center mt-14 xl:mt-0">
					<div>
						<a href="/" title="SkinFT">
							<img src="<?=get_stylesheet_directory_uri()?>/assets/img/skinft.svg" alt="SkinFT" height="41" width="179" class=" max-w-[160px]">
						</a>
					</div>

					<div class="xl:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.6879 5.38508H3.44181H2.40861C1.95542 5.38508 1.52602 5.36177 1.19571 5.3268C0.865407 5.29183 0.0528493 5.20116 0.0158548 4.47327C0.0158548 4.36318 0 3.91116 0 3.69616C0 3.48116 0 3.2273 0 3.14052C0 3.05374 0.0105699 2.94883 0.0158548 2.88148C0.0158548 2.85169 0.0158548 2.81673 0.00660616 2.78564C0 2.66907 0 2.06034 0 2.05256C0 1.8557 0 1.57852 0.00660616 1.45807C0.0475643 0.392134 1.9726 0.36882 1.98845 0.367525L8.24713 0.354574L11.4947 0.346802H12.8516C14.2204 0.346802 15.8495 0.346802 17.83 0.354574H19.7154L22.1927 0.380477C22.5468 0.380477 22.9855 0.576051 22.9974 1.46066C22.9974 1.5591 22.9974 1.83627 22.9974 2.07717L22.9749 2.61338V2.64705C22.963 2.72736 22.9524 2.81025 22.9432 2.86853C22.9432 2.90221 22.959 2.99805 22.959 2.99805L22.9789 3.29983C22.9934 3.65342 23.0079 4.07694 23.0079 4.17926V4.4098C23.0079 5.1118 22.2707 5.23095 21.9509 5.28276C21.6014 5.33811 21.248 5.36626 20.894 5.36695H19.9598C17.4138 5.37731 14.4014 5.3799 14.371 5.3799H10.0295L5.6879 5.38508Z" fill="#37271B"/>
							<path d="M5.6879 12.6925H3.44181H2.40861C1.95542 12.6925 1.52602 12.6691 1.19571 12.6342C0.865407 12.5992 0.0528493 12.5085 0.0158548 11.7742C0.0158548 11.6641 0 11.2121 0 10.9971C0 10.7821 0 10.5282 0 10.4427C0 10.3572 0.0105699 10.251 0.0158548 10.1772C0.0158548 10.1474 0.0158548 10.1124 0.00660616 10.0814C0 9.97515 0 9.36512 0 9.35864C0 9.16177 0 8.8859 0.00660616 8.76415C0.0475643 7.69951 1.9726 7.6749 1.98845 7.6749L8.24713 7.66195L11.4947 7.65417H12.8516C14.2204 7.65417 15.8495 7.65417 17.83 7.66195H19.7154L22.1835 7.68655C22.5468 7.68655 22.9841 7.88213 22.9974 8.76674C22.9974 8.86647 22.9974 9.14235 22.9974 9.38455L22.9749 9.91946V9.95313C22.963 10.0347 22.9524 10.1176 22.9432 10.1759C22.9432 10.2083 22.959 10.3054 22.959 10.3054L22.9789 10.6072C22.9934 10.9608 23.0079 11.3843 23.0079 11.4879V11.7172C23.0079 12.4192 22.2707 12.5396 21.9509 12.5901C21.6014 12.6455 21.248 12.6736 20.894 12.6743H19.9598C17.4138 12.6847 14.4014 12.6873 14.371 12.6873H10.0295L5.6879 12.6925Z" fill="#37271B"/>
							<path d="M5.6879 19.9987H3.44181H2.41389C2.00698 19.9972 1.60041 19.9756 1.19571 19.934C0.853516 19.8977 0.0528493 19.8135 0.0158548 19.0856C0.0158548 18.9742 0 18.5235 0 18.3085C0 18.0935 0 17.8397 0 17.7542C0 17.6687 0.0105699 17.5625 0.0158548 17.4951C0.0158548 17.4653 0.0158548 17.4291 0.00660616 17.398C0 17.2814 0 16.6714 0 16.6649C0 16.468 0 16.1922 0.00660616 16.0704C0.0475643 15.0058 1.9726 14.9812 1.98845 14.9812L8.24713 14.9682L11.4947 14.9604H12.8516C14.2204 14.9604 15.8495 14.9604 17.83 14.9682H19.7154L22.1927 14.9941C22.5468 14.9941 22.9855 15.1884 22.9974 16.073C22.9974 16.1727 22.9974 16.4499 22.9974 16.6908L22.9749 17.2257V17.2607C22.963 17.341 22.9524 17.4239 22.9432 17.4822C22.9432 17.5146 22.959 17.6052 22.959 17.6052L22.9789 17.907C22.9934 18.2619 23.0079 18.6906 23.0079 18.7877V19.0273C23.0079 19.728 22.2707 19.8485 21.9509 19.9003C21.6013 19.9544 21.2479 19.9825 20.894 19.9845H19.9598C17.4138 19.9948 14.4014 19.9974 14.371 19.9974H10.0295L5.6879 19.9987Z" fill="#37271B"/>
							<path d="M22.2046 1.47751C22.2046 1.56299 22.2046 1.8311 22.2046 2.07071L22.1901 2.41264V2.55122C22.1742 2.6639 22.1584 2.78047 22.1531 2.81026C22.1478 2.84677 22.1478 2.88384 22.1531 2.92035C22.1531 2.95143 22.1663 3.01749 22.1729 3.07059V3.12628L22.1874 3.32963C22.202 3.71819 22.2152 4.10674 22.2152 4.17927V4.40593C22.2152 4.45774 21.6206 4.58596 20.894 4.58985H19.9612C17.3861 4.60021 14.375 4.6028 14.375 4.6028H10.0334H5.6879H3.44181H2.40993C1.53263 4.6028 0.811237 4.5212 0.807273 4.43184C0.80331 4.34247 0.79274 3.91376 0.79274 3.69617C0.79274 3.47858 0.79274 3.24415 0.79274 3.16126C0.79274 3.07836 0.805952 2.93719 0.808595 2.91387C0.811241 2.88674 0.811241 2.85942 0.808595 2.83228C0.808595 2.81026 0.800667 2.75457 0.796704 2.71053C0.79274 2.66649 0.79274 2.26369 0.79274 2.05257C0.79274 1.84146 0.79274 1.5863 0.79274 1.48657C0.79274 1.38685 1.34105 1.14983 1.9911 1.14464H2.71645H4.28079L8.24449 1.13558C8.41493 1.13558 9.87621 1.13558 11.4921 1.12781H12.8516C14.2191 1.12781 15.8482 1.12781 17.8287 1.13558H19.7141L22.1729 1.16148C22.1928 1.26572 22.2034 1.37146 22.2046 1.47751Z" fill="white"/>
							<path d="M22.2046 8.78369C22.2046 8.87047 22.2046 9.13727 22.2046 9.37688L22.1901 9.71881V9.8587C22.1742 9.97008 22.1584 10.0879 22.1531 10.1177C22.1478 10.1542 22.1478 10.1913 22.1531 10.2278C22.1531 10.2576 22.1663 10.325 22.1729 10.3768V10.4325L22.1874 10.6358C22.202 11.0244 22.2152 11.4129 22.2152 11.4867V11.7121C22.2152 11.7652 21.6206 11.8934 20.894 11.896H19.9612C17.3861 11.9064 14.375 11.909 14.375 11.909H10.0334H5.6879H3.44181H2.40993C1.53263 11.909 0.811237 11.8274 0.807273 11.7393C0.80331 11.6512 0.79274 11.2148 0.79274 11.0036C0.79274 10.7925 0.79274 10.5516 0.79274 10.4687C0.79274 10.3858 0.805952 10.2447 0.808595 10.2226C0.811238 10.1951 0.811238 10.1673 0.808595 10.1398C0.808595 10.1177 0.800667 10.0633 0.796704 10.018C0.79274 9.97267 0.79274 9.57246 0.79274 9.35875C0.79274 9.14505 0.79274 8.89248 0.79274 8.79275C0.79274 8.69302 1.34105 8.45601 1.9911 8.45212H2.71645H4.28079L8.24449 8.44435L11.4947 8.4314H12.8516C14.2191 8.4314 15.8482 8.4314 17.8287 8.43917H19.7141L22.1729 8.46378C22.1931 8.56929 22.2037 8.67634 22.2046 8.78369Z" fill="white"/>
							<path d="M22.2046 16.0898C22.2046 16.1766 22.2046 16.4434 22.2046 16.6843L22.1901 17.0263V17.1648C22.1742 17.2775 22.1584 17.3941 22.1531 17.4239C22.1478 17.4604 22.1478 17.4975 22.1531 17.534C22.1531 17.5638 22.1663 17.6311 22.1729 17.6829V17.7399L22.1874 17.9433C22.202 18.3383 22.2152 18.7204 22.2152 18.7929V19.0196C22.2152 19.0714 21.6206 19.1996 20.894 19.2035H19.9612C17.3861 19.2138 14.375 19.2164 14.375 19.2164H10.0334H5.6879H3.44181H2.41257C1.53527 19.2164 0.81388 19.1348 0.809916 19.0468C0.805952 18.9587 0.79274 18.5209 0.79274 18.3098C0.79274 18.0987 0.79274 17.8578 0.79274 17.7762C0.79274 17.6946 0.805952 17.5508 0.808595 17.5288C0.811241 17.5017 0.811241 17.4743 0.808595 17.4472C0.808595 17.4239 0.800667 17.3695 0.796704 17.3177C0.79274 17.2659 0.79274 16.8773 0.79274 16.6649C0.79274 16.4525 0.79274 16.1999 0.79274 16.0989C0.79274 15.9979 1.34105 15.7622 1.9911 15.7583H2.71645H4.28079L8.24449 15.7492L11.4947 15.7375H12.8516C14.2191 15.7375 15.8482 15.7375 17.8287 15.7453H19.7141L22.1729 15.7699C22.1931 15.8754 22.2037 15.9825 22.2046 16.0898Z" fill="white"/>
							</svg>
						</a>
					</div>
				</div>
					<?php
					wp_nav_menu(
						array(
							'container_id'    => 'primary-menu',
							'container_class' => 'hidden block bg-white shadow-inner rounded-2xl mt-4 p-4 font-minecraft xl:shadow-none xl:mt-0 xl:p-0 xl:bg-transparent xl:block',
							'menu_class'      => 'items-center text-secondary xl:flex xl:text-white text-xl xl:-mt-2',
							'theme_location'  => 'primary',
							'li_class'        => 'main-menu px-4 whitespace-nowrap',
							'fallback_cb'     => false,
						)
					);
					?>
			</div>
		</div>
	</header>

