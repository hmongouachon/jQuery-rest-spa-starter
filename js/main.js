 /*!
  * main.js
  * Plugins / libs used : jquery, handlebars.js
  * Author: Hadrien Mongouachon
  * Licensed under the MIT license
  */

 // IIFE - Immediately Invoked Function Expression
 (function(appName) {

     // The global jQuery object is passed as a parameter
     appName(window.jQuery, window, document);

 }(function($, window, document) {

    // The $ is now locally scoped 

    // Listen for the jQuery ready event on the document
    $(function() {

        console.log('Ready to go');

        // The DOM is ready!
        app.init();


     });

     console.log('Please wait, loading some stuff');

     // The rest of code goes here!
     var app = {
         init: function(settings) {
             // call app.config.variableName
             app.config = {
                 restURL: 'https://jsonplaceholder.typicode.com/albums/1/photos', // fetch post type projects - fake data coming from http://jsonplaceholder.typicode.com
                 siteURL: 'http://localhost/boilerplate-jquery-spa-rest-starter/', // localhost for dev
                 siteTitle: 'appName',
                 body: $('#body'),
                 header: $('#header'),
                 loader: $('#loader'),
                 main: $('#main'),
                 home: $('#home'),
                 about: $('#about'),
                 items_container: $('#items-container'),
             };

             // Allow overriding the default config
             // $.extend( app.config, settings );

             // set handlebar helper
             Handlebars.registerHelper('dateFormat', function(context) {
                 var date = new Date(context),
                     day = date.getDate(),
                     month = date.getMonth() + 1,
                     year = String(date.getFullYear()).substr(2, 3);
                 return (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
             });

             app.loadData(), app.eventHandler();
         },

         loadData: function() {


             // simulate load percent with setinterval
             lineBottom = app.config.body.find('.progress-line span');
             percentNum = $('#percent');
             percent = 0;
             lineBottom.width(percent);

             app.config.loader.addClass('active');

             // increment every 60ms
             var interval = setInterval(function() {
                 percent += 3;
                 lineBottom.css({
                     width: percent + '%'
                 });
                 percentNum.html(percent);
                 // $('.intro-mask-bg').css({ width : percent + '%'}, 600);
                 if (percent >= 99) {
                     clearInterval(interval);
                 }
             }, 151 * 0.9);

             // load json content
             $.ajax({
                 url: app.config.restURL, // your rest url 
                 data: {
                     filter: {
                         'posts_per_page': 20, // -1
                         // 'orderby' : 'title',
                         // 'order' : 'DESC'
                     }
                 },
                 dataType: 'json',
                 scriptCharset: "utf-8",
                 type: 'GET',
                 beforeSend: function(data) {},
                 complete: function() {},
                 success: function(data) {

                     // compile json data content into template
                     $.each(data, function(index, post) {
                         var source = $('#items-template').html();
                         var template = Handlebars.compile(source);
                         var html = template(post);
                         app.config.items_container.append(html);
                     });



                     // then hide home
                     setTimeout(function() {
                         // stop increment
                         clearInterval(interval);
                         // complete loading bar
                         lineBottom.css({
                             width: '100%'
                         });
                         percentNum.delay(1000).html("100").promise().done(function() {
                             // hide percent 
                             app.config.loader.removeClass('active');

                             // use setTimeout instead of delay
                             window.setTimeout(function() {

                                 // show  transition
                                 app.transitions.show_home();
                                 app.config.header.find('a').addClass('active');

                             }, 1000);
                         });
                     }, 1000);
                 }
             });
         },

         // to call transition's function outside the scope :  app.transitions.infos();
         transitions: {

             show_home: function() {

                 app.config.home.find('.progress-line').addClass('hide');
                 app.config.home.addClass('active');

                 window.setTimeout(function() {
                     app.config.home.find('.wrapper').addClass('active');
                 }, 600);

             },

             hide_home: function() {

                 app.config.home.find('.wrapper').removeClass('active');

                 window.setTimeout(function() {
                     app.config.home.removeClass('active');
                 }, 600);


             },

             show_page: function(section_name) {

                 app.config.main.find('.' + section_name).addClass('active');

                 window.setTimeout(function() {
                     app.config.main.find('.' + section_name).children('.wrapper').addClass('active');
                 }, 600);

                 window.setTimeout(function() {
                     app.config.main.find('.' + section_name).css({
                         'overflowY': 'auto'
                     });
                 }, 900);

             },

             hide_page: function() {

                 app.config.main.find('section.active').css({
                     'overflowY': 'hidden'
                 });
                 app.config.main.find('section.active').children('.wrapper').removeClass('active');

                 window.setTimeout(function() {
                     app.config.main.find('section.active').removeClass('active');
                 }, 900);


             },

         },

         route: function(section_name) {

             // note : add redirections in htaccess for refresh page
             // RewriteCond %{REQUEST_URI} projects
             // RewriteRule .* /root_directory

             // define url slug
             var home_url = app.config.siteURL;
             // var section_url = app.config.siteURL + section_name;
             var section = app.config.main.find('.section');

             // if url is home
             if (window.location.href == home_url) {

                 if (section.not('.home').hasClass('active')) {

                     app.transitions.hide_page();

                     setTimeout(function() {
                         app.transitions.show_home();
                     }, 1500);
                 }

             } else {

                 if (section.not('.' + section_name).hasClass('active')) {

                     app.transitions.hide_page();

                     setTimeout(function() {
                         app.transitions.show_page(section_name);
                     }, 1500);

                 }
             }

             // if url countain about slug
             // if(window.location.href == section_url) {
             // }

         },

         eventHandler: function() {
             // document navigation click event url - add project data name to url
             app.config.main.on('click', 'a', function(e) {
                 e.preventDefault();
                 var $this = $(this);

                 $('a').removeClass('current');
                 $this.addClass('current');

                 // get data name from link - exeception for home link
                 var section_name = $this.attr("data-name");


                 // if is home link
                 if ($this.attr("data-name") === '') {
                     history.pushState(section_name, null, app.config.siteURL);
                 }

                 // if is another link
                 else if ($this.attr("data-name") === section_name) {

                     // set new url
                     var url = app.config.siteURL + section_name;
                     history.pushState(section_name, null, url);
                 }

                 app.route(section_name);
                 e.stopPropagation();
             });


             // if user user back or forward button, recall route()
             window.onpopstate = function(event) {
                 app.route();
             };
         }
     };


 }));