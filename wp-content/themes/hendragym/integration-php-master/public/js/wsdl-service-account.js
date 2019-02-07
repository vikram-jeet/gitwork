'use strict';

angular.module('wsdl-app')
    .service("AccountService", [function(){
        this.GetPhysicalCountries = function () {
           return [
               {value:"NotSpecified", label:"Not Specified"},
               {value:"NewZealand", label:"New Zealand"},
               {value:"Australia", label:"Australia"},
               {value:"UnitedStatesOfAmerica", label:"United States Of America"}
           ];
        };
        this.GetAccountCountries = function () {
           return [
               {value:"NewZealand", label:"New Zealand"},
               {value:"Australia", label:"Australia"},
               {value:"UnitedStatesOfAmerica", label:"United States Of America"}
           ];
        };
        this.GetMobileCountries = function () {
           return [
               {value:"NotSpecified", label:"Not Specified"},
               {value:"NZ", label:"+64 New Zealand"},
               {value:"Aus", label:"+61 Australia"},
               {value:"USA", label:"+1 United States Of America"}
           ];
        };
        this.GetAccountTypes = function () {
            return [
                {value:"BankAccount", label:"Bank Account"},
                {value:"CreditCard", label:"Credit Card"}
            ];
        };
        this.GetCreditCardTypes = function () {
           return [
               {value:"None", label:"None"},
               {value:"Visa", label:"Visa"},
               {value:"Mastercard", label:"Mastercard"},
               {value:"AmericanExpress", label:"American Express"}
           ];
        };
        this.GetTermTypes = function () {
           return [
               {value:"Months", label:"Months"},
               {value:"Payments", label:"Payments"}
           ];
        };
        this.GetScheduleFrequencies = function () {
            return [
                {value:"Weekly", label:"Weekly"},
                {value:"Fortnightly", label:"Fortnightly"},
                {value:"FourWeekly", label:"Four Weekly"},
                {value:"Monthly", label:"Monthly"},
                {value:"BiMonthly", label:"Bi-Monthly"},
                {value:"Quarterly", label:"Quarterly"}
            ];
        };
    }
]);
