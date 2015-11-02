/**
 * jQuery Book Shop
 *
 */

var SHOP = {
  items: {
    container: '#booklist',
    url: 'api/products.php',
    running: false,
    init: function() {
      this.load();
    },
    load: function() {
      // Don't call if we're already running!
      if (this.running) { return; }
      this.running = true;

      var _items = this;
      $.ajax({
        type: 'get',
        url: this.url,
        success: function(data) {
          $.each(data, function() {
            _items.display(this);
          });
        },
        complete: function() {
          _items.running = false;
        }
      });
    },
    display: function(item) {
      itemId = 'item-'+item.pid;

      $('<div>')
        .attr('id', itemId)
        .addClass('item')
        .hide()
        .html(
          '<div class="cover" style="background-image: url('+item.img+');"></div>\n'+
          '<div class="description">\n'+
          '  <div class="title">'+item.title+'</div>\n'+
          '  <div class="author">'+item.author+'</div>\n'+
          '  <div class="buy"><span class="price">'+item.price+' kr</span>\n'+
          '  <input type="button" id="'+item.pid+'" class="button" value="Köp"></div>\n'+
          '</div>\n'
        )
        // .data(item)
        .appendTo(this.container);

      $('#'+itemId+' input[type=button]').data(item);
      $('#'+itemId).fadeIn();

      $('#'+itemId+' .button').click(function() {
        SHOP.cart.add($(this).data());
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
          '  <div class="info">Antal: '+this.qty+
          '    <span class="addItem">+</span> <span class="removeItem">&minus;</span><br>\n'+
          '  Pris: '+this.sum+' kr</div>\n'+
          '</div>'
        );
        $('#cart-'+this.pid+' .addItem').data(this).click(function() {
          SHOP.cart.add($(this).data());
        });
        $('#cart-'+this.pid+' .removeItem').data(this).click(function() {
          SHOP.cart.remove($(this).data());
        });
        _cart.qty += this.qty;
        _cart.sum += this.sum;
      });
      $(this.container)
        .append(
          '<div class="summary">Antal varor: '+this.qty+'<br>'+
          'Summa: '+this.sum+' kr</div>'+
          '<input type="button" id="emptybtn" class="button" value="Töm kundvagnen">'+
          '<input type="button" id="checkoutbtn" class="button" value="Gå till kassan">'
        );
      $('#shoppingcart #emptybtn').click(function() {
        SHOP.cart.empty();
      });
      $('#shoppingcart #checkoutbtn').click(function() {
        SHOP.cart.checkout();
      });
    },
    displayEmpty: function() {
      $(this.container).html('Kundvagnen är tom');
    },
    add: function(item) {
      var _cart = this,
        itemData = item;
      $.ajax({
        type: 'post',
        url: this.url+'?do=add',
        data: itemData,
        success: function() {
          _cart.load();
        },
        error: function() {
          console.log('cart.add - error');
        }
      });
    },
    remove: function(item) {
      var _cart = this,
        itemData = item;
      $.ajax({
        type: 'post',
        url: this.url+'?do=remove',
        data: itemData,
        success: function() {
          _cart.load();
        },
        error: function() {
          console.log('cart.remove - error');
        }
      });
    },
    empty: function() {
      var _cart = this;
      $.ajax({
        type: 'post',
        url: this.url+'?do=empty',
        success: function() {
          _cart.load();
        }
      });
    },
    checkout: function() {
      window.location.href = 'checkout.php';
    }
  },

  load: function() {
    this.items.init();
    this.cart.init();
  }
};

$(function() {
  SHOP.load();
});
