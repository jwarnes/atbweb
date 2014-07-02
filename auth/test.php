<script>
var dataRef = new Firebase("https://broforce.firebaseio.com/");
// Log me in.
dataRef.auth(AUTH_TOKEN, function(error) {
  if(error) {
    console.log("Login Failed!", error);
  } else {
    console.log("Login Succeeded!");
  }
});

</script>