"use strict";
window.$ = document.querySelector.bind(document);
Element.prototype.$ = Element.prototype.querySelector;

window.$$ = document.querySelectorAll.bind(document);
Element.prototype.$$ = Element.prototype.querySelectorAll;

Element.prototype.add = function(c) {
  c = c || '';
  if (c !== "") {
    var arr = c.split(" ");
    for (var i = 0; i < arr.length; i++)
      if (arr[i] !== '')
        this.classList.add(arr[i]);
  }
}

Element.prototype.remove = function(c) {
  c = c || '';
  if (c !== "") {
    var arr = c.split(" ");
    for (var i = 0; i < arr.length; i++)
      this.classList.remove(arr[i]);
  }
}

Element.prototype.append = function(c) {
  this.appendChild(c);
}

Element.prototype.setId = function(id, type) {
  id = id || (type + '-' + app.count[type]);
  app.count[type]++;
}

String.prototype.load = function(f, j, t, s) {
  var x = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  t = t || 'POST';
  j = j || false;
  x.open(t, this, true);
  if (t === 'POST') {
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    x.send(s);
  }
  x.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      var rt = x.responseText;
      if (j)
        rt = JSON.parse(rt);
      f(rt);
    }
  }
}

var app = {
  root: 'http://' + location.host,
  isLoading: true,
  theme: 'jw-theme',
  contrast: 'jw-inverted',
  count: {
    card: 0,
    carousel: 0,
    para: 0,
    accordion: 0,
    collection: 0,
    tabs: 0,
    table: 0,
    custom: 0,
  },
  main: $('main .page-role'),
  sideNav: {
    o: $('#menu'),
    options: {
      edge: 'right'
    },
    ini: null
  },
  fab: {
    o: $("#fab"),
    options: {},
    ini: null
  },
  askLogin: {
    html: '<div id="askLogin"><span>LogIN For Great Experience</span><button class="btn-flat sidenav-trigger yellow-text" data-target="menu">LOGIN</button></div>',
    options: {
      displayLength: 3000
    }
  }
}

window.onload = function() {
  app.init();
  //app.loadData();
  //app.searchInit();
}

app.init = function() {
  app.sideNav.ini = M.Sidenav.init(app.sideNav.o, app.sideNav.options);
  app.fab.ini = M.FloatingActionButton.init(app.fab.o, app.fab.options);
  setTimeout(function() {
    M.toast(app.askLogin);
  }, app.askLogin.options.displayLength);
}

var check = function() {
  var a = arguments;
  if (a.length === 2) {
    if (a[0] !== undefined && a[0] !== null)
      a[1]();
  }
  if (a.length === 3) {
    if (((a[0] !== undefined || a[1] !== null) && a[1]) || ((a[0] === undefined || a[1] === null) && !a[1]))
      a[2]();
  }
}

var create = function() {
  var a = arguments;
  var e = (a.length === 2) ? a[0] : 'div';
  var c = (a.length === 2) ? a[1] : a[0];
  var x = document.createElement(e);
  x.add(c);
  return x;
}

var setId = function(id) {

}

var setCont = function(o) {
  var cont = o.cont || o;
  return o;
}

var set = function(o, key) {
  var set = o[key] || o;
  return s;
}

app.add = function(o) {
  for (var i = 0; i < o.length; i++) {
    check(o.parent, function() {
      check(o[i].parent, false, function() {
        o[i].parent = o.parent;
      });
    });
  }
  switch (o.type) {
    case 'card':
      app.card(o);
      break;
    case 'carousel':
      app.carousel(o);
      break;
    case 'para':
      app.para(o);
      break;
    case 'accordion':
      app.accordion(o);
      break;
    case 'collection':
      app.collection(o);
      break;
    case 'tabs':
      app.tabs(o);
      break;
    case 'table':
      app.table(o);
      break;
    default:

  }
}

app.card = function(o) {
  var cClass = o.eclass || '';
  var cId = o.id || ('card-' + app.count.card);
  var cContId = o.cont.id || cId + '-cont';
  app.count.card++;
  var c = create('card ' + cClass);
  c.id = cId;
  var cTitleCont = o.title.cont || o.title || '';
  var cTitleClass = 'card-title ' + (o.title.eclass || '');
  var cContent = create('card-content');
  check(o.img, function() {
    var cImageClass = o.img.eclass || '';
    var cImageSrc = o.img.src || o.img;
    console.log(app.root + '/image/' + cImageSrc);
    var cImageCont = create('card-image ' + cImageClass);
    var cImage = create('img','')
    cImage.src = app.root + '/images/' + cImageSrc;
    cImageCont.appendChild(cImage);
    check(o.title, function() {
      var cImageTitle = create('span', cTitleClass);
      cImageTitle.innerHTML = cTitleCont;
      cImage.appendChild(cImageTitle);
    });
    c.appendChild(cImage);
  });
  check(o.img, false, function() {
    check(o.title, function() {
      var cTitle = create('span', cTitleClass);
      cTitle.innerHTML = cTitleCont;
      cContent.appendChild(cTitle);
    });
  });
  check(o.cont, function() {
    var cContHtml = o.cont.cont || o.cont;
    var cContClass = o.cont.eclass || '';
    var cCont = create('p',cContClass);
    cCont.innerHTML = cContHtml;
    cCont.id = cContId
    cContent.append(cCont);
  });
  c.appendChild(cContent);
  var cParent = $('#' + o.parent) || app.main;
  cParent.appendChild(c);
  check(o.saru, function() {
    o.saru.parent = o.saru.parent || cContId;
    app.add(o.saru);
  });
}

var tempcard = {
  type: 'card',
  title: 'Hi',
  cont: 'Lorem',
  img: 'cap1.jpeg'
}

app.add(tempcard);
