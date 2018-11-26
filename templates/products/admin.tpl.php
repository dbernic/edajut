<script>
var users;
function initPage(){
    getData('objects', 'getObjects', null, function(data){
        fillObjects(data);
    });
}

function fillObjects(data){
    $.each(data, function(){
        var option = $('<option value="'+this.id+'">'+this.name+'</option>');
        $('#object-sel').append(option);
    });
}

function getProducts(){
    
    var data = {};
    data.class = $('#class-sel').val();
    data.object = $('#object-sel').val();
    
    getData('products', 'getProducts', {data:data}, function(data){
        fillProducts(data);
    });
}

function fillProducts(data){
    $('.content-tr').remove();
    $.each(data, function(){
        var tr = $('<tr></tr>').addClass('content-tr');
        var nametd = $('<td>'+this.name+'</td>');
        var actiontd = $('<td></td>');
        var editspan = $('<span onclick="edit('+this['id']+')"></span>').addClass('glyphicon glyphicon-pencil cursor-pointer');
        actiontd.append(editspan);
        
        tr.append(nametd, actiontd);
        $('#prod-table').append(tr);
    });
}

</script>

<div>
    <?php include __DIR__.'/../common/adminmenu.tpl.php';?>
    <div class="col-md-8">
        <div id="table">
            <div>
                <div class="form-group col-md-3">
                    <label for="class">Class:</label>
                    <select class="form-control" id="class-sel">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="object">Object:</label>
                    <select class="form-control" id="object-sel">
                        
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="searchbtn">&nbsp;</label>
                    <button class="btn btn-primary form-control" style="vertical-align: bottom" id="searchbtn" onclick="getProducts()">Search</button>
                </div>
            </div>
            <div>
                <table class="table table-bordered" id="prod-table">
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
        <div id="edit" style="display: none;">

        </div>
    </div>
    
    <div class="col-md-2">&nbsp;</div>