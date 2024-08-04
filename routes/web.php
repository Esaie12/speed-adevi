<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminControl;
use App\Http\Middleware\UserControl;
use App\Http\Middleware\CompleteProfil;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth',UserControl::class , 'verified' ])->prefix('user')->group(function () {
    Route::get('profil', [App\Http\Controllers\AppController::class, "user_profil"])->name('user_profil');
    Route::post('update-profil', [App\Http\Controllers\AppController::class, "user_update_profil"])->name('update_profil');
    Route::post('update-password', [App\Http\Controllers\AppController::class, "update_password"])->name('update_password');

});

Route::middleware(['auth',UserControl::class , 'verified' , CompleteProfil::class ])->prefix('user')->group(function () {

    Route::get('home', [App\Http\Controllers\AppController::class, "user_dashboard"])->name('user_dashboard');
    Route::get('help', function () { return view('users.help'); })->name('help');

    Route::prefix('beneficiaire')->group(function () {
        Route::get('list', function () {  return view('users.enfant.list'); })->name('beneficiaire_list');
        Route::get('add', function () {  return view('users.enfant.add_child'); })->name('beneficiaire_add');
    });

    Route::get('pack', [App\Http\Controllers\CategoryController::class, 'category_pack_list'] )->name('pack_list');
    Route::get('pack-show/{slug}', [App\Http\Controllers\CategoryController::class, 'category_pack_show'] )->name('pack_show');

    Route::get('subscription-list', [App\Http\Controllers\SubscriptionController::class, 'user_subscription'] )->name('user_subscription');
    Route::get('subscription-show/{id}', [App\Http\Controllers\SubscriptionController::class, 'subscription_show'] )->name('user_subscription_show');
    Route::get('tranches', [App\Http\Controllers\SubscriptionController::class, 'user_tranches'] )->name('user_tranche');

    Route::get('paiement/{id_cursus}',  [App\Http\Controllers\PaymentController::class, 'payments'])->name('paiement');
    Route::get('paiement-tranche',  [App\Http\Controllers\PaymentController::class, 'payments_tranche'])->name('paiement-tranche');

    Route::prefix('collect-dons')->group(function () {
        Route::get('list', [App\Http\Controllers\CollectController::class, 'dons_collects'])->name('user_dons_index');
        Route::get('show/{id}',  [App\Http\Controllers\CollectController::class, 'show_dons_collects'])->name('show_dons_collects');
    });
});





Route::middleware(['auth', AdminControl::class ])->prefix('admin')->group(function () {

    Route::get('home', function () {
        return view('admin.dashboard');
    })->name('admin_dashboard');

    Route::prefix('category')->group(function () {
        Route::get('list',[App\Http\Controllers\CategoryController::class , 'adminListCategory'] )->name('admin_category_index');
        Route::post('save',[App\Http\Controllers\CategoryController::class , 'saveCategory'] )->name('admin_category_save');
        Route::get('edit/{id}',[App\Http\Controllers\CategoryController::class , 'editCategory'] )->name('admin_category_edit');
        Route::post('update',[App\Http\Controllers\CategoryController::class , 'updateCategory'] )->name('admin_category_update');
        Route::get('delete/{id}',[App\Http\Controllers\CategoryController::class , 'deleteCategory'] )->name('admin_category_delete');
    });

    Route::prefix('cursus')->group(function () {
        Route::get('list',[App\Http\Controllers\CursusController::class, 'admin_list_cursus'] )->name('admin_cursus_index');
    });

    Route::get('subscription-list', [App\Http\Controllers\SubscriptionController::class, 'admin_subscription'] )->name('admin_subscription_list');
    Route::get('subscription-show/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_subscription_show'] )->name('admin_subscription_show');
    Route::get('confirm-pay/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_tranche_pay'] )->name('admin_confirm_pay');
    Route::get('confirm-livraison/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_livrer'])->name('admin_livrer');

});

Route::get('truncate-notifications', [App\Http\Controllers\AppController::class, 'truncate_all_notifications'])->name('truncate_all_notifications');


