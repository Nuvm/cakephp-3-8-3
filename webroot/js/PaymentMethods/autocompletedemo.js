(function ($) {
    // Get the path to action from CakePHP
    var autoCompleteSource = urlToAutocompleteAction;
	console.log(autoCompleteSource);
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,        
        minLength: 1
    });
})($);

