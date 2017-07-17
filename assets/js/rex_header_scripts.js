

// ( function() {

// draws a cart icon with a badge displaying the number of items in a user's cart
  jQuery(document).ready(function() {
    var directoryUri = jQuery('#directoryUri').attr('content');
    var darkBlue = "#0D325D";
    var gray = "#516E8A";
    var lightBlue = "#628EDD";
    var lightGreen = "#88A64E";
    var darkGreen = "#085734";
    var rust = "#994433";

    var canvas = document.getElementById('headerCartCanvas');
    var context = canvas.getContext("2d");

    // context.strokeStyle="red";
    // context.moveTo(60,0);
    // context.lineTo(60,60);
    // context.stroke();

    // shopping cart img
    var cartIcon = document.getElementById('headerCartIcon');
    cartIcon.src = directoryUri + "/../storefront-child-rex-blankets/assets/images/md_icons_shopping_cart.svg";
    context.drawImage(cartIcon, 6, 15, 30, 30);

    // bubble
    context.beginPath();
    context.arc(34, 16, 10, 0, 2*Math.PI);
    context.fillStyle = rust;
    context.fill();

    // item count text
    context.font = "bold 13px Source Sans Pro, sans-serif";
    context.fillStyle = "white";
    context.textAlign = "center";
    context.textBaseline = "middle";
    var text = jQuery('#cartCount').html();
    context.fillText(text, 34, 16);


  });

  

// });
