Benjamin.on({
  
  /**
   * This callback is executed when the page is ready. Use this callback 
   * instead of JQuery's $( document ).ready().
   *
   * This function is always executed before any other "page-specific" ready 
   * callback
   */
  'ready': function() {
    console.log('ready');
    // Here there is no "next" since the page is ready and no more 
    // operations are required
    return;
  },


  /**
   * This callback is executed just after a page is changed but it is NOT 
   * executed when the page is loaded from the server.
   *
   * This function is always executed before any other "page-specific" after 
   * callback.
   */
  'after': function(next) {
    console.log('after');

    $(".content").velocity("transition.slideRightIn", {
      complete: function(elements) { 
        // Remember to call next() when the transition is finish.
        return next();
      }
    });

    // Do not call next() two times!
    return;
  },


  /**
   * This callback is executed when this page is going out to be changed with
   * another page. It is NOT executed when the page is loaded from the server.
   *
   * This function is always executed before any other "page-specific" before 
   * callback.
   */
  'out': function(next) {
    console.log('out');
    // Do not forget to call next!
    return next();
  }

});


// ----------------------------------------------------------------------------
// Page /
// ----------------------------------------------------------------------------
// 
// Here you can write your callbacks for the index page.
// 
// ----------------------------------------------------------------------------

Benjamin.on('/', {

  'ready': function() {
    console.log('ready /');
    return;
  },

  'after': function(next) {
    console.log('after /');
    return next();
  },

  'out': function(next) {
    console.log('out /');
    return next();
  }

});


// ----------------------------------------------------------------------------
// Page /about
// ----------------------------------------------------------------------------
// 
// And here callbacks for the about page.
// 
// ----------------------------------------------------------------------------

Benjamin.on('/about', {

  'ready': function() {
    console.log('ready /about');
    return;
  },

  'after': function(next) {
    console.log('after /about');
    return next();
  },

  'out': function(next) {
    console.log('out /about');
    return next();
  }

});
