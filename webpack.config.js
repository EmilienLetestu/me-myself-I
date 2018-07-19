var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    //.enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    //.enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('app', './assets/js/app.js')
    .addEntry('createGauge','./assets/js/createGauge.js')
    .addEntry('validateSkillForm', './assets/js/validateSkillForm.js' )
    .addEntry('validateUpdateSkillForm', './assets/js/validateUpdateSkillForm.js' )
    .addEntry('validateTechForm', './assets/js/validateTechForm.js')
    .addEntry('validateUpdateTechForm', './assets/js/validateUpdateTechForm.js')
    .addEntry('validateContact', './assets/js/validateContact.js')
    .addEntry('validateProjectForm', './assets/js/validateProjectForm.js')
    .addEntry('validateUpdateProjectForm', './assets/js/validateUpdateProjectForm.js')
    .addEntry('ajax', './assets/js/ajax.js')


    // .addStyleEntry('css/app', './assets/css/app.scss')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    //.enableBuildNotifications()

    // uncomment if you use Sass/SCSS files
    // .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
