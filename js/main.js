$('document').ready(initPage());

function login(){
    var login = $('#logininput').val();
    var password = $('#passinput').val();
    
    $.post(
        'index.php?type=api&module=login&action=login', 
        {login:login,password:password},
        function(data){
            if (data.error === 0){
                if (typeof loginFunc !== 'undefined' && loginFunc !== 'null' ){
                    loginFunc();
                } else {
                    initPage();
                }
                $('#username').text(data.payload);
            } else {
                // TODO show data.errorTxt
            }
        },
        'json'
    );
}

function getData(module, action, data=null, func=null){
        
    $.post(
        'index.php?type=api&module='+module+'&action='+action, 
        data,
        function(data){
            if (data.error === 0){
                if (func !== null){
                    func(data.payload);
                }
                showMain();
            } else if (data.error === 1){
                showLogin();
            } else {
                // Show error
            }
        },
        'json'
    );
}

function logout(){
    getData('login', 'logout', null, function(){
        document.location = '/index.php';
    });
}

function showContent(action){
    var url = "index.php?module="+action;
    window.location.href = url;
}


function showMain(){
    $('#login').hide();
    $('#main').show();
}

function showLogin(){
    $('#main').hide();
    $('#login').show();
}

/* Most usefull common functions */
function showTable(){
    $('#edit').hide();
    $('#table').show();
}

function showEdit(){
    $('#table').hide();
    $('#edit').show();
}