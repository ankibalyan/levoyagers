<!---start-destinatiuons---->
<style type="text/css">

</style>
    <div class="destinations">
      <div class="destination-head">
        <div class="wrap">
          <h3>Package</h3>
        </div>
        <!---End-destinatiuons---->
        <div class="find-place dfind-place">
          <div class="wrap">
            <div class="p-h">
              <span>FIND YOUR</span>
              <label>HOLYDAYS</label>
            </div>
            <!---strat-date-piker---->
              <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
              <script>
              $(function() {
                $( "#datepicker" ).datepicker();
              });
              </script>
            <!---/End-date-piker---->
            <div class="p-ww">
              <form>
                <span> Where</span>
                <input class="dest" type="text" value="Distination" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Distination';}">
                <span> When</span>
                <input class="date" id="datepicker" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}">
                <input type="submit" value="Search" />
              </form>
            </div>
          </div>

            <div class="clear"> </div></div></div>
        <!----//End-find-place---->
<!---start-services---->
<div class="destination-places">
      <div class="wrap">
        <div class="package-places-head">
          <h3><?php echo $package->title; ?></h3>
        </div>
        <?php if(isset($page)) echo get_page($page); ?>
        </div>
            <div class="package-places-grids">
            <div class="package-places-grid" onclick="location.href='#';">
              <div class="pack-place-pic main_box user_style4" data-hipop="two-horizontal">
                <img src ="<?php echo base_url('wc-upload/gallery').'/'.$package->media_image; ?>" alt="<?php echo $package->title; ?>" title="<?php echo $package->title; ?>" />
                <a href="#" class="popup"> </a>
                <a href="#" class="popup2"> </a>
              </div>
              <div class="pack-place-opt">
                <ul class="pack-place-opt-fea">
                  <li><a class="hot" href="#"><span> </span>Our Best Provided Hotel*  <?php echo $package->package_hotel; ?></a></li>
                  <li><a class="plain" href="#"><span> </span>Provided Transportaion via <?php echo $package->package_transport; ?></a></li>
                  <li><a class="Breakfast" href="#"><span> </span> Special for <?php echo $package->package_scheme; ?></a></li>
                  <div class="clear"> </div>
                </ul>
                <ul class="pack-place-opt-cast">
                  <li><a class="d-place" href="#">Located at <?php echo $package->package_location; ?></a></li>
                  <li><a class="d-price" href="#">Range Starting Form <?php echo $package->price; ?></a></li>
                  <div class="clear"> </div>
                </ul>
              </div>
              <div><?php echo $package->description; ?></div>
            </div>
        </div>
        <div class="clear"></div>
      </div>
      </div>
    </div>

      
        <!---End-services---->