    <footer class="footer">
    <p>Twitter Clone &copy; 2018</p>
    </footer>
   
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" id="loginAlert">

        </div>
      <form>
        <input type="hidden" name="loginActive" id="loginActive" value="1">
  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email Address">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password </label>
    <input type="password" class="form-control" id="password" placeholder="Password ">
  </div>
</form>
      </div>
      <div class="modal-footer">
      <a  id ="toggleLogin" class="btn b">SignUp</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupButton" class="btn btn-primary">Login </button>
      </div>
    </div>
  </div>
</div>
<script>
    $("#toggleLogin").click(function() {
        
        if ($("#loginActive").val() == "1") {
            
            $("#loginActive").val("0");
            $("#loginModalTitle").html("Sign Up");
            $("#loginSignupButton").html("Sign Up");
            $("#toggleLogin").html("Login");
            
            
        } else {
            
            $("#loginActive").val("1");
            $("#loginModalTitle").html("Login");
            $("#loginSignupButton").html("Login");
            $("#toggleLogin").html("Sign up");
            
        }
        
        
    })
    
    $("#loginSignupButton").click(function() {
        
      $.ajax({
            type: "POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result) {
                if (result == "1") {
                    
                    window.location.assign("index.php");
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                }
            }
            
        })
        
    })

    $(".toggleFollow").click(function() {
        
        var id = $(this).attr("data-userId");
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userId=" + id,
            success: function(result) {
                
                if (result == "1") {
                    
                    $("a[data-userId='" + id + "']").html("Follow");
                    
                } else if (result == "2") {
                    
                    $("a[data-userId='" + id + "']").html("Unfollow");
                    
                }
            }
            
        })
        
    })
    
    $("#postTweetButton").click(function() {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=postTweet",
            data: "tweetContent=" + $("#tweetContent").val(),
            success: function(result) {
                
                if (result == "1") {
                    
                    $("#tweetSuccess").show();
                    $("#tweetFail").hide();
                    
                } else if (result != "") {
                    
                    $("#tweetFail").html(result).show();
                    $("#tweetSuccess").hide();
                    
                }
            }
            
        })
        
    })
    
</script>
  </body>
</html>