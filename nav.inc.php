<div class="search">
  <form action="nearby.php" method="GET" class="search">
      <input id="latitude" name="latitude" type="hidden"  >
      <input id="longitude" name="longitude" type="hidden" value="">
      <input id="distance" name="distance" type="hidden" value="100">
      <input type="submit" value="Search nearby" class="btn--searchnearby">
    </form>

    <form action="search.php" method="GET" class="search">
      <input  type="submit" value="Search" class="btn btn--search">
      <input id="search" name="search" type="text" placeholder="search" class="input--search ">
    </form>
  </div>
<nav class="navbar">
  <div id="menuToggle">
      <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
    <ul id="menu">
      <li><a href="index.php"><img src="images/logo.png" alt="Logo Tripophobia" class="logo"></a></li>
      <li><a href="upload.php">Upload</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="network.php">Friends</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="logout.php" class="navbar__logout">Logout</a></li>

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