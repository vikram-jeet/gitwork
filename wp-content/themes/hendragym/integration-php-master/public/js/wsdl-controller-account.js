'use strict';
angular.module('wsdl-app')
    .controller('AccountController', ['$scope', '$http', 'AccountService', 'baseURL', function($scope, $http, AccountService, baseURL){
        var vm = this;
        // Get default enums
        vm.scheduleFrequencies = AccountService.GetScheduleFrequencies();
        vm.physicalCountries = AccountService.GetPhysicalCountries();
        vm.accountCountries = AccountService.GetAccountCountries();
        vm.mobileCountries = AccountService.GetMobileCountries();
        vm.accountTypes = AccountService.GetAccountTypes();
        vm.creditcards = AccountService.GetCreditCardTypes();
        vm.termTypes = AccountService.GetTermTypes();
        vm.getByIdRequest = {};
        vm.request = {};

        // Get all account details and send a PostCustomerAccount request
        vm.RequestPostCustomerAccount = function () {
            var postObj = vm.request;
            $http.post(baseURL + "account/create/", postObj)
                .success(function(data, status, headers, config){
                    $("#server-response").modal("show");
                    console.log("return: " +  data.response);
                    vm.serverResponse = data.response;
            });
        };

        vm.GetCustomerAccountById = function (method) {
        var getByIdObj = vm.getByIdRequest;
            getByIdObj.Method = method;
        var getRequest = $http.post(baseURL+"account/get/", getByIdObj)
            .success(function(data, status, headers, config){
                console.log("return: " +  data.response);
                vm.serverResponse = data.response;
                if (vm.serverResponse.hasOwnProperty("GetCustomerAccountForDateRangeResult") &&
                    vm.serverResponse.GetCustomerAccountForDateRangeResult.Status == "Succeed"){
                    vm.accounts = data.response.GetCustomerAccountForDateRangeResult.Accounts;
                    vm.accounts !== null ? vm.succeed = true : vm.succeed = false;
                }
                if (vm.serverResponse.hasOwnProperty("GetCustomerAccountByAccountIdResult") &&
                    vm.serverResponse.GetCustomerAccountByAccountIdResult.Status == "Succeed"){
                    vm.accounts = data.response.GetCustomerAccountByAccountIdResult.Accounts;
                    vm.accounts !== null ? vm.succeed = true : vm.succeed = false;
                }
            });
        };
    }
]);