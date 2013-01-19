// For any third party dependencies, like jQuery, place them in the lib folder.

// Get absolute directory
var appUrl = require.toUrl('app');
var arr = appUrl.split('/');
arr.pop();
var dir = arr.join('/');

// Configure loading modules from the lib directory,
// except for 'app' ones, which are in a sibling
// directory.
requirejs.config({
  baseUrl: dir,
  paths: {
    app: dir+'/app',
    jquery: dir+'/lib/jquery'
  }
});

// Start loading the main app file. Put all of
// your application logic in there.
requirejs(['app/main']);
