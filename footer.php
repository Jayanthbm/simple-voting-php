<script>
function setBackground(){
  var bgcolor = localStorage.getItem("bgcolor");
  document.body.style.backgroundColor = bgcolor;
}
$(document).ready(function() {
  var bgcolor = localStorage.getItem("bgcolor");
  if(bgcolor === null || bgcolor === 'white'){
    localStorage.setItem("bgcolor", "white");
    $('#background')[0].checked = true;
    setBackground();
  }else{
      setBackground();
      
  }
  $('#background').change(function () {
      let a = $('#background')[0].checked;
      if(a === true){
        localStorage.setItem("bgcolor", "white");
      }
      if(a === false){
        localStorage.setItem("bgcolor", "black");
      }
      setBackground();
  });
});
</script>
<footer class="footer">
  <center>
    <p>&copy; <?php echo Date('Y'); ?></p>
  </center>
</footer> 