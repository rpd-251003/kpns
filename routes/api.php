<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RolePermissionController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::post('/user/profile-picture', [UserController::class, 'addProfilePicture']);
    Route::post('/user/change-password', [UserController::class, 'changePassword']);

    // ************************************************************************************************
    // member api area *******************************************************************************
    // ************************************************************************************************

    Route::prefix('member')->group(function () {
        Route::prefix('user-data')->middleware('role:member')->group(function () {
            Route::get('get', [UserDataController::class, 'getUserData']);
            Route::post('add', [UserDataController::class, 'add']);
            Route::put('update', [UserDataController::class, 'update']);
            Route::delete('delete', [UserDataController::class, 'delete']);
        });

        Route::prefix('transactions')->middleware('role:member')->group(function () {
            Route::get('/get', [TransactionController::class, 'index']);
            Route::get('/show/{id}', [TransactionController::class, 'show']);
            Route::post('/add', [TransactionController::class, 'create']);
            Route::delete('/delete/{id}', [TransactionController::class, 'delete']);
        });
    });

    // ************************************************************************************************
    // admin api area *********************************************************************************
    // ************************************************************************************************

    Route::prefix('admin')->middleware('role:admin')->group(function () {

        Route::prefix('deposit')->middleware('role:admin')->group(function () {
            Route::post('acc/{id}', [TransactionController::class, 'admin_acc_deposit']);
            Route::post('decline/{id}', [TransactionController::class, 'admin_dec_deposit']);
        });

        Route::prefix('roles')->middleware('role:admin')->group(function () {
            Route::get('get/', [RolePermissionController::class, 'indexRoles']);
            Route::post('add/', [RolePermissionController::class, 'storeRole']);
            Route::put('update/{id}', [RolePermissionController::class, 'updateRole']);
            Route::delete('delete/{id}', [RolePermissionController::class, 'destroyRole']);
        });

        Route::prefix('permissions')->middleware('role:admin')->group(function () {
            Route::get('get/', [RolePermissionController::class, 'indexPermissions']);
            Route::post('add/', [RolePermissionController::class, 'storePermission']);
            Route::put('update/{id}', [RolePermissionController::class, 'updatePermission']);
            Route::delete('delete/{id}', [RolePermissionController::class, 'destroyPermission']);
        });

        Route::post('/roles/{roleId}/permissions', [RolePermissionController::class, 'givePermissionToRole'])->middleware('role:admin');

        Route::prefix('user-data')->middleware('role:member')->group(function () {
            Route::get('get/{userId}', [UserDataController::class, 'admin_getUserData']);
            Route::post('add', [UserDataController::class, 'admin_add']);
            Route::put('update/{userId}', [UserDataController::class, 'admin_update']);
            Route::delete('delete/{userId}', [UserDataController::class, 'admin_delete']);
        });
    });
});
