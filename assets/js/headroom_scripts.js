console.log('Greetings from headroom_scripts.js!')

window.onload = function () {
  // grab an element
  var myElement = document.querySelector("header");
  console.log(myElement)
  // construct an instance of Headroom, passing the element
  var headroom  = new Headroom(myElement);
  // initialise
  headroom.init();

  headroom.tolerance = {
    up: 100,
    down: 7
  }

  setSpaceholderHeight()

  headroom.onUnpin = setSpaceholderHeight()
  headroom.onPin = setSpaceholderHeight()

  function setSpaceholderHeight () {
    var height = jQuery('#masthead').css('height')
    jQuery('#headerSpaceholder').css('height', height)
  }


}

jQuery.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).on(animationEnd, function() {
            jQuery(this).removeClass('animated ' + animationName);
        });
    }
});
