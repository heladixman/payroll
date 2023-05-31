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
    $routes->get('', 'Auth\AuthController::login');
    $routes->get('daftar', 'Auth\AuthController::register');
    $routes->get('forgot-password', 'Auth\AuthController::forgot_password');
    $routes->get('verification', 'Auth\AuthController::verification');
    $routes->group('user', ['filter' => 'role:admin'], static function ($routes) {
        $routes->get('/', 'User\HomeController::index');
        $routes->get('/profile', 'User\ProfileController::index');
        $routes->get('/settings', 'User\SettingsController::index');
    });
    $routes->group('dashboard', static function ($routes) {
        $routes->get('/', 'Admin\DashboardController::index');
    });
    $routes->group('employee', function ($routes) {
        $routes->group('attendance', static function ($routes) {
            $routes->get('', 'Admin\AttendanceController::index');
            $routes->get('/add', 'Admin\AttendanceController::add');
            $routes->post('/save', 'Admin\AttendanceController::save');
            $routes->delete('/delete/(:num)', 'Admin\AttendanceController::delete/$1');
        });
        $routes->group('allowance', static function ($routes) {
            $routes->get('', 'Admin\UserAllowanceController::index');
            $routes->get('/add', 'Admin\UserAllowanceController::add');
            $routes->post('/save', 'Admin\UserAllowanceController::save');
            $routes->delete('/delete/(:num)', 'Admin\UserAllowanceController::delete/$1');
        });
        $routes->group('bonus', static function ($routes) {
            $routes->get('/', 'Admin\UserBonusController::index');
            $routes->get('/add', 'Admin\UserBonusController::add');
            $routes->post('/save', 'Admin\UserBonusController::save');
            $routes->delete('/delete/(:num)', 'Admin\UserBonusController::delete/$1');
        });
        $routes->group('deduction', static function ($routes) {
            $routes->get('/', 'Admin\UserDeductionController::index');
            $routes->get('/add', 'Admin\UserDeductionController::add');
            $routes->post('/save', 'Admin\UserDeductionController::save');
            $routes->delete('/delete/(:num)', 'Admin\UserDeductionController::delete/$1');
        });
        $routes->group('leave', static function ($routes) {
            $routes->get('/', 'Admin\LeaveController::index');
            $routes->get('/add', 'Admin\LeaveController::add');
            $routes->post('/save', 'Admin\LeaveController::save');
            $routes->delete('/delete/(:num)', 'Admin\LeaveController::delete/$1');
        });
        $routes->get('/', 'Admin\UserController::index');
        $routes->get('/add', 'Admin\UserController::add');
        $routes->post('/save', 'Admin\UserController::save');
        $routes->delete('/delete/(:num)', 'Admin\UserController::delete/$1');
    });
    $routes->group('settings', function ($routes) {
        $routes->group('allowance', static function ($routes) {
            $routes->get('', 'Admin\AllowanceController::index');
            $routes->get('add', 'Admin\AllowanceController::add');
            $routes->post('save', 'Admin\AllowanceController::save');
            $routes->delete('delete/(:num)', 'Admin\AllowanceController::delete/$1');
        });
        $routes->group('bonus', static function ($routes) {
            $routes->get('', 'Admin\BonusController::index');
            $routes->get('/add', 'Admin\BonusController::add');
            $routes->post('/save', 'Admin\BonusController::save');
            $routes->delete('/delete/(:num)', 'Admin\BonusController::delete/$1');
        });
        $routes->group('deduction', static function ($routes) {
            $routes->get('', 'Admin\DeductionController::index');
            $routes->get('/add', 'Admin\DeductionController::add');
            $routes->post('/save', 'Admin\DeductionController::save');
            $routes->delete('/delete/(:num)', 'Admin\DeductionController::delete/$1');
        });
        $routes->group('department', static function ($routes) {
            $routes->get('', 'Admin\DepartmentController::index');
            $routes->get('/add', 'Admin\DepartmentController::add');
            $routes->post('/save', 'Admin\DepartmentController::save');
            $routes->delete('/delete/(:num)', 'Admin\DepartmentController::delete/$1');
        });
        $routes->group('payment-method', static function ($routes) {
            $routes->get('/', 'Admin\PaymentMethodController::index');
            $routes->get('/add', 'Admin\PaymentMethodController::add');
            $routes->post('/save', 'Admin\PaymentMethodController::save');
            $routes->delete('/delete/(:num)', 'Admin\PaymentMethodController::delete/$1');
        });
        $routes->group('position', static function ($routes) {
            $routes->get('/', 'Admin\PositionController::index');
            $routes->get('/add', 'Admin\PositionController::add');
            $routes->post('/save', 'Admin\PositionController::save');
            $routes->delete('/delete/(:num)', 'Admin\PositionController::delete/$1');
        });
        $routes->group('salary', static function ($routes) {
            $routes->get('/', 'Admin\SalaryController::index');
            $routes->get('/add', 'Admin\SalaryController::add');
            $routes->post('/save', 'Admin\SalaryController::save');
            $routes->delete('/delete/(:num)', 'Admin\SalaryController::delete/$1');
        });
        $routes->group('web-data', static function ($routes) {
            $routes->get('/', 'Admin\WebDataController::index');
            $routes->get('/add', 'Admin\WebDataController::add');
            $routes->post('/save', 'Admin\WebDataController::save');
            $routes->delete('/delete/(:num)', 'Admin\WebDataController::delete/$1');
        });
        $routes->get('/', 'Admin\SettingsController::index');
        $routes->get('/add', 'Admin\SettingsController::add');
        $routes->post('/save', 'Admin\SettingsController::save');
        $routes->delete('/delete/(:num)', 'Admin\SettingsController::delete/$1');
    });
});

// payroll
$routes->get('/payroll', 'Admin\Employee::index');
$routes->get('/payroll/add', 'Admin\Employee::Add');

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
