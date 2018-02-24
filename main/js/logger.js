function logPHP(msg){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      }
  };
  var request = "msg=" + msg;
  xhttp.open("POST", "functions/functions.php?func=logPHP", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(request);
}

window.onerror = function(message, source, lineno, colno, error) {
    source = source.replace(/^.*\/\/[^\/]+/, '');
    let tabs = "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
    logPHP(message + tabs + "(" + source + " L" + lineno + " C" + colno + ")");
};
