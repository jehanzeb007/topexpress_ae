<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Location\Models\City;
use Botble\Setting\Models\Setting as SettingModel;
use Botble\Slug\Models\Slug;
use SlugHelper;

class SettingSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingModel::whereIn('key', ['media_random_hash'])->delete();

        SettingModel::insertOrIgnore([
            [
                'key' => 'media_random_hash',
                'value' => md5(time()),
            ],
        ]);

        SettingModel::insertOrIgnore([
            [
                'key' => 'payment_bank_transfer_status',
                'value' => '1',
            ],
            [
                'key' => 'payment_stripe_name',
                'value' => 'Pay online via Stripe',
            ],
            [
                'key' => 'payment_stripe_description',
                'value' => 'Payment with Stripe',
            ],
            [
                'key' => 'payment_stripe_client_id',
                'value' => '',
            ],
            [
                'key' => 'payment_stripe_secret',
                'value' => '',
            ],
            [
                'key' => 'payment_stripe_status',
                'value' => '1',
            ],
            [
                'key' => 'payment_paypal_name',
                'value' => 'Pay online via PayPal',
            ],
            [
                'key' => 'payment_paypal_description',
                'value' => 'Payment with PayPal',
            ],
            [
                'key' => 'payment_paypal_client_id',
                'value' => '',
            ],
            [
                'key' => 'payment_paypal_secret',
                'value' => '',
            ],
            [
                'key' => 'payment_paypal_status',
                'value' => '1',
            ],
            [
                'key' => 'real_estate_square_unit',
                'value' => 'm²',
            ],
            [
                'key' => 'real_estate_convert_money_to_text_enabled',
                'value' => '1',
            ],
            [
                'key' => 'real_estate_thousands_separator',
                'value' => ',',
            ],
            [
                'key' => 'real_estate_decimal_separator',
                'value' => '.',
            ],
            [
                'key' => 'real_estate_enabled_register',
                'value' => '1',
            ],
            [
                'key' => 'verify_account_email',
                'value' => '1',
            ],
            [
                'key' => SlugHelper::getPermalinkSettingKey(Post::class),
                'value' => 'news',
            ],
            [
                'key' => SlugHelper::getPermalinkSettingKey(Category::class),
                'value' => 'news',
            ],
            [
                'key' => SlugHelper::getPermalinkSettingKey(City::class),
                'value' => 'city',
            ],
            [
                'key' => 'real_estate_review_enabled',
                'value' => '1',
            ],
            [
                'key' => 'real_estate_review_fields',
                'value' => '[[{"key":"field","value":"service"}],[{"key":"field","value":"value"}],[{"key":"field","value":"location"}],[{"key":"field","value":"cleanliness"}]]',
            ],
        ]);

        Slug::where('reference_type', Post::class)->update(['prefix' => 'news']);
        Slug::where('reference_type', Category::class)->update(['prefix' => 'news']);
        Slug::where('reference_type', City::class)->update(['prefix' => 'city']);
    }
}
