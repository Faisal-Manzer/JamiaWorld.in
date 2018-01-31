for(var i = 0; i < 3; i++){
  document.querySelector(".pluggable-input-compose").focus();
  document.querySelector(".pluggable-input-placeholder").style.visibility="hidden";
  document.querySelector(".pluggable-input-body").innerHTML = "Hlw";
  var parent = document.querySelector(".block-compose");
  //parent.parentNode.removeChild(document.querySelector("._1UWg0"));
  var btn = document.createElement("button");
  btn.classList.add("compose-btn-send");
  btn.innerHTML = '<span data-icon="send" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".45" d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z"></path></svg></span>';
  parent.appendChild(btn);
  document.querySelector(".compose-btn-send").click();
}


var element = document.querySelector('#test');
var words = ['Something','idk','what','is','going','on'];

function type(words, index){
  index = index ? index : 0;
  (function writer(i){
    var string = words[index];
    if(string.length <= i++){
      element.innerText = string;
      if(words[index] != words[words.length-1]) {
      	setTimeout(function() {
          reverseType(words, index);
        },500);
      }else{
        setTimeout(function() {
          reverseType(words, index);
        },2000);
      }
      return;
    }
    element.innerText = string.substring(0,i);
    var rand = Math.floor(Math.random() * (100)) + 140;
    setTimeout(function(){writer(i);},rand);
  })(0)
}

function reverseType(words, index){
  index = index ? index : 0;
  (function writer(i){
    var string = words[index];
    if(string.length <= i++){
      element.innerText = string;
      if(words[index] != words[words.length-1]) {
        type(words, index+1);
      }else{
        type(words, 0);
      }
      return;
    }
    element.innerText = string.substring(0,string.length - i);
    var rand = Math.floor(Math.random() * (100)) + 140;
    setTimeout(function(){writer(i);},rand);
  })(0)
}

type(words);
