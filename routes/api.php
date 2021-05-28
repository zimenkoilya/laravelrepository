<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;

use App\Http\Controllers\API\v1\AccountController;

use App\Http\Controllers\API\v1\system\UserController as SystemUserController;
use App\Http\Controllers\API\v1\system\DepartmentController as SystemDepartmentController;
use App\Http\Controllers\API\v1\system\RoleController as SystemRoleController;
use App\Http\Controllers\API\v1\system\PermissionController as SystemPermissionController;
use App\Http\Controllers\API\v1\system\CompanyController as SystemCompanyController;
use App\Http\Controllers\API\v1\system\CampaignController as SystemCampaignController;
use App\Http\Controllers\API\v1\system\CampaignGroupController as SystemCampaignGroupController;
use App\Http\Controllers\API\v1\system\AccountingTypeController as SystemAccountingTypeController;
use App\Http\Controllers\API\v1\system\PaymentScheduleTypeController as SystemPaymentScheduleTypeController;
use App\Http\Controllers\API\v1\system\DocumentTemplateController as SystemDocumentTemplateController;
use App\Http\Controllers\API\v1\system\ServiceController as SystemServiceController;
use App\Http\Controllers\API\v1\system\DistributionGroupController as SystemDistributionGroupController;
use App\Http\Controllers\API\v1\system\StatusController as SystemStatusController;
use App\Http\Controllers\API\v1\system\MilestoneController as SystemMilestoneController;
use App\Http\Controllers\API\v1\system\ActionController as SystemActionController;
use App\Http\Controllers\API\v1\system\TriggerTypeController as SystemTriggerTypeController;
use App\Http\Controllers\API\v1\system\TriggerController as SystemTriggerController;
use App\Http\Controllers\API\v1\system\ImportController as SystemImportController;
use App\Http\Controllers\API\v1\system\ExportController as SystemExportController;
use App\Http\Controllers\API\v1\system\ListController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('logout', [LoginController::class, 'logout']);

    Route::get('user', [UserController::class, 'current']);
    Route::get('users', [UserController::class, 'list']);

    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);
});

Route::middleware('guest:sanctum')->group(function () {
    // Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend']);
});

// V1 APIs for SPA 
Route::group([
    'prefix' => 'v1'
], function () {
    Route::group([
        'middleware' => 'auth:sanctum'
    ], function() {
        Route::get('account/profile', [AccountController::class, 'profile'])->name('api.v1.system.account.profile');

        Route::group([
            'prefix' => 'system'
        ], function() {
            Route::get('accounting_type/all', [SystemAccountingTypeController::class, 'all'])->name('api.v1.system.accounting_type.all');
            Route::apiResource('accounting_type', SystemAccountingTypeController::class)->names([
                'index' => 'api.v1.system.accounting_type.index',
                'store' => 'api.v1.system.accounting_type.store',
                'show' => 'api.v1.system.accounting_type.show',
                'update' => 'api.v1.system.accounting_type.update',
                'destroy' => 'api.v1.system.accounting_type.destroy',
            ]);

            Route::get('payment_schedule_type/all', [SystemPaymentScheduleTypeController::class, 'all'])->name('api.v1.system.payment_schedule_type.all');
            Route::apiResource('payment_schedule_type', SystemPaymentScheduleTypeController::class)->names([
                'index' => 'api.v1.system.payment_schedule_type.index',
                'store' => 'api.v1.system.payment_schedule_type.store',
                'show' => 'api.v1.system.payment_schedule_type.show',
                'update' => 'api.v1.system.payment_schedule_type.update',
                'destroy' => 'api.v1.system.payment_schedule_type.destroy',
            ]);

            Route::get('document_template/all', [SystemDocumentTemplateController::class, 'all'])->name('api.v1.system.document_template.all');
            Route::apiResource('document_template', SystemDocumentTemplateController::class)->names([
                'index' => 'api.v1.system.document_template.index',
                'store' => 'api.v1.system.document_template.store',
                'show' => 'api.v1.system.document_template.show',
                'update' => 'api.v1.system.document_template.update',
                'destroy' => 'api.v1.system.document_template.destroy',
            ]);

            Route::get('service/all', [SystemServiceController::class, 'all'])->name('api.v1.system.service.all');
            Route::apiResource('service', SystemServiceController::class)->names([
                'index' => 'api.v1.system.service.index',
                'store' => 'api.v1.system.service.store',
                'show' => 'api.v1.system.service.show',
                'update' => 'api.v1.system.service.update',
                'destroy' => 'api.v1.system.service.destroy',
            ]);

            // Route::get('company/schedule', [SystemCompanyController::class, 'schedule'])->name('api.v1.system.company.schedule');
            // Route::post('company/schedule', [SystemCompanyController::class, 'update_schedule'])->name('api.v1.system.company.update_schedule');
            Route::apiResource('company', SystemCompanyController::class)->names([
                'index' => 'api.v1.system.company.index',
                'store' => 'api.v1.system.company.store',
                'show' => 'api.v1.system.company.show',
                'update' => 'api.v1.system.company.update',
                'destroy' => 'api.v1.system.company.destroy',
            ]);

            Route::apiResource('campaign', SystemCampaignController::class)->names([
                'index' => 'api.v1.system.campaign.index',
                'store' => 'api.v1.system.campaign.store',
                'show' => 'api.v1.system.campaign.show',
                'update' => 'api.v1.system.campaign.update',
                'destroy' => 'api.v1.system.campaign.destroy',
            ]);

            Route::get('campaign_group/all', [SystemCampaignGroupController::class, 'all'])->name('api.v1.system.campaign_group.all');
            Route::apiResource('campaign_group', SystemCampaignGroupController::class)->names([
                'index' => 'api.v1.system.campaign_group.index',
                'store' => 'api.v1.system.campaign_group.store',
                'show' => 'api.v1.system.campaign_group.show',
                'update' => 'api.v1.system.campaign_group.update',
                'destroy' => 'api.v1.system.campaign_group.destroy',
            ]);

            Route::apiResource('status', SystemStatusController::class)->names([
                'index' => 'api.v1.system.status.index',
                'store' => 'api.v1.system.status.store',
                'show' => 'api.v1.system.status.show',
                'update' => 'api.v1.system.status.update',
                'destroy' => 'api.v1.system.status.destroy',
            ]);

            Route::apiResource('milestone', SystemMilestoneController::class)->names([
                'index' => 'api.v1.system.milestone.index',
                'store' => 'api.v1.system.milestone.store',
                'show' => 'api.v1.system.milestone.show',
                'update' => 'api.v1.system.milestone.update',
                'destroy' => 'api.v1.system.milestone.destroy',
            ]);

            Route::get('action/all', [SystemActionController::class, 'all'])->name('api.v1.system.action.all');
            Route::apiResource('action', SystemActionController::class)->names([
                'index' => 'api.v1.system.action.index',
                'store' => 'api.v1.system.action.store',
                'show' => 'api.v1.system.action.show',
                'update' => 'api.v1.system.action.update',
                'destroy' => 'api.v1.system.action.destroy',
            ]);

            Route::get('trigger_type/all', [SystemTriggerTypeController::class, 'all'])->name('api.v1.system.trigger_type.all');
            Route::apiResource('trigger_type', SystemTriggerTypeController::class)->names([
                'index' => 'api.v1.system.trigger_type.index',
                'store' => 'api.v1.system.trigger_type.store',
                'show' => 'api.v1.system.trigger_type.show',
                'update' => 'api.v1.system.trigger_type.update',
                'destroy' => 'api.v1.system.trigger_type.destroy',
            ]);

            Route::apiResource('trigger', SystemTriggerController::class)->names([
                'index' => 'api.v1.system.trigger.index',
                'store' => 'api.v1.system.trigger.store',
                'show' => 'api.v1.system.trigger.show',
                'update' => 'api.v1.system.trigger.update',
                'destroy' => 'api.v1.system.trigger.destroy',
            ]);

            Route::get('distribution_group/all', [SystemDistributionGroupController::class, 'all'])->name('api.v1.system.distribution_group.all');
            Route::apiResource('distribution_group', SystemDistributionGroupController::class)->names([
                'index' => 'api.v1.system.distribution_group.index',
                'store' => 'api.v1.system.distribution_group.store',
                'show' => 'api.v1.system.distribution_group.show',
                'update' => 'api.v1.system.distribution_group.update',
                'destroy' => 'api.v1.system.distribution_group.destroy',
            ]);

            Route::apiResource('import', SystemImportController::class)->names([
                'index' => 'api.v1.system.import.index',
                'store' => 'api.v1.system.import.store',
                'show' => 'api.v1.system.import.show',
                'update' => 'api.v1.system.import.update',
                'destroy' => 'api.v1.system.import.destroy',
            ]);

            Route::apiResource('export', SystemExportController::class)->names([
                'index' => 'api.v1.system.export.index',
                'store' => 'api.v1.system.export.store',
                'show' => 'api.v1.system.export.show',
                'update' => 'api.v1.system.export.update',
                'destroy' => 'api.v1.system.export.destroy',
            ]);

            Route::get('department/all', [SystemDepartmentController::class, 'all'])->name('api.v1.system.department.all');
            Route::apiResource('department', SystemDepartmentController::class)->names([
                'index' => 'api.v1.system.department.index',
                'store' => 'api.v1.system.department.store',
                'show' => 'api.v1.system.department.show',
                'update' => 'api.v1.system.department.update',
                'destroy' => 'api.v1.system.department.destroy',
            ]);

            Route::get('user/all', [SystemUserController::class, 'all'])->name('api.v1.system.user.all');
            Route::apiResource('user', SystemUserController::class)->names([
                'index' => 'api.v1.system.user.index',
                'store' => 'api.v1.system.user.store',
                'show' => 'api.v1.system.user.show',
                'update' => 'api.v1.system.user.update',
                'destroy' => 'api.v1.system.user.destroy',
            ]);

            Route::get('role/all', [SystemRoleController::class, 'all'])->name('api.v1.system.role.all');
            Route::post('role/{id}/duplicate', [SystemRoleController::class, 'duplicate'])->name('api.v1.system.role.duplicate');
            Route::post('role/{id}/permissions', [SystemRoleController::class, 'permissions'])->name('api.v1.system.role.permissions');
            Route::apiResource('role', SystemRoleController::class)->names([
                'index' => 'api.v1.system.role.index',
                'store' => 'api.v1.system.role.store',
                'show' => 'api.v1.system.role.show',
                'update' => 'api.v1.system.role.update',
                'destroy' => 'api.v1.system.role.destroy',
            ]);

            Route::get('permission/all', [SystemPermissionController::class, 'all'])->name('api.v1.system.permission.all');
            Route::apiResource('permission', SystemPermissionController::class)->names([
                'index' => 'api.v1.system.permission.index',
                'store' => 'api.v1.system.permission.store',
                'show' => 'api.v1.system.permission.show',
                'update' => 'api.v1.system.permission.update',
                'destroy' => 'api.v1.system.permission.destroy',
            ]);

            Route::get('ip/all', [SystemPermissionController::class, 'all'])->name('api.v1.system.permission.all');
            Route::apiResource('permission', SystemPermissionController::class)->names([
                'index' => 'api.v1.system.permission.index',
                'store' => 'api.v1.system.permission.store',
                'show' => 'api.v1.system.permission.show',
                'update' => 'api.v1.system.permission.update',
                'destroy' => 'api.v1.system.permission.destroy',
            ]);

            Route::apiResource('list', ListController::class)->names([
                'index' => 'api.v1.system.list.index',
                'store' => 'api.v1.system.list.store',
                'show' => 'api.v1.system.list.show',
                'update' => 'api.v1.system.list.update',
                'destroy' => 'api.v1.system.list.destroy',
            ]);
        });
    });
});
