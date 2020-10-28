jQuery(function() {
    document.formvalidator.setHandler('type_of_analysis',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});