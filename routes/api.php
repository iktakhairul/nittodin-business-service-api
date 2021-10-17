<?php
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix'=>'api/'], function() use($router) {
    /**
     * Business Category Routes
     */
    $router->get('business-category', 'BusinessCategoryController@index');
    $router->post('business-category', 'BusinessCategoryController@store');
    $router->get('business-category/{id}', 'BusinessCategoryController@show');
    $router->put('business-category/{id}', 'BusinessCategoryController@update');
    $router->delete('business-category/{id}', 'BusinessCategoryController@destroy');

    /**
     * Business Routes
     */
    $router->get('business', 'BusinessController@index');
    $router->post('business', 'BusinessController@store');
    $router->get('business/{id}', 'BusinessController@show');
    $router->put('business/{id}', 'BusinessController@update');
    $router->delete('business/{id}', 'BusinessController@destroy');

    /**
     * Business Authority Routes
     */
    $router->get('business-authority', 'BusinessAuthorityController@index');
    $router->post('business-authority', 'BusinessAuthorityController@store');
    $router->get('business-authority/{id}', 'BusinessAuthorityController@show');
    $router->put('business-authority/{id}', 'BusinessAuthorityController@update');
    $router->delete('business-authority/{id}', 'BusinessAuthorityController@destroy');

    /**
     * Authority Profile Routes
     */
    $router->get('authority-profile', 'AuthorityProfileController@index');
    $router->post('authority-profile', 'AuthorityProfileController@store');
    $router->get('authority-profile/{id}', 'AuthorityProfileController@show');
    $router->put('authority-profile/{id}', 'AuthorityProfileController@update');
    $router->delete('authority-profile/{id}', 'AuthorityProfileController@destroy');

    /**
     * Authority Profile Documents Routes
     */
    $router->get('authority-profile-documents', 'AuthorityProfileDocumentsController@index');
    $router->post('authority-profile-documents', 'AuthorityProfileDocumentsController@store');
    $router->get('authority-profile-documents/{id}', 'AuthorityProfileDocumentsController@show');
    $router->put('authority-profile-documents/{id}', 'AuthorityProfileDocumentsController@update');
    $router->delete('authority-profile-documents/{id}', 'AuthorityProfileDocumentsController@destroy');

    /**
     * Business Details Routes
     */
    $router->get('business-details', 'BusinessDetailsController@index');
    $router->post('business-details', 'BusinessDetailsController@store');
    $router->get('business-details/{id}', 'BusinessDetailsController@show');
    $router->put('business-details/{id}', 'BusinessDetailsController@update');
    $router->delete('business-details/{id}', 'BusinessDetailsController@destroy');

    /**
     * Business Identical Documents Routes
     */
    $router->get('business-identical-documents', 'BusinessIdenticalDocumentsController@index');
    $router->post('business-identical-documents', 'BusinessIdenticalDocumentsController@store');
    $router->get('business-identical-documents/{id}', 'BusinessIdenticalDocumentsController@show');
    $router->put('business-identical-documents/{id}', 'BusinessIdenticalDocumentsController@update');
    $router->delete('business-identical-documents/{id}', 'BusinessIdenticalDocumentsController@destroy');

    /**
     * Business Private Documents Routes
     */
    $router->get('business-private-documents', 'BusinessPrivateDocumentsController@index');
    $router->post('business-private-documents', 'BusinessPrivateDocumentsController@store');
    $router->get('business-private-documents/{id}', 'BusinessPrivateDocumentsController@show');
    $router->put('business-private-documents/{id}', 'BusinessPrivateDocumentsController@update');
    $router->delete('business-private-documents/{id}', 'BusinessPrivateDocumentsController@destroy');
});
