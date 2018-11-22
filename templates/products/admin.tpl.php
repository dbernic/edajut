<script>
var users;
function initPage(){
    getData('products', 'getObjects', null, function(data){
        fillObjects(data);
    });
}

function fillObjects(data){
    
}

function getProducts(){
    
    var data = {};
    data.class = $('#class').val();
    data.object = $('#object').val();
    
    getData('products', 'getProducts', {data:data}, function(data){
        fillProducts(data);
    });
}

function fillProducts(data){
    
}

</script>

<div>
    <?php include __DIR__.'/../common/adminmenu.tpl.php';?>
    <div class="col-md-8">
        <div id="table">
            <div>
                <div class="form-group col-md-3">
                    <label for="class">Class:</label>
                    <input type="text" class="form-control" id="class">
                </div>
                <div class="form-group col-md-3">
                    <label for="object">Object:</label>
                    <select class="form-control" id="object">
                        
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="searchbtn">&nbsp;</label>
                    <button class="btn btn-primary form-control" style="vertical-align: bottom" id="searchbtn">Search</button>
                </div>
            </div>            
        </div>
        <div id="edit" style="display: none;">

        </div>
    </div>
    
    <div class="col-md-2">&nbsp;</div>