<script>
var users;
function initPage(){
    getData('users', 'getUsers', null, function(data){
        users = data;       
        fillTable();
    });
    fillTypes();
}

function fillTable(){
    $('#userstbl tbody').html('');
    $.each(users, function(){
        var tr = $('<tr></tr>');
        var idtd = $('<td></td>').text(this['id']);
        var logintd = $('<td></td>').text(this['login']);
        var nametd = $('<td></td>').text(this['name']+' '+this['surname']);
        var edittd = $('<td></td>').css('text-align', 'center');

        var editspan = $('<span onclick="edit('+this['id']+')"></span>').addClass('glyphicon glyphicon-pencil cursor-pointer');
        edittd.append(editspan);
        tr.append(idtd,logintd,nametd,edittd);
        $('#userstbl tbody').append(tr);
    });
}

function fillTypes(){
    getData('users', 'getTypes', null, function(data){
        $.each(data, function(){
            $('#typesel').append(
                $('<option value='+this+'>'+this+'</>')
            );
        });
    });
}

function edit(id = null){
    clearEdit();
    if (id !== null){        

        $.each(users, function(){
            if(id===this['id']){
                $('#idinp').val(this['id']);
                $('#logininp').val(this['login']);
                $('#nameinp').val(this['name']);
                $('#surnameinp').val(this['surname']);                
                $('#phoneinp').val(this['phone']);
                $('#typesel').val(this['group']);
            }
        });
    }
    showEdit();
}

function clearEdit(){
    $('#idinp').val('');
    $('#logininp').val('');
    $('#passinp').val('');
    $('#nameinp').val('');
    $('#surnameinp').val('');
    $('#phoneinp').val('');
    $('#typesel').val(1);
}

function save(){
    var id = $('#idinp').val();
    var login = $('#logininp').val();
    var name = $('#nameinp').val();
    var surname = $('#surnameinp').val();    
    var password= $('#passinp').val();
    var phone = $('#phoneinp').val();
    var group = $('#typesel').val();
    
    var data = {
        id:id,
        login:login,
        name:name,
        surname:surname,
        password:password,
        phone:phone,
        group:group
    };
    
    getData('users', 'saveUser', {data:data}, function(data){
        users = data;       
        fillTable();        
    });
    
    showTable();
}
</script>

<div>
    <?php include __DIR__.'/../common/adminmenu.tpl.php';?>
    <div class="col-md-8">
        <div id="table">
            <button class="btn btn-success" style="float:right;margin-bottom: 16px;" onclick="edit()">Add new</button>
            <h3>Users</h3>
            <table class="table table-bordered" id="userstbl">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div id="edit" style="display: none;">
            <input type="hidden" id="idinp" />
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Login</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="logininp" />
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Password</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="passinp" />
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Name</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="nameinp" />
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Surname</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="surnameinp" />
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Phone</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="phoneinp" />
                </div>
            </div>
            <div class="row topspace">
                <div class="col-md-6 h5"><strong>Type</strong></div>
                <div class="col-md-6">
                    <select class="form-control" id="typesel"></select>
                </div>
            </div>
            <br/>
            <div style="float:right;margin-bottom: 16px;" >
                <button class="btn" onclick="showTable()">Cancel</button>
                &nbsp;
                <button class="btn btn-success" onclick="save()">Save</button>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-2">&nbsp;</div>
</div>