/*
	Pull in jQuery from another file. Run noConflict to ensure it doesn't effect other jQuery's running on the page.
*/
define(['lib/jquery-1.9.0.min'], function() {
	return jQuery.noConflict(true);
});