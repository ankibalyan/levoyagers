<!---start-destinatiuons---->
    <div class="destinations">
      <div class="destination-head">
      <div class="wrap">
      <?php if($cart = $this->cart->contents()): ?>
        <div class="shop">
          <h3>My Cart</h3>
        </div>
        
        <div class="cart">
          <table class="cart_tb">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Price in Rs</th>
                <th>Option</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $value): ?>
              <tr>
                <td><?php echo $value['name']; ?> </td>
                <td><?php echo "Rs. ".$value['subtotal']." /-"; ?> </td>
                <td><?php // echo $value['option']; ?> </td>
                <td><?php echo anchor('shop/remove/'.$value['rowid'], 'X', 'class = "remove "'); ?> </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
          <div class="cart_foot">
            <div class="total"><h4>Total Amount</h4><p><?php echo "Rs. ".$this->cart->total()." /-"; ?></p></div>
            <div class="qty"><h4>Total Items</h4><p><?php echo $this->cart->total_items(); ?> </p></div>
            <div class="checkout">
                <input type="submit" id="button" class="btn" value="Pay with PayZippy">
            </div>
          </div>
          <hr>
        </div>
      <?php endif; ?>
    </div>
</div>

      <!---strat-date-piker---->
              <script>
              $(function() {
                $( "#datepicker" ).datepicker();
              });
              </script>
            <!---/End-date-piker---->