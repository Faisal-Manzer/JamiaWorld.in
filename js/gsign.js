var auth2 = null;
function startApp() {
    gapi.load("auth2", function() {
        auth2 = gapi.auth2.init({
            client_id: "782076451193-8ves6eoa7m26bacrr6l7r2samdscu478.apps.googleusercontent.com"
        });
        auth2.then(function() {
            issi = auth2.isSignedIn.get();
            if(issi){
                var user = auth2.currentUser.get();
                setDataUser2(user.getBasicProfile());
            }
            else{
                alert("no one");
                setTimeout(function(){M.toast(app.askLogin);}, 3000);
            }
        },function() {
            alert("error");
        });
        auth2.attachClickHandler(document.getElementById("loginGoogle"), {},
            function(googleUser) {
                setDataUser(googleUser.getBasicProfile());
            }, function(error) {
                alert(JSON.stringify(error, undefined, 2));
            });
    });
}
function setDataUser(u) {
    $("#userName").innerText = u.getName();
    $("#userEmail").innerText = u.getEmail();
    $("#userDp").src = u.getImageUrl();
}
function setDataUser2(u) {
    $("#userName").innerText = u.ig;
    $("#userEmail").innerText = u.U3;
    $("#userDp").src = u.Paa;
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}