define([
    'uiComponent',
    'ko',
    'jquery'
], function(Component, ko, $) {
    'use strict';

    return Component.extend({

        apiKey: '77cc013474b94974809154632220206',
        lat: "",
        long: "",
        temp: ko.observable("0"),
        time: ko.observable("88:88"),
        condition: ko.observable("N/A"),
        location: ko.observable("The Moon"),
        icon: ko.observable("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif"),
        metric: ko.observable(''),

        defaults: {
            template: "BlueAcorn_Weather/weather-view"
        },

        initialize: function() {
            this._super();
            console.log('Weather UI Component Initialized');

            navigator.geolocation.getCurrentPosition((response) => {
                console.log(response);
                this.lat = response.coords.latitude;
                this.long = response.coords.longitude;

                this.getWeatherData();
            });
        },

        getWeatherData: function() {

            fetch(`https://api.weatherapi.com/v1/current.json?key=${this.apiKey}&q=${this.lat},${this.long}`)
                .then((response) => response.json())
                .then((data) => {
                    this.temp(data.current.temp_f);
                    this.time(data.location.localtime);
                    this.condition(data.current.condition.text);
                    this.location(`${data.location.name}, ${data.location.region}`);
                    this.icon(data.current.condition.icon);
                    this.metric('f');
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        changeTempMetric: function(){
            if(this.metric() === 'f'){
                let newTemp = (this.temp() - 32) / 1.8000;
                this.temp(newTemp);
                this.metric('c')
            } else {
                let newTemp = (this.temp() * 1.8000) + 32;
                this.temp(newTemp);
                this.metric('f')
            }
        }
    });
});
