<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->bindRepositoryInterfaces();
    }

    /**
     * Bind repository interfaces to their concrete implementations.
     * 
     * @return void
     */
    private function bindRepositoryInterfaces()
    {
        $this->app->bind(
            \App\Repositories\Abstract\V1\AdminAccessibleRepositoryInterface::class,
            \App\Repositories\Concrete\V1\AdminAccessibleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\AdminRepositoryInterface::class,
            \App\Repositories\Concrete\V1\AdminRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\AssignedCouponRepositoryInterface::class,
            \App\Repositories\Concrete\V1\AssignedCouponRepository::class
        );

        //cart repository
        $this->app->bind(
            \App\Repositories\Abstract\V1\CartRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CartRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\CategoryRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\CityRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CityRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\CountryRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CountryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\CouponRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CouponRepository::class
        );

        //courier
        $this->app->bind(
            \App\Repositories\Abstract\V1\CourierRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CourierRepository::class
        );

        //currency
        $this->app->bind(
            \App\Repositories\Abstract\V1\CurrencyRepositoryInterface::class,
            \App\Repositories\Concrete\V1\CurrencyRepository::class
        );

        //module

        $this->app->bind(
            \App\Repositories\Abstract\V1\ModuleRepositoryInterface::class,
            \App\Repositories\Concrete\V1\ModuleRepository::class
        );

        //order item

        $this->app->bind(
            \App\Repositories\Abstract\V1\OrderItemRepositoryInterface::class,
            \App\Repositories\Concrete\V1\OrderItemRepository::class
        );

        $this->app->bind(
            \App\Repositories\Abstract\V1\OrderRepositoryInterface::class,
            \App\Repositories\Concrete\V1\OrderRepository::class
        );

        //settng
        $this->app->bind(
            \App\Repositories\Abstract\V1\SettingRepositoryInterface::class,
            \App\Repositories\Concrete\V1\SettingRepository::class
        );

        //smslog
        $this->app->bind(
            \App\Repositories\Abstract\V1\SmsLogRepositoryInterface::class,
            \App\Repositories\Concrete\V1\SmsLogRepository::class
        );

        // storebrach
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreBranchRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreBranchRepository::class
        );

        //storecart item
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreCartItemRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreCartItemRepository::class
        );

        //storecategry
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreCategoryRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreCategoryRepository::class
        );

        //storedevice
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreDeviceRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreDeviceRepository::class
        );

        //storeproductassignemntpermission
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductAssignmentPermissionRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductAssignmentPermissionRepository::class
        );

        //storeproductassignment
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductAssignmentRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductAssignmentRepository::class
        );

        //storeproductbarcode
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductBarcodeRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductBarcodeRepository::class
        );

        //storeproductrating
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductRatingRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductRatingRepository::class
        );

        //storeproduct
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductRepository::class
        );

        //storeproduct tag
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductTagRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductTagRepository::class
        );

        //storeproduct uplaod
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreProductUploadRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreProductUploadRepository::class
        );

        //store rating
        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreRatingRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreRatingRepository::class
        );

        //store

        $this->app->bind(
            \App\Repositories\Abstract\V1\StoreRepositoryInterface::class,
            \App\Repositories\Concrete\V1\StoreRepository::class
        );

        // ssytemcourrierRating

        $this->app->bind(
            \App\Repositories\Abstract\V1\SystemCourierRatingRepositoryInterface::class,
            \App\Repositories\Concrete\V1\SystemCourierRatingRepository::class
        );

        //tag

        $this->app->bind(
            \App\Repositories\Abstract\V1\TagRepositoryInterface::class,
            \App\Repositories\Concrete\V1\TagRepository::class
        );

        //tip

        $this->app->bind(
            \App\Repositories\Abstract\V1\TipRepositoryInterface::class,
            \App\Repositories\Concrete\V1\TipRepository::class
        );

        //unit

        $this->app->bind(
            \App\Repositories\Abstract\V1\UnitRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UnitRepository::class
        );

        //unit type

        $this->app->bind(
            \App\Repositories\Abstract\V1\UnitTypeRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UnitTypeRepository::class
        );

        //upload

        $this->app->bind(
            \App\Repositories\Abstract\V1\UploadRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UploadRepository::class
        );

        //used coupon

        $this->app->bind(
            \App\Repositories\Abstract\V1\UsedCouponRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UsedCouponRepository::class
        );

        //user address

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserAddressRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserAddressRepository::class
        );

        //user device

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserDeviceRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserDeviceRepository::class
        );

        //userfacorite store product

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserFavoriteStoreProductRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserFavoriteStoreProductRepository::class
        );

        //user favorite store

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserFavoriteStoreRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserFavoriteStoreRepository::class
        );

        //user interested category

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserInterestedCategoryRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserInterestedCategoryRepository::class
        );

        //user notification

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserNotificationRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserNotificationRepository::class
        );

        //user

        $this->app->bind(
            \App\Repositories\Abstract\V1\UserRepositoryInterface::class,
            \App\Repositories\Concrete\V1\UserRepository::class
        );

        //zonepricing

        $this->app->bind(
            \App\Repositories\Abstract\V1\ZonePricingRepositoryInterface::class,
            \App\Repositories\Concrete\V1\ZonePricingRepository::class
        );

        //zone

        $this->app->bind(
            \App\Repositories\Abstract\V1\ZoneRepositoryInterface::class,
            \App\Repositories\Concrete\V1\ZoneRepository::class
        );
    }
}
