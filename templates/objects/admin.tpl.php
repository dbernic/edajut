<script>
var objects;
function initPage(){
    getData('objects', 'getObjects', null, function(data){
        objects = data;       
        fillTable();
    });
}

function fillTable(){
    $('#userstbl tbody').html('');
    $.each(objects, function(){
        var tr = $('<tr></tr>');
        var idtd = $('<td></td>').text(this['id']);
        var objtd = $('<td></td>').text(this['name']);
        var edittd = $('<td></td>').css('text-align', 'center');

        var editspan = $('<span onclick="edit('+this['id']+')"></span>').addClass('glyphicon glyphicon-pencil cursor-pointer');
        var delspan = $('<span style="margin-left: 16px;" onclick="del('+this['id']+')"></span>').addClass('glyphicon glyphicon-trash cursor-pointer');
        edittd.append(editspan,delspan);
        tr.append(idtd,objtd,edittd);
        $('#userstbl tbody').append(tr);
    });
}

function edit(id = null){
    clearEdit();
    if (id !== null){        

        $.each(objects, function(){
            if(id===this['id']){
                $('#idinp').val(this['id']);
                $('#nameinp').val(this['name']);
            }
        });
    }
    showEdit();
}

function clearEdit(){
    $('#idinp').val('');
    $('#nameinp').val('');
}

function save(){
    var id = $('#idinp').val();
    var name = $('#nameinp').val();
    
    var data = {
        id:id,
        name:name,
    };
    
    getData('objects', 'saveObject', {data:data}, function(data){
        objects = data;       
        fillTable();        
    });
    
    showTable();
}

function del(id){
    yesNo('Delete object?', function(){
        getData('objects', 'deleteObject', {'id':id}, function(data){
            objects = data;       
            fillTable();
        });
    });
}
</script>

<div class="row">
    <?php include __DIR__.'/../common/adminmenu.tpl.php';?>
    <div class="col-md-8">
        <div id="table">
            <button class="btn btn-success" style="float:right;margin-bottom: 16px;" onclick="edit()">Add new</button>
            <h3>Objects</h3>
            <table class="table table-bordered" id="userstbl">
                <thead>
                <tr>
                    <th>Id</th>
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
                <div class="col-md-6 h5"><strong>Name</strong></div>
                <div class="col-md-6">
                    <input class="form-control" id="nameinp" />
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