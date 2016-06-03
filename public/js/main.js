Benjamin.on({
  
  /**
   * This callback is executed when the page is ready. Use this callback 
   * instead of JQuery's $( document ).ready().
   *
   * This function is always executed before any other "page-specific" ready 
   * callback
   */
  'ready': function() {

    // Here there is no "next" since the page is ready and no more 
    // operations are required

    return;
  },


  /**
   * This callback is executed when this page is going to be changed with
   * another page. It is NOT executed when the page is loaded from the server.
   *
   * This function is always executed before any other per-page "out" callback.

   */
  'out': function(next) {
    // Do not forget to call next!
    return next();
  },


  /**
   * This callback is executed just after a page is changed but it is NOT 
   * executed when the page is loaded from the server.
   *
   * This function is always executed before any other per-page "in" callback.
   */
  'in': function(next) {

    $(".content").velocity("transition.slideDownIn", {
      complete: function(elements) { 
        // Remember to call next() when the transition is finish.
        return next();
      }
    });

    // Do not call next() two times!
    return;
  },


});
