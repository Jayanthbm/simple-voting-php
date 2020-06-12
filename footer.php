<script>
function setBackground(){
  var bgcolor = localStorage.getItem("bgcolor"); // get the background color from localstorage
  document.body.style.backgroundColor = bgcolor; // update the backgrgound color
  if(bgcolor === 'white'){
    document.body.style.color = 'black'; // update text color
  }
  if(bgcolor === 'black'){
    document.body.style.color = 'aqua'; // update text color
  }
}
$(document).ready(function() { // Checking wheather document ready or not
  var bgcolor = localStorage.getItem("bgcolor"); // checking local storage for background color
  // checking background color set or not
  if(bgcolor === null || bgcolor === 'white'){
    localStorage.setItem("bgcolor", "white");  //set localstorage with background color white
    $('#background')[0].checked = true; //check the toggle if background color is white
    setBackground(); //call setBackground function to Update the background color 
  }else{
      setBackground();
      
  }
  //Below function will be trigger when toggle changes
  $('#background').change(function () {
      let a = $('#background')[0].checked; //get the current toggle state i.e checked or unchecked
      //If checked set background color white
      if(a === true){
        localStorage.setItem("bgcolor", "white");
      }
      //if Unchecked set background color black
      if(a === false){
        localStorage.setItem("bgcolor", "black");
      }
      setBackground();
  });
});
</script>
<footer class="footer">
  <center>
    <p>&copy; <?php echo Date('Y'); ?></p> <!-- Display year -->
  </center>
</footer> 