
function setTab(name,cursel){ 
cursel_0=cursel;
var links = document.getElementById("tab1").getElementsByTagName('li');
links_len=links.length;
for(var i=1; i<=links_len; i++){ 
var menu = document.getElementById(name+i);
var menudiv = document.getElementById("con_"+name+"_"+i); 
if(i==cursel){ 
menu.className="off"; 
menudiv.style.display="block"; 
} 
else{ 
menu.className=""; 
menudiv.style.display="none"; 
} 
} 
} 
function Next(){ 
cursel_0++; 
if (cursel_0>links_len)cursel_0=1 
setTab(name_0,cursel_0); 
} 
var name_0='one'; 
var cursel_0=1; 
var links_len,iIntervalId; 
onload=function(){ 
var links = document.getElementById("gengduo").getElementsByTagName('li');
links_len=links.length; 
for(var i=0; i<links_len; i++){ 
links[i].onmouseover=function(){ 
clearInterval(iIntervalId); 
} 
} 
document.getElementById("con_"+name_0+"_"+links_len).parentNode.onmouseover=function(){ 
clearInterval(iIntervalId); 
} 
setTab(name_0,cursel_0); 
} 