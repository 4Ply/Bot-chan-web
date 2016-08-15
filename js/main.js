jQuery.fn.rotate = function (degrees) {
    $(this).css({
        '-webkit-transform': 'rotate(' + degrees + 'deg)',
        '-moz-transform': 'rotate(' + degrees + 'deg)',
        '-ms-transform': 'rotate(' + degrees + 'deg)',
        'transform': 'rotate(' + degrees + 'deg)'
    });
    return $(this);
};

jQuery.fn.center = function () {
    $(this).css({
        'position': 'absolute;',
        'top': '50%',
        'left': '41%'
    });
    return $(this);
};


$(document).ready(function () {
    $("#btn-join").click(function () {
        join();
    });
});

function join() {
    $("#welcome-title").fadeOut('slow');
    $("#btn-join").fadeOut('slow');
    $("#smiley").fadeOut("slow", function () {
        $(".content").fadeIn("slow");
    });
}

function showWelcome() {
    $("#spinner").fadeOut('slow', function () {
        $("#welcome").fadeIn('slow');
    });
}

/**
 * The Sign-In client object.
 */
var auth2;

/**
 * Initializes the Sign-In client.
 */
var onGAPILoaded = function () {
    gapi.load('auth2', function () {
        /**
         * Retrieve the singleton for the GoogleAuth library and set up the
         * client.
         */
        auth2 = gapi.auth2.init({
            client_id: '914669485111-da1dk2lhmsir5do7o6v47jmvkb3mue58.apps.googleusercontent.com'
        });

        // Attach the click handler to the sign-in button
        auth2.attachClickHandler('signin-button', {}, onSuccess, onFailure);


        console.log("Signed in: " + GoogleAuth.isSignedIn.get());
    });

    function renderButton() {
        gapi.signin2.render('signin-button', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }

    renderButton();
};

function onSuccess(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('Profile: ' + profile);
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());

    var id_token = googleUser.getAuthResponse().id_token;
    console.log('ID_Token: ' + id_token);
}

function onFailure(error) {
    console.log(error);
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        gapi.auth.signOut();
        console.log('User signed out.');
    });
}


var CLIENT_ID = '914669485111-da1dk2lhmsir5do7o6v47jmvkb3mue58.apps.googleusercontent.com';
var SCOPES = [
    'email',
    'profile'
    // Add other scopes needed by your application.
];

/**
 * Called when the client library is loaded.
 */
function handleClientLoad() {
    checkAuth();
}

/**
 * Check if the current user has authorized the application.
 */
function checkAuth() {
    gapi.auth.authorize(
        {'client_id': CLIENT_ID, 'scope': SCOPES, 'immediate': true},
        handleAuthResult
    );
}

/**
 * Called when authorization server replies.
 *
 * @param {Object} authResult Authorization result.
 */
function handleAuthResult(authResult) {
    console.log(authResult);
    if (authResult.access_token) {
        // Access token has been successfully retrieved, requests can be sent to the API
        console.log("SO LOGGED");
        showWelcome();
    } else {
        // No access token could be retrieved, force the authorization flow.
        console.log("NOT LOGGED AT ALL");
        gapi.auth.authorize(
            {'client_id': CLIENT_ID, 'scope': SCOPES, 'immediate': false},
            handleAuthResult);
    }
}

$('#spinner').spinner({radius: 25});
