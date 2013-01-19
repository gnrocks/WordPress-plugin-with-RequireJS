({

  // TO RUN THE BUILD, GET TO THIS DIR IN THE COMMAND LINE AND RUN: node r.js -o app.build.js

  // The path of the dev files (main shouild be directly underneath this)
  baseUrl: '.',

  // Output everything to one minified file
  out: 'myplugin.min.js',

  // Comment out the below line to minify using UglifyJS
  //optimize: "none",

  // Build from the app folder (relative to baseUrl)
  name: 'app',

  // Set paths for libs
  paths: {
    jquery: 'lib/jquery'
  }

})


