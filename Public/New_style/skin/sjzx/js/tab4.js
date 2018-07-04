 function change_div(id){
      if (id == 'con_two_2' )
      {
         document.getElementById("con_two_1").style.display = 'none' ;
         document.getElementById("con_two_2").style.display = 'block' ;
         document.getElementById("two1").className="";
         document.getElementById("two2").className="tab_on";
      }
      else
      {
         document.getElementById("con_two_2").style.display = 'none' ;
         document.getElementById("con_two_1").style.display = 'block' ;
         document.getElementById("two1").className="tab_on";
         document.getElementById("two2").className="";
      }
    }