WordPress-plugin-with-RequireJS
===============================

A template plugin file structure for using RequireJS in a Wordpress plugin. 

## What this plugin is

If you've used RequireJS before, you're probably in love with it. Ever wondered how to make it work within a Wordpress plugin? I had to do just this in a project, so I thought I'd share a template on how I did it. It's not very difficult, but did need a little research at the start.

## Loading behind the scenes

This plugin automatically loads your scripts behind the scenes, adding a script to the `<head>` in the format: 

`<script type='text/javascript' src='http://localhost:8888/wordpress/wp-content/plugins/WordPress-plugin-with-RequireJS/js/lib/require.js?ver=1.0' data-main='http://localhost:8888/wordpress/wp-content/plugins/WordPress-plugin-with-RequireJS/js/app'></script>`

`require.js` is loaded synchronously, and the `data-main` attribute loads your application code in asynchronously. 

## Optimization

In the command line, navigate to the /js directory and type `node r.js -o app.build.js`. This will minify all your JavaScript files into one small file called `myplugin.min.js`. The optimization settings are in `app.build.js`.

## Development mode

You'll want to show users on your site the minified JavaScript file for faster loading, but when you're developing you don't want to have to re-optimize your code every time you make a change. This template has a simple trick: add `?rq_debug` as a query parameter to the url and it will load each script dynamically rather than using the minified file.