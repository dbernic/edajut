<script>
var users;
function initPage(){
    getData('users', 'getUsers', null, function(data){
        users = data;       
        fillTable();
    });
    fillTypes();
}

<script/>