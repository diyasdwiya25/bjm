<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    $verticalMenuSalesAdminJson = file_get_contents(base_path('resources/menu/verticalMenuSalesAdmin.json'));
    $verticalMenuSalesAdminData = json_decode($verticalMenuSalesAdminJson);

    $verticalMenuSalesJson = file_get_contents(base_path('resources/menu/verticalMenuSales.json'));
    $verticalMenuSalesData = json_decode($verticalMenuSalesJson);

    $verticalMenuCustomerJson = file_get_contents(base_path('resources/menu/verticalMenuCustomer.json'));
    $verticalMenuCustomerData = json_decode($verticalMenuCustomerJson);


    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData,$verticalMenuSalesAdminData,$verticalMenuSalesData,$verticalMenuCustomerData]);
  }
}
