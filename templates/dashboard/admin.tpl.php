<script>
function initPage(){
    getData('dashboard', 'getPassages', null, function(data){
        $('#passages tbody').html('');
        $.each(data, function(){
            var tr = $('<tr></tr>');
            var eventtd = $('<td></td>').text(this['action']);
            var timetd = $('<td></td>').text(this['datetime']);
            var idtd = $('<td></td>').text(this['id']);
            var nametd = $('<td></td>').text(this['name']);
            var phonetd = $('<td></td>').text(this['phone']);
            var statustd = $('<td></td>').text(this['status']);

            
            tr.append(eventtd,timetd,idtd,nametd,phonetd,statustd);
            $('#passages tbody').append(tr);
        });
    });
}
</script>
<div class="row">
    <?php include __DIR__.'/../common/adminmenu.tpl.php';?>
    <div class="col-md-8">
        <h3>Dashboard</h3>
        <table class="table table-bordered" id="passages">
            <thead>
            <tr>
                <th>Event</th>
                <th>Time</th>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="col-md-2">&nbsp;</div>
</div>
