<nav role="navigation" class="navbar">
  <div id="menuToggle">
      <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
    <ul id="menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="upload.php">Upload</a></li>
      <li><a href="profile.php">View profile</a></li>
      <li><a href="network.php">Build your network</a></li>
      <li><a href="logout.php" class="navbar__logout">Logout</a></li>

      <form action="search.php" method="GET">
        <input id="search" name="search" type="text" placeholder="search" class="input">
        <input id="sumbit" type="submit" value="Search" class="btn btn--primary">
      </form>

      <form action="nearby.php" method="GET">
        <input id="latitude" name="latitude" type="hidden" placeholder="" >
        <input id="longitude" name="longitude" type="hidden" value="">
        <input id="distance" name="distance" type="hidden" value="100">
        <input id="sumbit" type="submit" value="Search nearby" class="btn btn--primary">
      </form>

    </ul>

  </div>
</nav>

   
    <script>
    function getLocation(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(storePosition);
        } 
        
    }
    function storePosition(position) {
            var x = document.getElementById("latitude");
            var y = document.getElementById("longitude");
            x.value = position.coords.latitude;
            y.value = position.coords.longitude;
        }
getLocation();
    </script>
    
    
</nav>