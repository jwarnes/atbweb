var root = new Firebase('https://broforce.firebaseio.com/');

var people = new Firebase('https://broforce.firebaseio.com/people/list');



function TestValue(url)
{
  var ref = new Firebase(url);
  ref.on('value', function(snapshot){ console.log(snapshot.val()); });
}


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
    GetPeopleList();
    viewmodel.userInfo(user);

    // get the user's permissions. note that all data access is restricted sever side, this is just so that the ui matches
    var permissions = new Firebase('https://broforce.firebaseio.com/permissions/'+user.email.replace('.',','));

    permissions.on('value', function(d) { viewmodel.permissions(d.val()) });


  } else {
   console.log('Not authenticated');
 }
});


function GetPeopleList()
{
  viewmodel.people.removeAll();

  var ref = new Firebase('https://broforce.firebaseio.com/people/list');

  ref.on('child_added', function(data){
    var personData = new PersonListItem(data.val());
    viewmodel.people.push(personData);
  });
}

function LogMeOut()
{
   viewmodel.permissions({});
   viewmodel.authenticated(false);
   auth.logout();
}