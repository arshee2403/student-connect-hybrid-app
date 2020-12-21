// This is a JavaScript file

// This is a JavaScript file
window.fn = {};

window.fn.open = function () {
  var menu = document.getElementById('sidemenu');
  menu.open();
};



window.fn.load = function (page) {
  var menu = document.getElementById('sidemenu');
  var myNavigator = document.getElementById('myNavigator');

  menu.close();
  myNavigator.resetToPage(page, { animation: 'fade' });
};


