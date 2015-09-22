<!---start-destinatiuons---->
    <div class="destinations">
      <div class="destination-head">
        <div class="wrap">
          <h3>Destinations</h3>
        </div>
        <!---End-destinatiuons-->
        <div class="find-place dfind-place">
          <div class="wrap">
            <div class="p-h">
              <span>FIND YOUR</span>
              <label>HOLYDAYS</label>
            </div>
            <div class="p-ww">
              <form>
                <span> Where</span>
                <input class="dest" type="text" value="Distination" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Distination';}">
                <span> When</span>
                <input class="date" id="datepicker" type="text" value="Select date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Select date';}">
                <input type="submit" value="Search" />
              </form>
            </div>
            <div class="clear"> </div>
          </div>
        </div>
      </div>
        <!----//End-find-place---->
    <!---start-services---->
      <div class="wrap">
        <div class="services-header">
          <h3>Packages</h3>
        </div>
          <?php 
            $str ='';
            foreach ($packages as $package):
            $str .= '<div class="destination-places-grids">';
            $str .= '<div class="destination-places-grid" onclick="location.href=\'/package/'.$package->id.'\';">';
            $str .= '<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">';
            $str .= '<img src="'.base_url('wc-upload/gallery').'/'.$package->media_image.'" title="'.$package->title.'" />';
            $str .= '<a href="#" class="popup"> </a>';
            $str .= '<a href="#" class="popup2"> </a>';
            $str .= '</div>';
            $str .= '<div class="dest-place-opt">';
            $str .= '<ul class="dest-place-opt-fea">';
            $str .= '<li><a class="hot" href="#"><span> </span>'.$package->package_hotel.'</a></li>';
            $str .= '<li><a class="plain" href="#"><span> </span>'.$package->package_transport.'</a></li>';
            $str .= '<li><a class="Breakfast" href="#"><span> </span>'.$package->package_scheme.'</a></li>';
            $str .= '<div class="clear"></div>';
            $str .= '</ul>';
            $str .= '<ul class="dest-place-opt-cast">';
            $str .= '<li><a class="d-place" href="#">'.$package->package_location.'</a></li>';
            $str .= '<li><a class="d-price" href="#">Starting Form '.$package->price.'</a></li>';
            $str .= '<div class="clear"></div>';
            $str .= '</ul>';
            $str .= '</div>';
            $str .= '</div>';
            endforeach; 
            echo $str;
            ?>
        <div class="clear"></div>
      </div>
      </div>

      
        <!---End-services---->
            <!---strat-date-piker---->
              <script>
              $(function() {
                $( "#datepicker" ).datepicker();
              });
              </script>
            <!---/End-date-piker---->