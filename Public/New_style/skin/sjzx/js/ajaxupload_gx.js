var xhr;
    function createXMLHttpRequest()
    {
        if(window.ActiveXObject)
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        else if(window.XMLHttpRequest)
        {
            xhr = new XMLHttpRequest();
        }
    }
    function UpladFile()
    {
        var fileObj = document.getElementById("file").files[0];
        var FileController = '/e/member/msg/AddMsg_ch/upload_1.php';
        var form = new FormData();
        form.append("pictureurl", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
            	document.getElementById('preview').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }
    function UpladFile2()
    {
        var fileObj = document.getElementById("file2").files[0];
        var FileController = '/e/member/msg/AddMsg_ch/upload_2.php';
        var form = new FormData();
        form.append("pictureurl2", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange2;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange2()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview2').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }
    function UpladFile3()
    {
        var fileObj = document.getElementById("file3").files[0];
        var FileController = '/e/member/msg/AddMsg_ch/upload_3.php';
        var form = new FormData();
        form.append("pictureurl3", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange3;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange3()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview3').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }
    function UpladFile4()
    {
        var fileObj = document.getElementById("file4").files[0];
        var FileController = '/e/member/msg/AddMsg_ch/upload_4.php';
        var form = new FormData();
        form.append("pictureurl4", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange4;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange4()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview4').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }
    function UpladFile5()
    {
        var fileObj = document.getElementById("file5").files[0];
        var FileController = '/e/member/msg/AddMsg_ch/upload_5.php';
        var form = new FormData();
        form.append("pictureurl5", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange5;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange5()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview5').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }



function open_1(){
    var pic_1=document.getElementById('pic_1').value;
    var imgarray=document.getElementsByTagName('img');
    var realWidth = imgarray.width;
    var realHeight = imgarray.height;
    window.open('/e/member/company/uploadimgzs/'+pic_1,'newindex','height='+realHeight+', width='+realWidth+',top=100,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no')
    
}

function del_1(){
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(xmlhttp.responseText.indexOf('img')>0){
                document.getElementById('preview').innerHTML=xmlhttp.responseText;
                }else{
                    alert(xmlhttp.responseText);
                }
    }
  }
   var bb=document.getElementById('pic_1').value;
xmlhttp.open("get","/e/member/msg/AddMsg_ch/del.php?pic="+bb,true);
//设置post请求头
/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
//获取数据

xmlhttp.send();
}

function open_2(){
    var pic_2=document.getElementById('pic_2').value;
    var imgarray=document.getElementsByTagName('img');
    var realWidth = imgarray.width;
    var realHeight = imgarray.height;
    window.open('/e/member/company/uploadimgzs/'+pic_2,'newindex','height='+realHeight+', width='+realWidth+',top=100,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no')
    
}

function del_2(){
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(xmlhttp.responseText.indexOf('img')>0){
                document.getElementById('preview2').innerHTML=xmlhttp.responseText;
                }else{
                    alert(xmlhttp.responseText);
                }
    }
  }
   var bb=document.getElementById('pic_2').value;
xmlhttp.open("get","/e/member/msg/AddMsg_ch/del.php?pic="+bb,true);
//设置post请求头
/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
//获取数据

xmlhttp.send();
} 

function open_3(){
    var pic_3=document.getElementById('pic_3').value;
    var imgarray=document.getElementsByTagName('img');
    var realWidth = imgarray.width;
    var realHeight = imgarray.height;
    window.open('/e/member/company/uploadimgzs/'+pic_3,'newindex','height='+realHeight+', width='+realWidth+',top=100,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no')
    
}

function del_3(){
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(xmlhttp.responseText.indexOf('img')>0){
                document.getElementById('preview3').innerHTML=xmlhttp.responseText;
                }else{
                    alert(xmlhttp.responseText);
                }
    }
  }
   var bb=document.getElementById('pic_3').value;
xmlhttp.open("get","/e/member/msg/AddMsg_ch/del.php?pic="+bb,true);
//设置post请求头
/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
//获取数据

xmlhttp.send();
} 

function open_4(){
    var pic_4=document.getElementById('pic_4').value;
    var imgarray=document.getElementsByTagName('img');
    var realWidth = imgarray.width;
    var realHeight = imgarray.height;
    window.open('/e/member/company/uploadimgzs/'+pic_4,'newindex','height='+realHeight+', width='+realWidth+',top=100,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no')
    
}

function del_4(){
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(xmlhttp.responseText.indexOf('img')>0){
                document.getElementById('preview4').innerHTML=xmlhttp.responseText;
                }else{
                    alert(xmlhttp.responseText);
                }
    }
  }
   var bb=document.getElementById('pic_4').value;
xmlhttp.open("get","/e/member/msg/AddMsg_ch/del.php?pic="+bb,true);
//设置post请求头
/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
//获取数据

xmlhttp.send();
} 

function open_5(){
    var pic_5=document.getElementById('pic_5').value;
    var imgarray=document.getElementsByTagName('img');
    var realWidth = imgarray[4].width;
    var realHeight = imgarray[4].height;
    window.open('/e/member/company/uploadimgzs/'+pic_5,'newindex','height='+realHeight+', width='+realWidth+',top=100,left=200,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no')
    
}

function del_5(){
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(xmlhttp.responseText.indexOf('img')>0){
                document.getElementById('preview5').innerHTML=xmlhttp.responseText;
                }else{
                    alert(xmlhttp.responseText);
                }
    }
  }
   var bb=document.getElementById('pic_5').value;
xmlhttp.open("get","/e/member/msg/AddMsg_ch/del.php?pic="+bb,true);
//设置post请求头
/*xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");*/
//获取数据

xmlhttp.send();
}     