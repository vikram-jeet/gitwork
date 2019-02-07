'use strict';
// Put here an address of your website
var baseURL = "http://php-wsdl:8888/";

window.app = angular.module('wsdl-app', ['ui.router', 'ngResource'])
    .constant("baseURL", baseURL)
    .config(function ($stateProvider, $urlRouterProvider) {
        $stateProvider
        // route for the home page
        .state('app', {
            url:'/',
            views: {
                'header': {
                    templateUrl : 'views/header.html'
                },
                'content': {
                    templateUrl : 'views/account.html',
                    controller  : 'AccountController'
                }
            }
        })
        .state('app.getAccountByID', {
            url:'get-account-id',
            views: {
                'content@': {
                    templateUrl : 'views/get-account.html',
                    controller  : 'AccountController'
                }
            }
        });
        $urlRouterProvider.otherwise('/');
    });
