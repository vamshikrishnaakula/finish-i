<?php

// use App\Models\Shop;

// if (!function_exists('authenticateShop')) {
//     function authenticateShop(Shop $shop)
//     {
//         session(['shop' => $shop]);
//         return ;
//     }
// }

// if (!function_exists('unauthenticateShop')) {
//     function unauthenticateShop()
//     {
//         session()->forget('shop');
//         return ;
//     }
// }

// if (!function_exists('isAuthenticated')) {
//     function isAuthenticated()
//     {
//         return session()->has('shop');
//     }
// }

// if (!function_exists('isShopAuthenticated')) {
//     function isShopAuthenticated($url)
//     {
//         return session()->has('shop') && session()->get('shop')->shopify_url === $url;
//     }
// }

// if (!function_exists('shop')) {
//     function shop()
//     {
//         return session()->get('shop');
//     }
// }

// if (!function_exists('getCleanURL')) {
//     function getCleanURL($url)
//     {
//         return explode("/",preg_replace("(^https?://)", "", $url ))[0] ?? null;
//     }
// }
if (!function_exists('status')) {
    function status($text)
    {
        $statusArray	=	array('A'=>'<span class="status-btn active-btn">Active</span>',
								  'I'=>'<span class="status-btn info-btn">Inactive</span>',
								  'B'=>'<span class="status-btn warning-btn">Blocked</span>',
								  'D'=>'<span class="status-btn danger-btn">Deleted</span>');
		return $statusArray[$text];
    }
}
