"use strict";
window.$ = document.querySelector.bind(document);
window.$$ = document.querySelectorAll.bind(document);
Element.prototype.$ = Element.prototype.querySelector;
Element.prototype.$$ = Element.prototype.querySelectorAll;
Element.prototype.add = function(c) {
  if (c === undefined)
    c = "";
  var arr = c.split(" ");
  if (c !== "")
    for (var i = 0; i < arr.length; i++) {
      if ((arr[i].search(/--/)) === -1)
        this.classList.add(arr[i]);
      else {
        //console.log(arr[i].slice(2));
        this.classList.remove(arr[i].slice(2));
      }

    }
}
Element.prototype.append = function(c) {
  this.appendChild(c);
}
String.prototype.load = function(s, f) {

  var x = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  x.open("POST", this, true);
  x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  x.send(s);
  x.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //console.log("oooo"+s);
       // console.log("Loaded");
      console.log(x.responseText);
      var o = JSON.parse(x.responseText);
      f(o);
    }
  }
};
window.addEventListener('popstate', function(e) {
    //console.log(e);
    app.loadData();
});
var root = "http://" + location.host;
var app = {
  isLoading: true,
  theme: "jw-theme",
  contrast: "jw-inverted",
  cardCount: 0,
  carouselCount: 0,
  paraCount: 0,
  collectionCount: 0,
  tabCount: 0,
  collapsibleCount: 0,
  tableCount: 0,
  main: $("main .page-role"),
  page: ".page-role",
  search: {},
  sideNav: {
    obj: $("#menu"),
    option: {
      edge: "right"
    },
    ini: null
  },
  fab: {
    obj: $("#fab"),
    option: {},
    ini: null
  },
  askLogin: {
    html: $(".components #askLogin").cloneNode(true),
    displayLength: 3000
  }
};
app.init = function() {
  app.sideNav.ini = M.Sidenav.init(app.sideNav.obj, app.sideNav.option);
  app.fab.ini = M.FloatingActionButton.init(app.fab.obj, app.fab.option);
  setTimeout(function() {
    M.toast(app.askLogin);
  }, 3000);
  app.prevent(document);
};
app.prevent = function(elem) {

  var links = elem.getElementsByTagName("a");
  var curr = location.href;
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function(e) {
        //e.preventDefault();
        console.log(this.href);
      var n = this.href.search(/(#!)|(#)|(undefined)|((tel:).+|(mailto:).+|(intent:).+)/);
      var m =this.href.search(/(http:\/\/)((www\.jamiaworld\.in)|(localhost:8888)).+/);
      if ((n==-1)&&(this.href!="")&&(m!=-1)) {
          e.preventDefault();
          console.log("Prevented");
          app.sideNav.ini.close();
          app.navigate(this.href);
      }
    });
  }
}
app.add = function(obj) {
  for (var i = 0; i < obj.length; i++) {
    check(obj.parent, function() {
      //console.log(obj.parent);
      check(obj[i].parent, false, function() {
        obj[i].parent = obj.parent;
        //console.log(obj[i].parent);
      });
    });
    app.add(obj[i]);
  }
  switch (obj.type) {
    case "card":
      app.createCard(obj);
      break;
    case "carousel":
      app.createCarousel(obj);
      break;
    case "para":
      app.createPara(obj);
      break;
    case "collection":
      app.createCollection(obj);
      break;
    case "tabs":
      app.createTabs(obj);
      break;
    case "collapsible":
      app.createCollapsible(obj);
      break;
    case "table":
      app.createTable(obj);
      break;
    default:
  }
};

function select(q, e) {
  return e.querySelector(q);
}

function create(n, c) {
  var x;
  if (c === undefined)
    c = ".";
  if (c !== ".") {
    x = document.createElement(n);
  } else {
    x = document.createElement("div");
    c = n;
  }
  x.add(c);
  return x;
}

function append(p, c) {
  p.appendChild(c);
}

function add(e, c) {
  if (c === undefined)
    c = "";
  var arr = c.split(" ");
  if (c !== "")
    for (var i = 0; i < arr.length; i++)
      e.classList.add(arr[i]);
}

function check(v, e, f) {
  if ((typeof(e) !== typeof(true)) && (v !== undefined)) {
    //console.log("v:"+v+" e:"+e+" f:"+f);
    e();
    f = function() {};
    e = false;
  }
  if ((v !== undefined && e) || (v == undefined && !e) && (typeof(e) === typeof(true)))
    f();
}

function def(d, n, p) {
  var tr = d;
  check(p, function() {
    tr = p + "" + tr;
  });
  check(n, function() {
    tr = n;
  });
  //console.log(tr);
  return tr;
}
app.createCard = function(o) {
  var theme = "jw-basic";
  var contrast = "jw-inverted";
  var paraId = "";
  check(o.theme, function() {
    theme = o.theme;
  });
  check(o.contrast, function() {
    contrast = o.contrast;
  });
  var card = create("card " + theme);
  card.id = def(app.cardCount, o.id, "card-");
  check(o.eclass, function() {
    card.add(o.eclass);
  });
  app.cardCount++;
  check(o.img, function() {
    var imageCont = create("card-image");
    var image = create("img", "");
    image.src = root + "/images/" + o.img;
    var title = create("span", "card-title jw-basic-opacity jw-w");
    title.innerHTML = o.title;
    imageCont.append(image);
    imageCont.append(title);
    check(o.icon, function() {
      var iconAct = create("a", "btn-floating halfway-fab" + o.contrast);
      act.href = o.iconAct;
      var icon = create("i", o.icon);
      iconAct.append(icon);
      imageCont.append(iconAct);
    });
    card.append(imageCont);
  });
  var cont = create("card-content");
  check(o.img, false, function() {
    var title = create("card-title");
    title.innerHTML = o.title;
    cont.append(title);
  });
  var para = create("p", "");
  paraId = card.id + "-para";
  para.id = paraId;
  para.innerHTML = o.cont;
  cont.append(para);
  card.append(cont);
  check(o.act, function() {
    var actHolder = create("card-action");
    for (var i = 0; i < o.act.length; i++) {
      var act = create("a", "");
      act.href = o.act[i].link;
      act.innerHTML = o.act[i].name;
      actHolder.append(act);
    }
    card.append(actHolder);
  });
  var parent = $(def("", o.parent, app.page + " "));
  parent.append(card);
  check(o.saru, function() {
    o.saru.parent = "#" + paraId;
    app.add(o.saru);
  });
};
app.createCarousel = function(o) {
  var c = create("carousel");
  var id = def(app.carouselCount, o.id, "carousel-");
  var childs = [];
  c.id = id;
  app.carouselCount++;
  check(o.eclass, function() {
    c.add(o.eclass);
  });
  check(o.fixed, function() {
    var fixed = create("carousel-fixed-item center");
    fixed.innerHTML = o.fixed;
    c.append(fixed);
  });
  check(o.items, function() {
    for (var i = 0; i < o.items.length; i++) {
      var item = create("carousel-item");
      //console.log(o.items[i].eclass);
      item.add(o.items[i].eclass);
      var itemId = c.id + "-item-" + i;
      item.id = itemId;
      item.innerHTML = o.items[i].cont;
      c.append(item);
      check(o.items[i].saru, function() {
        o.items[i].saru.parent = "#" + itemId;
        childs[i] = o.items[i].saru;
      });
    }
  });

  var parent = $(def("", o.parent, app.page + " "));
  parent.append(c);
  var thisC = $("#" + id);
  var instance = M.Carousel.init(thisC, o.option);
  for (var i = 0; i < childs.length; i++)
    app.add(childs[i]);
};
app.createPara = function(o) {
  var c = create("p", "");
  check(o.eclass, function() {
    c.add(o.eclass);
  });
  c.id = def(app.paraCount, o.id, "para-");
  app.paraCount++;
  var title = create("span", "");
  if (typeof(o.title) === typeof(" "))
    title.innerHTML = '<b>' + o.title + '</b>';
  check(o.title.cont, function() {
    title.innerHTML = o.title.cont;
  });
  check(o.title.eclass, function() {
    title.add(o.eclass);
  });
  var cont = create("span", "");
  var contId = c.id + "-cont";
  cont.id = contId;
  cont.innerHTML = o.cont;
  c.append(title);
  c.append(cont);
  var parent = $(def("", o.parent, app.page + " "));
  parent.append(c);
  check(o.saru, function() {
    o.saru.parent = "#" + contId
    app.add(o.saru);
  });
}
app.createCollection = function(o) {
  var c = create("ul", "collection");
  var child = [];
  c.id = def(app.collectionCount, o.id, "collection-");
  var child = [];
  app.collection++;
  check(o.eclass, function() {
    c.add(o.eclass);
  });
  check(o.items, function() {
    var a = o.items;
    for (var i = 0; i < a.length; i++) {
      var io = a[i];
      var item = create("li", "collection-item");
      var contId = "";
      check(io.eclass, function() {
        item.add(io.eclass);
      });
      check(io.img, function() {
        item.add("avatar");
        var img = create("img", "circle");
        img.src = root + "/images/" + io.img;
        item.append(img);
      });
      //console.log(io.title);
      check(io.title, function() {
        var title = create("span", "title");
        title.innerHTML = io.title;
        item.append(title);
      });
      var cont = create("p", "");
      contId = c.id + "-cont-" + i;
      cont.id = contId;
      cont.innerHTML = io.cont;
      item.append(cont);
      check(io.icon, function() {
        var iconCont = create("a", "secondary-content material-icons");
        iconCont.href = "#!";
        check(io.icon.href, function() {
          iconCont.href = io.icon.href;
        });
        check(io.icon.icon, function() {
          var icon = create("i", io.icon.icon);
          iconCont.append(icon);
        });
        if (typeof(io.icon) === typeof(" ")) {
          var icon = create("i", io.icon)
          iconCont.append(icon);
        }
        item.append(iconCont);
      });
      c.append(item);
      check(io.saru, function() {
        io.saru.parent = "#" + contId;
        child[i] = io.saru;
      });
    }
    var parent = $(def("", o.parent, app.page + " "));
    parent.append(c);
    for (var i = 0; i < child.length; i++) {
      app.add(child[i]);
    }
  });
}
app.createCollapsible = function(o) {
  //console.log("hi");
  var c = create("ul", "collapsible");
  var id = def(app.tabCount, o.id, "collapsible-");
  c.id = id;
  var child = [];
  check(o.eclass, function() {
    c.add(o.eclass);
  });
  check(o.options.popout, function() {
    if (o.options.popout) {
      c.classList.remove("collapsible");
      c.add("collapsible popout");
    }
  });
  for (var i = 0; i < o.items.length; i++) {
    var li = create("li", "");
    check(o.items[i].eclass, function() {
      li.add(o.items[i].eclass);
    });
    var title = create("collapsible-header");
    title.innerHTML = o.items[i].title;
    var cont = create("collapsible-body");
    var contId = id + "-cont-" + i;
    cont.id = contId;
    cont.innerHTML = o.items[i].cont;
    child[i] = '';
    check(o.items[i].saru, function() {
      o.items[i].saru.parent = "#" + contId;
      child[i] = o.items[i].saru;
    });
    li.append(title);
    li.append(cont);
    //console.log(li);
    c.append(li);
  }
  //console.log(o.parent);
  var parent = $(def("", o.parent, app.page + " "));
  parent.append(c);
  //console.log(c);
  var instance = M.Collapsible.init($("#" + id), o.options);
  for (var i = 0; i < child.length; i++) {
    app.add(child[i]);
  }
}
app.createTabs = function(o) {
  var tabHolder = create("col s12");
  var tabs = create("ul", "tabs");
  var childs = [];
  var id = def(app.tabCount, o.id, "tab-");
  tabs.id = id;
  check(o.eclass, function() {
    tabs.add(o.eclass);
  });
  for (var i = 0; i < o.items.length; i++) {
    var title = create("li", "tab col s3");
    var anc = create("a", "");
    check(o.active, function() {
      if (o.active === i)
        anc.add("active");
    });
    anc.href = "#" + id + "-cont-" + i;
    anc.innerHTML = o.items[i].title;
    title.append(anc);
    tabs.append(title);
  }
  tabHolder.append(tabs);
  for (var i = 0; i < o.items.length; i++) {
    var ele = create("col s12");
    ele.id = id + "-cont-" + i;
    check(o.items[i].eclass, function() {
      ele.add(o.items[i].eclass);
    });
    ele.innerHTML = o.items[i].cont;
    tabHolder.append(ele);
    childs[i] = {};
    check(o.items[i].saru, function() {
      o.items[i].saru.parent = "#" + ele.id;
      childs[i] = o.items[i].saru;
    });
  }
  var parent = $(def("", o.parent, app.page + " "));
  parent.append(tabHolder);
  var instance = M.Tabs.init($("#" + id), check(o.options, function() {
    return o.option;
  }));
  for (var i = 0; i < childs.length; i++) {
    app.add(childs[i]);
  }
  app.tabsCount++;
}
app.createTable = function(o) {

  var c = create("table", "");
  var id = def(app.tableCount, o.id, "table-");
  c.id = id;
  var child = [];
  check(o.eclass, function() {
    c.add(o.eclass);
  });
  check(o.header, function() {
    var header = create("thead", "");
    var tr = create("tr", "");
    for (var i = 0; i < o.header.length; i++) {
      var th = create("th", "");
      th.innerHTML = o.header[i];
      th.append(td);
    }
    header.append(th);
    c.append(header);
  });
  check(o.items, function() {
    var body = create("tbody", "");
    for (var i = 0; i < o.items.length; i++) {
      var tr = create("tr", "");
      for (var j = 0; j < o.items[i].length; j++) {
        var td = create("td", "");
        td.innerHTML = o.items[i][j];
        tr.append(td);
      }
      body.append(tr);
    }
    c.append(body);
  });
  var parent = $(def("", o.parent, app.page + " "));
  //console.log(o.parent);
  parent.append(c);
}
app.navigate = function(u) {
    console.log(location.href);
    var loc = location.href;
  history.pushState(loc, "THETWO", u);
  app.loadData();
}
app.searchInit = function() {
  var turl = root + "/data/courses_search.php";
  turl.load("", function(e) {
    var elem = document.querySelector('#mainSearch');
    app.search = e.url;
    var options = {
      data: e.data,
      onAutocomplete: function() {
        console.log(elem.value);
        var val = elem.value;
        var newUrl = app.search[val];
        //window.location = "http://"+location.host+newUrl;
          app.navigate("http://"+location.host+newUrl);
      }
    };
    var instance = M.Autocomplete.init(elem, options);
  });
}
app.loadData = function() {
    //console.log("Load Called");
  var tpath = root + "/data/main.php";
  $(".page-role").innerHTML = "";
  $(".nc").innerHTML = "";
  tpath.load("path=" + location.pathname, function(e) {
    app.add(e);
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0;
    $(".loader").add("hide");
    app.prevent($(".page-role"));
  });
}
window.onload = function() {
  app.init();
  app.searchInit();
  app.loadData();
}
