//根据指定的样式找元素,这个要放在最前面
function getByClass(oParent,sClass){
		var aEle = oParent.getElementsByTagName('*');
		var result = [];
		var re = new RegExp('\\b' + sClass + '\\b','i');
		for(var i=0;i<aEle.length;i++){
			if(re.test(aEle[i].className)){
				result.push(aEle[i]);
			}
		}
return result;
}


function sortTable(table_id,col_num,datatype,p_n){
 var oTable = document.getElementById(table_id);//取得表格的值
 var oTbody = oTable.tBodies[0];
 var oTrs = oTbody.rows;
 var arrTrs = new Array();
 var fragment = document.createDocumentFragment();
 for(var i=0;i<oTrs.length;i++){
     arrTrs[i] = oTrs[i];
 }
  /*if(oTable.sortCol ==col_num){//判断是否点击，点击了就把对象倒置
    arrTrs.reverse();//反转*/
    arrTrs.sort(generateCompareTrs(col_num,datatype,p_n));
 for(var i=0;i<arrTrs.length;i++){
     fragment.appendChild(arrTrs[i]);
 }
 oTbody.appendChild(fragment);
 oTable.sortCol = col_num;
}
function generateCompareTrs(col_num,datatype,p_n){//alert(this.nodeName);
    return function compareItem(arrTrs_item1,arrTrs_item2,datatype){
    	//arrTrs_item1.cells[col_num].setAttribute('data-id',arrTrs_item1.cells[col_num].firstChild.nodeValue);//向data-id属性里添加数值,可以不要
    	//arrTrs_item2.cells[col_num].setAttribute('data-id',arrTrs_item2.cells[col_num].firstChild.nodeValue);
        var value1 = convertType(arrTrs_item1.cells[col_num].firstChild.nodeValue,"float");
        var value2 = convertType(arrTrs_item2.cells[col_num].firstChild.nodeValue,"float");
		/*var v1 = convertType(arrTrs_item1.cells[2].getAttribute('data-id'),datatype);
        var v2 = convertType(arrTrs_item2.cells[2].getAttribute('data-id'),datatype);*/
		if(p_n>0){	
				return value2-value1;
		}else{
				return value1-value2;
		}
     }
}

function convertType(value,datatype){
 switch(datatype){
         case "int":
            return parseInt(value);
         case "float":
            return parseFloat(value);
         case "date":
            return new Date(Date.parse(value));
    }
}
