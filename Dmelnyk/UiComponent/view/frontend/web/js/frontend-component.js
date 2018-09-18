define([
    'uiElement',
    'underscore'
], function (Component, _) {
    'use strict';

    return Component.extend({
        getPages: function() {
            console.log(this.pages);
            console.log(_.toArray(this.pages));

             return _.toArray(this.pages);
        }
    });
});