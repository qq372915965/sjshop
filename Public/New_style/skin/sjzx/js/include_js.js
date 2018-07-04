function Msg(n,field,msg){
alert(msg)
 if(n==1){
  // field.value="";
   field.focus();
 }
}
function Leng(field,max,message){
var Ret = true
if(field.value.length){
	if (field.value.length>max)
		Ret = false}
if(!Ret)Msg(1,field,message)
return(Ret)
}
function JustifyNull1(field){
var Ret = true
var str = "" + field.value
if(str.length)
      { for(var i=0;i<str.length;i++)
        if(str.charAt(i)!=" ")
	           break
        if(i>=str.length)
		field.value = ""
      }	   
      
if (field.value.length==0)
	Ret = false
return (Ret)
}
function JustifyNull(field,msg){
if(!JustifyNull1(field))
	{Msg(1,field,msg)
	return false}
return true	
}
function IsInteger(field,iValue){
	var Ret = true;
	var NumStr="0123456789";
	var chr;
	for (i=0;i<iValue.length;++i){
		chr=iValue.charAt(i);
		if (NumStr.indexOf(chr,0)==-1)
			Ret = false			
	}
return(Ret);
  } 
function IsInteger1(field,message){
if(!IsInteger(field,field.value))
	{Msg(1,field,message)
	return false
	}
return true
}
function Is_Numeric(field,message){
	var Ret = true
	var NumStr="0123456789"
	var decUsed=false
	var chr
	for (i=0;i<field.value.length;++i){
		chr=field.value.charAt(i)
		if (NumStr.indexOf(chr,0)==-1)
			{
			 if ( (!decUsed) && chr==".")
			  {decUsed=true}
			 else
			  {Ret=false}
			}
	}
    if (!Ret) Msg(1,field,message)
    return(Ret)
}
function JustifyRadio1(n,field){
var Ret = false
for(i=0;i<n;i++){
	var resulti = field[i].checked
	Ret = Ret || resulti
	}
return(Ret)
}
function JustifyZip(field,message){
var Ret = true
if(field.value.length)
	{if(!IsInteger(field,field.value))
		Ret = false
	if(field.value.length!=6)
		Ret = false
	if(!Ret)Msg(1,field,message)
	}
return(Ret)
}
function JustifyTelephone(field){
var Ret = true
var chr
var s="0123456789-()"
for (i=0;i<field.value.length;++i){
   chr=field.value.charAt(i)
   if (s.indexOf(chr,0)==-1){
   Ret = false}
}
if(!Ret)Msg(1,field,"您输入的电话有误！")
return (Ret)
}
function JustifyEmail(field,message){
var Ret = true
var str = field.value
if (str.length){
	var lgth = str.length 	
 	var posf = str.indexOf("@")
 	var posl = str.lastIndexOf("@")
	var posb = str.indexOf(" ")
 	if (posf == -1 || posf == 0 || posl!=posf || (lgth-1) ==posl || posb!=-1)
 		Ret = false
	}
if(!Ret)Msg(1,field,message)
return(Ret)
}
function IsGreater(field,limit){
    var Ret = (IsInteger(field,field.value)) ? (field.value > limit )  : false
    return(Ret)
  }
function IsLess(field,limit){
    var Ret = (IsInteger(field,field.value) ) ? (field.value < limit )  : false
    return(Ret)
  }
function InvalidChar(field,msg){
var Ret = true
var str = field.value
if(str.length)
{
  var pos = str.indexOf("'")
  var pos1 = str.indexOf("<")
  var pos2 = str.indexOf(">")
  if(pos!=-1||pos1!=-1||pos2!=-1)
  {
    Ret = false
    Msg(1,field,msg)
  }
}
return(Ret)
}

/*函数调用
 */


function Integer_Must(field,msg1,msg2,msg3,n){
if (JustifyNull(field,msg1)&&IsInteger1(field,msg2)&&Leng(field,n,msg3))
  return true;
}
function Integer_NotMust(field,msg2,msg3,n){
if (JustifyNull1(field))
  { if (IsInteger1(field,msg2)&&Leng(field,n,msg3))
    return true
  }
else { return true }
}

function Char_Must(field,msg1,msg2,n){
if (JustifyNull(field,msg1)&&Leng(field,n,msg2)&&InvalidChar(field,"您的输入中不允许存在非法字符，如；单引号等!"))
	return true
}
function Char_NotMust(field,msg2,n){
if (JustifyNull1(field))
  { if (Leng(field,n,msg2)&&InvalidChar(field,"您的输入中不允许存在非法字符，如；单引号等!"))
    return true
  }
else { return true }
}

function Selected_Must(field,msg1,msg2){
if (field.value==msg2){
		Msg(1,field,msg1);
		return false;
}
  return true
}

function Numeric_Must(field,msg1,msg2,msg3,n){
if (JustifyNull(field,msg1)&&Is_Numeric(field,msg2)&&Leng(field,n,msg3))
  return true
} 
function Numeric_NotMust(field,msg2,msg3,n){
if (JustifyNull1(field))
  { if (Is_Numeric(field,msg2)&&Leng(field,n,msg3))
    return true
  }
else { return true }
}

function Radio_Must(n,field,msg){
if(!JustifyRadio1(n,field))
	{Msg(1,field[0],msg)
	return false}
return true
}

function Checkbox_Must(n,field,msg){
if(!JustifyRadio1(n,field))
	{Msg(1,field[0],msg)
	return false}
return true
}

function Zip_Must(field,msg1,msg2,msg3){
if (JustifyNull(field,msg1)&&IsInteger1(field,msg2)&&JustifyZip(field,msg3))
  return true
} 
function Zip_NotMust(field,msg2,msg3){
if (JustifyNull1(field))  
  { if (IsInteger1(field,msg2)&&JustifyZip(field,msg3))
    return true
  }  
else { return true }  
}

function Telephone_Must(field,msg1,msg2,n){
if (JustifyNull(field,msg1)&&JustifyTelephone(field)&&Leng(field,n,msg2))
  return true
}
function Telephone_NotMust(field,msg1,n){
if (JustifyNull1(field))
  { if (JustifyTelephone(field)&&Leng(field,n,msg1))
    return true
  }
else { return true }
}

function Email_Must(field,msg1,msg2,msg3,n){
if (JustifyNull(field,msg1)&&JustifyEmail(field,msg2)&&Leng(field,n,msg3))
    return true
}
function Email_NotMust(field,msg1,msg2,n){
if (JustifyNull1(field))
  { if (JustifyEmail(field,msg1)&&Leng(field,n,msg2))
    return true
  }
else { return true }
}

function Verify_Equal(field1,field2,message){
var Ret = false  
//  if(field1.value.length==0){
//    Ret = true 
//  }else {
    if(field1.value==field2.value){
      Ret = true 
    }else {
      Msg(1,field1,message)
//      window.document.form1.reset();
    }
//  }
return(Ret)  
}

function Verify_Minlength(field1,message){
var Ret = false
if (field1.value.length<6){
  Msg(1,field1,message)
}else {
  Ret = true
}			
return(Ret)	
}		


function PopWin(openurl){
	
	var iWidth =  getScreenWidth()-200;
	var iHeight = getScreenHeight()-60;
        window.open(openurl,'popwin11','menubar=no,location=no,resizable=1,top=0,left=0,width='+iWidth+',height='+iHeight+',status=0,titlebar=no,scrollbars=yes');
}

function getScreenHeight()//取得屏幕可用高度像素
{
	var intHeight = window.screen.availHeight;
	return intHeight;
}

function getScreenWidth()//取的屏幕可用宽度像素
{
	return window.screen.availWidth;
}