var root = new Firebase('https://broforce.firebaseio.com/');

var people = new Firebase('https://broforce.firebaseio.com/people');


var auth = new FirebaseSimpleLogin(root, function(error, user) {
  viewmodel.authenticated(false);
  if (error) {
    // an error occurred while attempting login
    console.log('Authentication error');
    console.log(error);

  } else if (user) {
    // user authenticated with Firebase
    console.log('Authenticated');
    viewmodel.authenticated(true);
    GetData();
    viewmodel.userInfo(user);

  } else {
   console.log('Not authenticated');
 }
});


function GetData()
{
  viewmodel.people.removeAll();
  people.on('child_added', function(data){
    var personData = data.val();
    viewmodel.people.push(personData);
  });
}

function LogMeOut()
{
   auth.logout();
}