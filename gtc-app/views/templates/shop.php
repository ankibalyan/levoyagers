<!---start-destinatiuons---->
    <div class="destinations">
      <div class="destination-head">
      <div class="wrap">
      <?php if(isset($products) && count($products)): ?>
        <div class="shop">
          <h3>My Products</h3>
        </div>
      <div class="product">
        <ul class="products_head">
          <li>Title</li>
          <li style="width:150px;">Description</li>
          <li>Price</li>
        </ul>
        <ul class="products_list">
          <?php foreach ($products as $key => $product): ?>
            <?php echo form_open('shop/add'); ?>
            <li>
              <?php echo $product->title; ?>
              <?php if ($product->option_name): ?>
                <?php //echo $product->option_name." "; ?>
                <?php echo form_dropdown($product->option_name,$product->option_values, NULL,'id="option_"'.$product->id.'"'); ?>
              <?php endif; ?>
            </li>
            <li style="width:150px;">
              <?php echo $product->description; ?>
            </li>
            <li>
              <?php echo $product->price; ?>
            </li>
            <li>
              <?php echo form_hidden('id', $product->id); ?>
              <?php echo form_submit('submit', 'Add to Cart','class ="btn"'); ?>
            </li>
            <?php echo form_close(); ?>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif; ?>
      <?php if(!isset($products) || !count($products)): ?>
        <div class="empty_item">
          <p>You have No Product To Display</p>
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