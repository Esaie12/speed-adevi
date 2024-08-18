<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminControl;
use App\Http\Middleware\UserControl;
use App\Http\Middleware\CompleteProfil;

Route::get('/', function () {
    return redirect()->route('user_dashboard');
    //return view('welcome');
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
    Route::get('final-pack/{id}',[App\Http\Controllers\CategoryController::class, 'final_pack'])->name('final_pack');

    Route::get('subscription-list', [App\Http\Controllers\SubscriptionController::class, 'user_subscription'] )->name('user_subscription');
    Route::get('subscription-show/{id}', [App\Http\Controllers\SubscriptionController::class, 'subscription_show'] )->name('user_subscription_show');
    Route::get('tranches', [App\Http\Controllers\SubscriptionController::class, 'user_tranches'] )->name('user_tranche');


    Route::get('paiement-kkia/{id_cursus}',  [App\Http\Controllers\PaymentController::class, 'payments'])->name('paiement_kkia');
    Route::get('paiement-tranche-kkia',  [App\Http\Controllers\PaymentController::class, 'payments_tranche'])->name('paiement-tranche-kkia');
    Route::get('make-donate-paiement-kkia', [App\Http\Controllers\PaymentController::class, 'payments_donate'])->name('donate_paiement_kkia');

    Route::get('paiement-feda/{id_cursus}',  [App\Http\Controllers\FedaPayController::class, 'payments'])->name('paiement_feda');
    Route::get('paiement-tranche-feda',  [App\Http\Controllers\FedaPayController::class, 'payments_tranche'])->name('paiement-tranche-feda');
    Route::get('make-donate-paiement-feda', [App\Http\Controllers\FedaPayController::class, 'payments_donate'])->name('donate_paiement_feda');


    Route::get('paiement/{id_cursus}',  [App\Http\Controllers\FeexPayController::class, 'payments'])->name('paiement');
    Route::get('paiement-tranche',  [App\Http\Controllers\FeexPayController::class, 'payments_tranche'])->name('paiement-tranche');
    Route::get('make-donate-paiement', [App\Http\Controllers\FeexPayController::class, 'payments_donate'])->name('donate_paiement');

    Route::prefix('collect-dons')->group(function () {
        Route::get('list', [App\Http\Controllers\CollectController::class, 'dons_collects'])->name('user_dons_index');
        Route::get('show/{id}',  [App\Http\Controllers\CollectController::class, 'show_dons_collects'])->name('show_dons_collects');
    });

    Route::prefix('invoices')->group(function () {
        Route::get('list', [App\Http\Controllers\InvoiceController::class , 'list_invoices_user'])->name('list_invoices_user');
        Route::get('show/{id}', [App\Http\Controllers\InvoiceController::class , 'show_invoice'])->name('user_invoice_show');
        Route::get('pdf/{id}', [App\Http\Controllers\InvoiceController::class , 'export_invoice'])->name('user_invoice_export');
    });
});





Route::middleware(['auth', AdminControl::class ])->prefix('admin')->group(function () {

    Route::get('home', [App\Http\Controllers\AppController::class, "admin_dashboard"])->name('admin_dashboard');
    Route::get('profil', [App\Http\Controllers\UserController::class, "admin_profil"])->name('admin_profil');
    Route::post('profil-save', [App\Http\Controllers\UserController::class, 'profil_update_admin'])->name('admin_profil_update');


    Route::get('plateforme', [App\Http\Controllers\AppController::class, "manage_plateforme"])->name('plateforme');
    Route::post('plateforme-manage', [App\Http\Controllers\AppController::class, "update_plateforme"])->name('plateforme_update');

    Route::get('admins-list', [App\Http\Controllers\UserController::class, 'list_admins'])->name('list_admins');
    Route::get('users-list', [App\Http\Controllers\UserController::class, 'list_users'])->name('list_users');
    Route::get('block-user/{id}', [App\Http\Controllers\UserController::class, 'block_user'])->name('block_user');
    Route::get('unblock-user/{id}', [App\Http\Controllers\UserController::class, 'unblock_user'])->name('unblock_user');

    Route::prefix('collabo')->group(function () {
        Route::get('add', [App\Http\Controllers\UserController::class, 'add_admin'])->name('add_admin');
        Route::post('save', [App\Http\Controllers\UserController::class, 'save_admin'])->name('admin_save');
        Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit_admin'])->name('edit_admin');
        Route::post('update', [App\Http\Controllers\UserController::class, 'update_admin'])->name('admin_update');
    });

    Route::prefix('category')->group(function () {
        Route::get('list',[App\Http\Controllers\CategoryController::class , 'adminListCategory'] )->name('admin_category_index');
        Route::post('save',[App\Http\Controllers\CategoryController::class , 'saveCategory'] )->name('admin_category_save');
        Route::get('edit/{id}',[App\Http\Controllers\CategoryController::class , 'editCategory'] )->name('admin_category_edit');
        Route::post('update',[App\Http\Controllers\CategoryController::class , 'updateCategory'] )->name('admin_category_update');
        Route::get('delete/{id}',[App\Http\Controllers\CategoryController::class , 'deleteCategory'] )->name('admin_category_delete');
    });

    Route::prefix('cursus')->group(function () {
        Route::get('list',[App\Http\Controllers\CursusController::class, 'admin_list_cursus'] )->name('admin_cursus_index');
        Route::post('save',[App\Http\Controllers\CursusController::class , 'admin_cursus_save'] )->name('admin_cursus_save');
        Route::get('delete/{id}',[App\Http\Controllers\CursusController::class , 'deleteCursus'] )->name('admin_cursus_delete');
        Route::get('edit/{id}',[App\Http\Controllers\CursusController::class , 'editCursus'] )->name('admin_cursus_edit');
        Route::post('update',[App\Http\Controllers\CursusController::class , 'admin_cursus_update'] )->name('admin_cursus_update');

    });

    Route::get('tranches', [App\Http\Controllers\SubscriptionController::class, 'admin_list_tranche'] )->name('admin_list_tranche');
    Route::get('subscription-list', [App\Http\Controllers\SubscriptionController::class, 'admin_subscription'] )->name('admin_subscription_list');
    Route::get('subscription-show/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_subscription_show'] )->name('admin_subscription_show');
    Route::get('confirm-pay/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_tranche_pay'] )->name('admin_confirm_pay');
    Route::get('confirm-livraison/{id}', [App\Http\Controllers\SubscriptionController::class, 'admin_livrer'])->name('admin_livrer');

    Route::prefix('subscription')->group(function () {
        Route::get('finish/{id}', [App\Http\Controllers\SubscriptionController::class, 'finish_subscription_admin'])->name('finish_subscription_admin');
        Route::get('stopping/{id}', [App\Http\Controllers\SubscriptionController::class, 'stop_subscription_admin'])->name('stop_subscription_admin');
        Route::get('reactivaion/{id}', [App\Http\Controllers\SubscriptionController::class, 'reactiver_subscription_admin'])->name('reactiver_subscription_admin');
    });

    Route::prefix('collect-dons')->group(function () {
        Route::get('list', [App\Http\Controllers\CollectController::class, 'admin_dons_collects'])->name('admin_dons_index');
        Route::get('create',  [App\Http\Controllers\CollectController::class, 'create_dons_collects'])->name('create_dons_collects');
        Route::post('save',  [App\Http\Controllers\CollectController::class, 'save_dons'])->name('admin_dons_save');
        Route::get('edit/{id}',  [App\Http\Controllers\CollectController::class, 'edit_dons_collects'])->name('edit_dons_collects');
        Route::post('update',  [App\Http\Controllers\CollectController::class, 'update_dons'])->name('admin_dons_update');
        Route::get('delete/{id}',  [App\Http\Controllers\CollectController::class, 'delete_dons_collects'])->name('delete_dons_collects');
    });

    Route::prefix('invoices')->group(function () {
        Route::get('list', [App\Http\Controllers\InvoiceController::class , 'list_invoices_admin'])->name('list_invoices_admin');
        Route::get('show/{id}', [App\Http\Controllers\InvoiceController::class , 'show_invoice'])->name('admin_invoice_show');
        Route::get('pdf/{id}', [App\Http\Controllers\InvoiceController::class , 'export_invoice'])->name('admin_invoice_export');
    });

});

Route::get('truncate-notifications', [App\Http\Controllers\AppController::class, 'truncate_all_notifications'])->name('truncate_all_notifications');


Route::get('test', function(){ return view('test'); });
Route::get('test2', [App\Http\Controllers\AppController::class, 'test2'] )->name('test2');
