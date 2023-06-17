<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('/', function ($routes) {
    $routes->get('', 'User\IndexController::index');
    $routes->post('today/attendance', 'User\IndexController::insertAttendance');
    $routes->group('profile', static function ($routes) {
        $routes->get('', 'User\IndexController::profileUser');
        $routes->get('profile', 'User\ProfileController::index');
        $routes->get('settings', 'User\SettingsController::index');
    });
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->group('payroll', static function ($routes) {
        $routes->get('', 'Admin\PayrollController::indexPayroll');
        $routes->get('data/(:any)/(:any)', 'Admin\PayrollController::printPayroll/$1/$2');
        $routes->get('data/(:any)', 'Admin\PayrollController::dataPayroll/$1');
        $routes->post('add', 'Admin\PayrollController::insertPayroll');
        $routes->get('details/(:num)', 'Admin\PayrollController::indexPayrollDetail/$1');
        $routes->post('calculate', 'Admin\PayrollController::calculatePayroll');
        $routes->post('update', 'Admin\PayrollController::updatePayroll');
        $routes->post('delete', 'Admin\PayrollController::deletePayroll');
    });
    $routes->group('employee', function ($routes) {
        $routes->group('attendance', static function ($routes) {
            $routes->get('', 'Admin\AttendanceController::indexAttendance');
            $routes->post('add', 'Admin\AttendanceController::insertAttendance');
            $routes->post('update', 'Admin\AttendanceController::updateAttendance');
            $routes->post('delete', 'Admin\AttendanceController::deleteAttendance');
            $routes->post('singledelete', 'Admin\AttendanceController::deleteSingleAttendance');
        });
        $routes->group('allowance', static function ($routes) {
            $routes->get('', 'Admin\UserAllowanceController::indexAllowance');
            $routes->post('add', 'Admin\UserAllowanceController::insertAllowance');
            $routes->post('update', 'Admin\UserAllowanceController::updateAllowance');
            $routes->post('delete', 'Admin\UserAllowanceController::deleteAllowance');
        });
        $routes->group('bonus', static function ($routes) {
            $routes->get('', 'Admin\UserBonusController::indexBonus');
            $routes->post('add', 'Admin\UserBonusController::insertBonus');
            $routes->post('update', 'Admin\UserBonusController::updateBonus');
            $routes->post('delete', 'Admin\UserBonusController::deleteBonus');
        });
        $routes->group('deduction', static function ($routes) {
            $routes->get('', 'Admin\UserDeductionController::indexDeduction');
            $routes->post('add', 'Admin\UserDeductionController::insertDeduction');
            $routes->post('update', 'Admin\UserDeductionController::updateDeduction');
            $routes->post('delete', 'Admin\UserDeductionController::deleteDeduction');
        });
        $routes->group('leave', static function ($routes) {
            $routes->get('', 'Admin\LeaveController::indexLeave');
            $routes->post('add', 'Admin\LeaveController::insertLeave');
            $routes->post('approve', 'Admin\LeaveController::approveLeave');
            $routes->post('decline', 'Admin\LeaveController::declineLeave');
            });
        $routes->get('', 'Admin\UserController::indexUser');
        $routes->get('data/(:num)', 'Admin\UserController::dataUser/$1');
        $routes->post('add', 'Admin\UserController::insertUser');
        $routes->post('update', 'Admin\UserController::updateUser');
        $routes->post('delete', 'Admin\UserController::deleteUser');
    });
    $routes->group('settings', function ($routes) {
        $routes->group('allowance', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertAllowance');
            $routes->get('data/(:num)', 'Admin\SettingsController::getAllowance/$1');
            $routes->post('update', 'Admin\SettingsController::updateAllowance');
            $routes->post('delete', 'Admin\SettingsController::deleteAllowance');
        });
        $routes->group('bonus', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertBonus');
            $routes->get('data/(:num)', 'Admin\SettingsController::getBonus/$1');
            $routes->post('update', 'Admin\SettingsController::updateBonus');
            $routes->post('delete', 'Admin\SettingsController::deleteBonus');
        });
        $routes->group('deduction', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertDeduction');
            $routes->get('data/(:num)', 'Admin\SettingsController::getDeduction/$1');
            $routes->post('update', 'Admin\SettingsController::updateDeduction');
            $routes->post('delete', 'Admin\SettingsController::deleteDeduction');
        });
        $routes->group('department', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertDepartment');
            $routes->get('data/(:num)', 'Admin\SettingsController::getDepartment/$1');
            $routes->post('update', 'Admin\SettingsController::updateDepartment');
            $routes->post('delete', 'Admin\SettingsController::deleteDepartment');
        });
        $routes->group('payment-method', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertPaymentMethod');
            $routes->get('data/(:num)', 'Admin\SettingsController::getPaymentMethod/$1');
            $routes->post('update', 'Admin\SettingsController::updatePaymentMethod');
            $routes->post('delete', 'Admin\SettingsController::deletePaymentMethod');
        });
        $routes->group('position', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertPosition');
            $routes->get('data/(:num)', 'Admin\SettingsController::getPosition/$1');
            $routes->post('update', 'Admin\SettingsController::updatePosition');
            $routes->post('delete', 'Admin\SettingsController::deletePosition');
        });
        $routes->group('salary', static function ($routes) {
            $routes->post('add', 'Admin\SettingsController::insertSalary');
            $routes->get('data/(:num)', 'Admin\SettingsController::getSalary/$1');
            $routes->post('update', 'Admin\SettingsController::updateSalary');
            $routes->post('delete', 'Admin\SettingsController::deleteSalary');
        });
        $routes->group('web-data', static function ($routes) {
            $routes->get('data/(:num)', 'Admin\SettingsController::getWebData/$1');
            $routes->post('update', 'Admin\SettingsController::updateWebData');
        });
    $routes->get('', 'Admin\SettingsController::index');
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
