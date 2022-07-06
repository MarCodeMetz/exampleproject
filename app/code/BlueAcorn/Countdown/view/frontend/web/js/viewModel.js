define([
    'uiComponent',
    'jquery',
    'ko'
], function(Component, $, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: "BlueAcorn_Countdown/countdown"
        },

        clock: ko.observable(""),

        initialize: function(){
            this._super();
            console.log('Hello World... My UI Component Works!');

            setInterval(this.reloadTime.bind(this), 1000);
        },

        reloadTime: function(){
            this.clock(Date());
        },

        getClock: function() {
            return this.clock;
        }
    });

});