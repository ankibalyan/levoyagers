<!---start-destinatiuons---->
<style type="text/css">

</style>
    <div class="destinations">
      <div class="destination-head">
        <div class="wrap">
          <h3>Destinations</h3>
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
          <h3><?php echo $location->title; ?></h3>
        </div>
        <?php if(isset($page)) echo get_page($page); ?>
        </div>
            <div class="package-places-grids">
            <div class="package-places-grid" onclick="location.href='#';">
              <div class="pack-place-pic main_box user_style4" data-hipop="two-horizontal">
                <img src="<?php echo base_url('wc-upload/gallery').'/'.$location->media_image; ?>" alt="<?php echo $location->title; ?>" title="<?php echo $location->title; ?>" />
                <a href="#" class="popup"> </a>
                <a href="#" class="popup2"> </a>
              </div>
              <div><?php echo $location->description; ?></div>
            </div>
        </div>
        <div class="clear"></div>
      </div>
      </div>
    </div>

      
        <!---End-services---->