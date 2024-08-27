function attendance() {
  var ft = document.getElementById("ft");
  var dp = document.getElementById("dp");
  var cu = document.getElementById("cu");
  var sb = document.getElementById("sb");
  var lv = document.getElementById("lv");
  var search = document.getElementById("search");

  var f = new FormData();
  f.append("ft", ft.value);
  f.append("dp", dp.value);
  f.append("cu", cu.value);
  f.append("sb", sb.value);
  f.append("lv", lv.value);
  f.append("search", search.value);

var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var row = document.getElementById("table_row");
            var text = r.responseText;
            row.innerHTML = text;
        }
    }

    r.open("POST","attendanceProcess.php",true);
    r.send(f);

}


function submit(p){

    var ft = document.getElementById("ft");
    var dp = document.getElementById("dp");
    var cu = document.getElementById("cu");
    var sb = document.getElementById("sb");

    var f = new FormData();
    f.append("sid", p);
    f.append("ft", ft.value);
    f.append("dp", dp.value);
    f.append("su", sb.value);
    f.append("cu", cu.value);
    f.append("lv", lv.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var text = r.responseText;
           alert(text);
        } 
    }

    r.open("POST", "attendanceMarkProcess.php", true);
    r.send(f);

}


function classShedul(){
    var ft = document.getElementById("ft");
    var dp = document.getElementById("dp");
    var cu = document.getElementById("cu");
    var sb = document.getElementById("sb");
    var lv = document.getElementById("lv");
    var to = document.getElementById("to");
    var from = document.getElementById("from");
    
    var f = new FormData();
    f.append("ft", ft.value);
    f.append("dp", dp.value);
    f.append("su", sb.value);
    f.append("cu", cu.value);
    f.append("lv", lv.value);
    f.append("to", to.value);
    f.append("from", from.value);
    
    var status = document.getElementById("status");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var text = r.responseText;
           if(text == "ok"){
            status.innerHTML ="";
           }
        } 
    }

    r.open("POST", "classShedulProcess.php", true);
    r.send(f);


}



