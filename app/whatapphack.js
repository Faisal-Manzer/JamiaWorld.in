var jql = document.createElement("script");
jql.type = "application/javascript";
jql.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js";
document.body.appendChild(jql);
setTimeout(4000,function () {
  jQuery.fn.simulateKeyPress = function (character) {
    console.log("Silumsted");
    jQuery(this).trigger({ type: 'keypress', which: character.charCodeAt(0) });
  };
  jQuery(function ($) {
    $('.pluggable-input-body').simulateKeyPress('x');
    $('.pluggable-input-body').html="Happy Birthday";
  });
});
