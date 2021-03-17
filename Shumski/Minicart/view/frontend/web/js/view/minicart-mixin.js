/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'Magento_Customer/js/customer-data',
    'mage/dropdown'
], function ($, customerData) {
    'use strict';

    return function (originalComponent) {
        return originalComponent.extend({
            is_auto_open: false,

            /**
             * @override
             */
            initialize: function () {
                var self = this,
                    minicartEl = $('[data-block="minicart"]');

                this._super();

                if (self.is_auto_open) {
                    minicartEl.on('contentLoading', function () {
                        minicartEl.on('contentUpdated', function ()  {
                            minicartEl.find('[data-role="dropdownDialog"]').dropdownDialog("open");
                        });
                    });
                }
            },
        });
    };
});
