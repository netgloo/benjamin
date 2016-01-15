Benjamin.config({
  
  /**
   * This callback is executed before any page is rendered but it is NOT 
   * executed when the page is loaded from the server.
   *
   * This function is always executed before any other "page-specific" before 
   * callback.
   */
  'before': function(next) {
    console.log('before');
    // Do not forget to call next!
    return next();
  },
  

  /**
   * This callback is executed after this page is rendered but it is NOT 
   * executed when the page is loaded from the server.
   *
   * This function is always executed before any other "page-specific" after 
   * callback.
   */
  'after': function(next) {
    console.log('after');
    // Do not forget to call next!
    return next();
  },


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


  // --------------------------------------------------------------------------
  // Page /about
  // --------------------------------------------------------------------------

  '/about': {

    /**
     * This callback is executed before this page is rendered but it is NOT 
     * executed when the page is loaded from the server.
     */
    'before': function(next) {
      console.log('before /about');
      // Do not forget to call next!
      return next();
    },


    /**
     * This callback is executed after this page is rendered but it is NOT 
     * executed when the page is loaded from the server.
     */
    'after': function(next) {
      console.log('after /about');
      // Do not forget to call next!
      return next();
    },


    /**
     * This callback is executed when this page is ready (just after the 
     * 'after' callback) and when this page is loaded from the server.
     */
    'ready': function() {
      console.log('ready /about');
      // Here there is no "next" since the page is ready and no more 
      // operations are required
      return;
    },

  }, 


});
