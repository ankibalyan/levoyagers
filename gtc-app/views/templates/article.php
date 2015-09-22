<!---start-destinatiuons---->
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

            <div class="clear"> </div></div>
        <!----//End-find-place---->
      <div class="wrap">
      <?php if(isset($page)) echo get_page($page); ?>
            <?php if(isset($article)) echo get_article($article); ?>
      </div>