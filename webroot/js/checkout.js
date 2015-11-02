/**
 * jQuery Book Shop
 *
 */

var CHECKOUT = {
  order : {
    container: '#confirm',
    url: 'api/checkout.php',
    running: false,
    init: function() {
      this.loadSum();
      var _order = this;
      $('#orderbtn').click(function() {
        _order.submitForm();
      });
    },
    loadSum: function() {
      // Don't call if we're already running!
      if (this.running) { return; }
      this.running = true;

      var _order = this;
      $.ajax({
        type: 'get',
        url: this.url+'?do=sum',
        success: function(data) {
          _order.displaySum(data);
        },
        complete: function() {
          _order.running = false;
        }
      });
    },
    displaySum: function(data) {
      $('<div>')
        .attr('id', 'cartsum')
        .html(
          'När du skickar beställningen kommer <strong>'+data.sum+' kr</strong> dras från ovanstående kort.'
        )
        .appendTo(this.container);
    },
    submitForm: function() {
      // Don't call if we're already running!
      if (this.running) { return; }
      this.running = true;

      var _order = this;
      $.ajax({
        type: 'post',
        url: this.url+'?do=pay',
        data: $('form').serialize(),
        success: function(data) {
          if (data.status === 'validate') {
            var name = $('label[for='+data.output+']').text().replace(':','');
            $('#output').text('Du måste fylla i fältet "'+name+'"').addClass(data.status);
          }
          else {
            $('#checkout').addClass(data.status).text(data.output);
            if (data.status === 'ok') {
              $('#shoppingcart').hide();
            }
          }
        },
        complete: function() {
          _order.running = false;
        }
      });
    }
  },

  cart: {
    container: '#shoppingcart #content',
    url: 'api/cart.php',
    running: false,
    init: function() {
      $(this.container).html('Laddar...');
      this.load();
    },
    load: function() {
      // Don't call if we're already running!
      if (this.running) { return; }
      this.running = true;

      var _cart = this;
      $.ajax({
        type: 'get',
        url: this.url,
        success: function(data) {
          if (data.length === 0) {
            _cart.displayEmpty();
          }
          else {
            _cart.display(data);
          }
        },
        error: function() {
          console.log('cart.load - error');
        },
        complete: function() {
          _cart.running = false;
        }
      });
    },
    display: function(cart) {
      this.qty = this.sum = 0;
      var _cart = this;
      $(this.container).html('');
      $.each(cart, function() {
        $(_cart.container).append(
          '<div id="cart-'+this.pid+'" class="item">\n'+
          '  <div class="title">'+this.title+'</div>\n'+
          '  <div class="info">Antal: '+this.qty+'<br>\n'+
          '  Pris: '+this.sum+' kr</div>\n'+
          '</div>'
        );
        _cart.qty += this.qty;
        _cart.sum += this.sum;
      });
      $(this.container)
        .append(
          '<div class="summary">Antal varor: '+this.qty+'<br>'+
          'Summa: '+this.sum+' kr</div>'+
          '<input type="button" id="emptybtn" class="button" value="Töm kundvagnen">'+
          '<input type="button" id="shopbtn" class="button" value="Fortsätt handla">'
        );
      $('#shoppingcart #emptybtn').click(function() {
        CHECKOUT.cart.empty();
      });
      $('#shoppingcart #shopbtn').click(function() {
        window.history.go(-1);
      });
    },
    empty: function() {
      $.ajax({
        type: 'post',
        url: this.url+'?do=empty',
        success: function() {
          window.location.replace('shop.php');
        }
      });
    }
  },

  load: function() {
    this.order.init();
    this.cart.init();
  }
};

$(function() {
  CHECKOUT.load();
});
