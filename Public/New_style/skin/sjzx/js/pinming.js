$(".chepan").on("click", function(){
	

	  var data;
	  var next = document.getElementById("gengduo")
      next.style.display = "block";
	  
	 //热固性塑料
	 data = '<div class="list_sty">热固性塑料:</div>'; 
	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EP'"+');"><span class="screen">EP<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EPDM'"+');"><span class="screen">EPDM<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PU'"+');"><span class="screen">PU<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'电木粉'"+');"><span class="screen">电木粉<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'电玉粉'"+');"><span class="screen">电玉粉<i>&nbsp;</i></span></a></div>';
	 
	 $("#list_cInvName").html(data);
	 
	 
	 
	 
     //通用塑料
	 
	 data =  '<div class="list_sty"></div><div class="list_sty">通用塑料:</div>'; 
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS'"+');"><span class="screen">ABS<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS高胶粉'"+');"><span class="screen">ABS高胶粉<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ADPOLY'"+');"><span class="screen">ADPOLY<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'AS(SAN)'"+');"><span class="screen">AS(SAN)<i>&nbsp;</i></span></a></div>';

	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'CA'"+');"><span class="screen">CA<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'CAB'"+');"><span class="screen">CAB<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EAA'"+');"><span class="screen">EAA<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EVA'"+');"><span class="screen">EVA<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'GPPS'"+');"><span class="screen">GPPS<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'HDPE'"+');"><span class="screen">HDPE<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'HIPS'"+');"><span class="screen">HIPS<i>&nbsp;</i></span></a></div>';

	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'LDPE'"+');"><span class="screen">LDPE<i>&nbsp;</i></span></a></div>';

	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'LLDPE'"+');"><span class="screen">LLDPE<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MBS'"+');"><span class="screen">MBS<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MDPE'"+');"><span class="screen">MDPE<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MS'"+');"><span class="screen">MS<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MVLDPE(茂金属)'"+');"><span class="screen">MVLDPE(茂金属)<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PP'"+');"><span class="screen">PP<i>&nbsp;</i></span></a></div>';

	 
	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PVC'"+');"><span class="screen">PVC<i>&nbsp;</i></span></a></div>';

	 data = data +  '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ULDPE'"+');"><span class="screen">ULDPE<i>&nbsp;</i></span></a></div>';
	 
	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';

	 
	 $("#list_cInvName_more").html(data);
     
     //工程塑料
	 
	 data = data + '<div class="list_sty">工程塑料:</div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS/PA'"+');"><span class="screen">ABS/PA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS/PBT'"+');"><span class="screen">ABS/PBT<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS/PC'"+');"><span class="screen">ABS/PC<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ABS/PMMA'"+');"><span class="screen">ABS/PMMA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'AES'"+');"><span class="screen">AES<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'APPEEL'"+');"><span class="screen">APPEEL<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ASA'"+');"><span class="screen">ASA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ASA/PC'"+');"><span class="screen">ASA/PC<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'CAP'"+');"><span class="screen">CAP<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'COC'"+');"><span class="screen">COC<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'COP'"+');"><span class="screen">COP<i>&nbsp;</i></span></a></div>';
	 
	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'CPVC'"+');"><span class="screen">CPVC<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'DAP'"+');"><span class="screen">DAP<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EBA'"+');"><span class="screen">EBA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ECTFE'"+');"><span class="screen">ECTFE<i>&nbsp;</i></span></a></div>';
	 
	 
	 
	 
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EEA'"+');"><span class="screen">EEA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EFEP'"+');"><span class="screen">EFEP<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EMAA'"+');"><span class="screen">EMAA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EMAA'"+');"><span class="screen">EMAA<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EPS'"+');"><span class="screen">EPS<i>&nbsp;</i></span></a></div>';

	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'ETFE'"+');"><span class="screen">ETFE<i>&nbsp;</i></span></a></div>';
 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EVOH'"+');"><span class="screen">EVOH<i>&nbsp;</i></span></a></div>';
	 
	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EXACT'"+');"><span class="screen">EXACT<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'FEP'"+');"><span class="screen">FEP<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'IXEF'"+');"><span class="screen">IXEF<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'K(Q)胶'"+');"><span class="screen">K(Q)胶<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'LCBR'"+');"><span class="screen">LCBR<i>&nbsp;</i></span></a></div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'LCP'"+');"><span class="screen">LCP<i>&nbsp;</i></span></a></div>';
	 
 	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MABS'"+');"><span class="screen">MABS<i>&nbsp;</i></span></a></div>';
 	 
 	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'MMBS'"+');"><span class="screen">MMBS<i>&nbsp;</i></span></a></div>';
 	 
 	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'M/PE/PP'"+');"><span class="screen">M/PE/PP<i>&nbsp;</i></span></a></div>';
 	 
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA1010'"+');"><span class="screen">PA1010<i>&nbsp;</i></span></a></div>';
  
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA10T'"+');"><span class="screen">PA10T<i>&nbsp;</i></span></a></div>';
	 
	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
   
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA11'"+');"><span class="screen">PA11<i>&nbsp;</i></span></a></div>';

     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA12'"+');"><span class="screen">PA12<i>&nbsp;</i></span></a></div>';
 
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA46'"+');"><span class="screen">PA46<i>&nbsp;</i></span></a></div>';
  
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA4T'"+');"><span class="screen">PA4T<i>&nbsp;</i></span></a></div>';
     
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA6'"+');"><span class="screen">PA6<i>&nbsp;</i></span></a></div>';
     
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA6/66 '"+');"><span class="screen">PA6/66 <i>&nbsp;</i></span></a></div>';
     
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA610'"+');"><span class="screen">PA610<i>&nbsp;</i></span></a></div>';
     
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA610/PTFE'"+');"><span class="screen">PA610/PTFE<i>&nbsp;</i></span></a></div>';
     
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA612'"+');"><span class="screen">PA612<i>&nbsp;</i></span></a></div>';
     
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA612/F/PTFE '"+');"><span class="screen">PA612/F/PTFE <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA66'"+');"><span class="screen">PA66<i>&nbsp;</i></span></a></div>';	
      
     data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA46'"+');"><span class="screen">PA46<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA66/C/PTFE'"+');"><span class="screen">PA66/C/PTFE<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA66/PTFE '"+');"><span class="screen">PA66/PTFE<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA6T'"+');"><span class="screen">PA6T<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA6T/66'"+');"><span class="screen">PA6T/66<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA9T'"+');"><span class="screen">PA9T<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA46'"+');"><span class="screen">PA46<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA/ABS'"+');"><span class="screen">PA/ABS<i>&nbsp;</i></span></a></div>';	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PA/MXD6 '"+');"><span class="screen">PA/MXD6 <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PAE'"+');"><span class="screen">PAE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PAR'"+');"><span class="screen">PAR<i>&nbsp;</i></span></a></div>';
	   
	  	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PB-1'"+');"><span class="screen">PB-1<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT'"+');"><span class="screen">PBT<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT/ABS'"+');"><span class="screen">PBT/ABS<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT/ASA'"+');"><span class="screen">PBT/ASA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT/F/PTFE'"+');"><span class="screen">PBT/F/PTFE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT/PC '"+');"><span class="screen">PBT/PC<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBT/PET '"+');"><span class="screen">PBT/PET <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC'"+');"><span class="screen">PC<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/ABS '"+');"><span class="screen">PC/ABS <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/AES '"+');"><span class="screen">PC/AES <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/ASA '"+');"><span class="screen">PC/ASA <i>&nbsp;</i></span></a></div>';
	   
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/C/PTFE '"+');"><span class="screen">PC/C/PTFE <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/CF '"+');"><span class="screen">PC/CF <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/HIPS'"+');"><span class="screen">PC/HIPS<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/PBT '"+');"><span class="screen">PC/PBT <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/PET'"+');"><span class="screen">PC/PET<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/PMMA'"+');"><span class="screen">PC/PMMA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/PS '"+');"><span class="screen">PC/PS <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/PTFE '"+');"><span class="screen">PC/PTFE <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/SAN '"+');"><span class="screen">PC/SAN <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PC/TPFE'"+');"><span class="screen">PC/TPFE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PCT '"+');"><span class="screen">PCT <i>&nbsp;</i></span></a></div>';
	   
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PCTA '"+');"><span class="screen">PCTA <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PCTA/PCTG '"+');"><span class="screen">PCTA/PCTG <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PCTG '"+');"><span class="screen">PCTG <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PE/PTFE '"+');"><span class="screen">PE/PTFE <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PEEK'"+');"><span class="screen">PEEK<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PEI'"+');"><span class="screen">PEI<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PES'"+');"><span class="screen">PES<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PET'"+');"><span class="screen">PET<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PETG'"+');"><span class="screen">PETG<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PE蜡'"+');"><span class="screen">PE蜡<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PF'"+');"><span class="screen">PF<i>&nbsp;</i></span></a></div>';
	   
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PFA'"+');"><span class="screen">PFA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PMMA'"+');"><span class="screen">PMMA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PMP'"+');"><span class="screen">PMP<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'POK'"+');"><span class="screen">POK<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'POM'"+');"><span class="screen">POM<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'POM/PTFE '"+');"><span class="screen">POM/PTFE <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPA'"+');"><span class="screen">PPA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPE'"+');"><span class="screen">PPE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPE/PA '"+');"><span class="screen">PPE/PA <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPO'"+');"><span class="screen">PPO<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPO/PA '"+');"><span class="screen">PPO/PA <i>&nbsp;</i></span></a></div>';
	   
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PP-B '"+');"><span class="screen">PP-B <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PP-R '"+');"><span class="screen">PP-R <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPS'"+');"><span class="screen">PPS<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPS/CF '"+');"><span class="screen">PPS/CF <i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PPSU'"+');"><span class="screen">PPSU<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PTFE'"+');"><span class="screen">PTFE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PVDF'"+');"><span class="screen">PVDF<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SEPS'"+');"><span class="screen">SEPS<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SMA树脂'"+');"><span class="screen">SMA树脂<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SMMA'"+');"><span class="screen">SMMA<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SOE'"+');"><span class="screen">SOE<i>&nbsp;</i></span></a></div>';
	   
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SPS'"+');"><span class="screen">SPS<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'THV'"+');"><span class="screen">THV<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'UCAR'"+');"><span class="screen">UCAR<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'UHMWPE'"+');"><span class="screen">UHMWPE<i>&nbsp;</i></span></a></div>';
	   data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'XLPE'"+');"><span class="screen">XLPE<i>&nbsp;</i></span></a></div>';
	   

     //热塑弹性体
	 
	 	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 	   	 data = data +  '<div class="list_sty"></div>';

	 data = data + '<div class="list_sty">热塑弹性体:</div>';
	 
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'BR'"+');"><span class="screen">BR<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EMA'"+');"><span class="screen">EMA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'EMMA'"+');"><span class="screen">EMMA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'CPE'"+');"><span class="screen">CPE<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'OBC'"+');"><span class="screen">OBC<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'POE'"+');"><span class="screen">POE<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBE'"+');"><span class="screen">PBE<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'POP'"+');"><span class="screen">POP<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SBR'"+');"><span class="screen">SBR<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SBS'"+');"><span class="screen">SBS<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SEBS'"+');"><span class="screen">SEBS<i>&nbsp;</i></span></a></div>';
     	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SURLYN'"+');"><span class="screen">SURLYN<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SIS'"+');"><span class="screen">SIS<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'SSBR'"+');"><span class="screen">SSBR<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPE'"+');"><span class="screen">TPE<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPEE'"+');"><span class="screen">TPEE<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPO'"+');"><span class="screen">TPO<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPR'"+');"><span class="screen">TPR<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPSIV'"+');"><span class="screen">TPSIV<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPU'"+');"><span class="screen">TPU<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'TPV'"+');"><span class="screen">TPV<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'氟橡胶'"+');"><span class="screen">氟橡胶<i>&nbsp;</i></span></a></div>';
	 	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'硅胶'"+');"><span class="screen">硅胶<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'丁二烯橡胶'"+');"><span class="screen">丁二烯橡胶<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'丁腈橡胶'"+');"><span class="screen">丁腈橡胶<i>&nbsp;</i></span></a></div>';
	



     //降解塑料	
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   	 data = data +  '<div class="list_sty"></div>';
	 data = data +  '<div class="list_sty"></div>';
	   	 data = data +  '<div class="list_sty"></div>';
	 
	 data = data + '<div class="list_sty">降解塑料:</div>';
	 
     data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PLA'"+');"><span class="screen">PLA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PSM'"+');"><span class="screen">PSM<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PBSA'"+');"><span class="screen">PBSA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PCL'"+');"><span class="screen">PCL<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PHA'"+');"><span class="screen">PHA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PHB'"+');"><span class="screen">PHB<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'PVA'"+');"><span class="screen">PVA<i>&nbsp;</i></span></a></div>';
	 data = data + '<div class="list_sty"><a href="javascript:goSort('+"'cInvName'"+','+"'淀粉树脂'"+');"><span class="screen">淀粉树脂<i>&nbsp;</i></span></a></div>';
	 
	 $("#list_cInvName_more").html(data);
	 
})