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

    //普通认证-营业执照
    function UpladFile()
    {
        var fileObj = document.getElementById("file").files[0];
        var FileController = '/e/member/company/companyupload.php';
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
    
    //普通认证-税务登记证
    function UpladFile2()
    {
        var fileObj = document.getElementById("file2").files[0];
        var FileController = '/e/member/company/companyupload2.php';
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

    //普通认证-组织结构代码证
    function UpladFile3()
    {
        var fileObj = document.getElementById("file3").files[0];
        var FileController = '/e/member/company/companyupload3.php';
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

    //普通认证-身份证正面
    function UpladFile4()
    {
        var fileObj = document.getElementById("file4").files[0];
        var FileController = '/e/member/company/uscardupload22.php';
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

    //普通认证-身份证背面
    function UpladFile5()
    {
        var fileObj = document.getElementById("file5").files[0];
        var FileController = '/e/member/company/uscardupload33.php';
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

    //普通认证-店铺照片
    function UpladFile6()
    {
        var fileObj = document.getElementById("file6").files[0];
        var FileController = '/e/member/company/uscardupload44.php';
        var form = new FormData();
        form.append("pictureurl6", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange6;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange6()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview6').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }

    //三证合一-三证合一
    function UpladFile7()
    {
        var fileObj = document.getElementById("file7").files[0];
        var FileController = '/e/member/company/uscardupload.php';
        var form = new FormData();
        form.append("pictureurl7", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange7;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange7()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview7').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }

    //三证合一-身份证正面
    function UpladFile8()
    {
        var fileObj = document.getElementById("file8").files[0];
        var FileController = '/e/member/company/uscardupload2.php';
        var form = new FormData();
        form.append("pictureurl8", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange8;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange8()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview8').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }

    //三证合一-身份证背面
    function UpladFile9()
    {
        var fileObj = document.getElementById("file9").files[0];
        var FileController = '/e/member/company/uscardupload3.php';
        var form = new FormData();
        form.append("pictureurl9", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange9;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange9()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview9').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }

    //三证合一-店铺照片
    function UpladFile10()
    {
        var fileObj = document.getElementById("file10").files[0];
        var FileController = '/e/member/company/uscardupload4.php';
        var form = new FormData();
        form.append("pictureurl10", fileObj);
        createXMLHttpRequest();
        xhr.onreadystatechange = handleStateChange10;
        xhr.open("post", FileController, true);
        xhr.send(form);
    }
    function handleStateChange10()
    {
        if(xhr.readyState == 4)
        {
            if (xhr.status == 200 || xhr.status == 0)
            {
                if(xhr.responseText.indexOf('img')>0){
                document.getElementById('preview10').innerHTML=xhr.responseText;
                }else{
                    alert(xhr.responseText);
                }
            }
        }
    }