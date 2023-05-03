<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class KeysServiceProvider extends ServiceProvider
{
    const sliders = 'sliders';

    const brands = 'brands';

    const categories = 'categories';
    const amazing_products = 'amazing_products';
    const banner = 'banner';
    const most_seller_products = 'most_seller_products';
    const most_viewed_products = 'most_viewed_products';
    const cheapest_products = 'cheapest_products';
    const most_expensive_products = 'most_expensive_products';
    const newest_products = 'newest_products';
    const products_by_category = 'products_by_category';
    const products_by_brand = 'products_by_brand';
    const searched_products = 'products_by_brand';

    const user = 'user';
    const user_processing_count='user_process_count';
    const user_received_count='user_received_count';
    const user_rejected_count='user_rejected_count';
}
