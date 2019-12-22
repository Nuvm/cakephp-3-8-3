Vue.component('trcomponent', {
    props: ['trcomponentprop'],
    template: '<tr>' +
        '<td> {{trcomponentprop.id}} </td>' +
        '<td> {{trcomponentprop.name}} </td>' +
        '<td>' +
        '<trbuttonscomponent v-bind:trbuttonscomponentprop="trcomponentprop" v-bind:key="trcomponentprop.id">' +
        '</trbuttonscomponent>' +
        '</td>' +
        '</tr>'
});

Vue.component('trbuttonscomponent', {
    props:['trbuttonscomponentprop'],
    template: '<span><a href="javascript:void(0);" class="glyphicon glyphicon-edit" :name="trbuttonscomponentprop.id" @click="clickAction"></a>' +
        '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" :name="trbuttonscomponentprop.id" @click="clickAction"></a></span>',
    methods: {
        clickAction: function (event) {
            var type = event.target.classList[1];
            var id = event.target.name;
            if (type === 'glyphicon-edit') {
                vm.editcollector(id);
            } else if (type === 'glyphicon-trash') {
                vm.deletecollector(id);
            }
        }
    }
});

Vue.component('tablecomponent', {
    props:['tablecomponentprop'],
    template:'<table class="table table-striped">' +
        '<thead>' +
        '<tr>' +
        '<th>Id</th>' +
        '<th>Name</th>' +
        '<th>Action</th>' +
        '</tr></thead>' +
        '<tbody id="collectorData">' +
        '<trcomponent v-for="item in tablecomponentprop" v-bind:trcomponentprop="item" v-bind:key="item.id">' +
        '</trcomponent>' +
        '</tbody>' +
        '</table>'
});
/*
Vue.component('loginformcomponent', {
    props: ['loginformcomponentprop'],
    template:'<div>' +
        '<h4>Login</h4>' +
        '</div>'
});

Vue.component('loginbtncomponent', {
    props: ['loginbtncomponentprop'],
    template: '<button id="login-btn" style="top:45px; right:24px;">Login</button>'
});
*/
var vm = new Vue({
    el:'#vuecollector',
    data:{
        vcollectors: [],
        vlogin: []
    },
    methods: {
        getcollectors: function () {
            $.ajax({
                type: 'GET',
                url: urlToRestApi,
                dataType: "json",
                success:
                    function (collectors) {
                        vm.emptydata(vm.vcollectors);
                        collectors.collectors.forEach(function (item, index) {
                            Vue.set(vm.vcollectors, index, item);
                        });
                    }
            });
        },
        emptydata: function (dataObj) {
            if (dataObj instanceof Array) {
                dataObj.forEach(function (item,index) {
                    Vue.delete(item,index);
                });
            }
        },
        deletecollector: function (id) {
            if (confirm('Are you sure to delete data?') )
                vm.collectorAction('delete', id);
        },
        editcollector: function (id) {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: urlToRestApi + "/" + id,
                contentType: "application/json; charset=utf-8",
                success: function (data) {
                    $('#idEdit').val(data.collector.id);
                    $('#nameEdit').val(data.collector.name);
                    $('#editForm').slideDown();
                }
            });
        },
        collectorAction: function (type, id) {
            id = (typeof id == "undefined") ? '' : id;
            var statusArr = {add: "added", edit: "updated", delete: "deleted"};
            var requestType = '';
            var collectorData = '';
            var ajaxUrl = urlToRestApi;
            if (type === 'add') {
                requestType = 'POST';
                collectorData = convertFormToJSON($("#addForm").find('.form'));
            } else if (type === 'edit') {
                id = $('#idEdit').val();
                requestType = 'PUT';
                collectorData = convertFormToJSON($("#editForm").find('.form'));
                ajaxUrl = ajaxUrl + "/" + id;
            } else {
                requestType = 'DELETE';
                ajaxUrl = ajaxUrl + "/" + id;
            }
            $.ajax({
                type: requestType,
                url: ajaxUrl,
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(collectorData),
                success: function (msg) {
                    if (msg.message !== "Error") {
                        alert('Collector data has been ' + statusArr[type] + ' successfully.');
                        $('.form')[0].reset();
                        $('.formData').slideUp();
                        vm.getcollectors();
                    } else {
                        alert('Some problem occurred, please try again.');
                    }
                }
            });
        },
        /*login: function () {
            //alert(grecaptcha.getResponse(widgetId1));
            //if (grecaptcha.getResponse(widgetId1) == '') {
                //vm.vlogin.captcha_status = 'Please verify captcha.';
                //return;
            //}
            var req = {
                method: 'POST',
                url: 'api/users/token',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                data: {email: vm.vlogin.email, password: vm.vlogin.password}
            };
            // fields in key-value pairs
            $http(req)
                .success(function (jsonData, status, headers, config) {
                    // console.log(jsonData.data.token);
                    // tell the user was logged
                    alert('User sucessfully logged in');
                    localStorage.setItem('token', jsonData.data.token);
                    localStorage.setItem('user_id', jsonData.data.id);
                    // Switch button for Logout
                    $('#login-btn').hide();
                    $('#logout-btn').show();
                })
                .error(function (data, status, headers, config) {
                    //console.log(data.response.result);
                    // tell the user was not logged
                    alert(data.message);
                });
            // close modal
            $('#modal-login-form').modal('close');
        },
        // Login Process
        logout: function () {
            localStorage.setItem('token', "no token");
            $('#logout-btn').hide();
            $('#login-btn').show();
            vm.vlogin.captcha_status = '';
            // show modal
            $('#modal-logout-form').modal('close');
        },
        changePassword: function () {
            var req = {
                method: 'PUT',
                url: 'api/users/' + localStorage.getItem("user_id"),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                },
                data: {'password': vm.vlogin.newPassword}
            };
            $http(req)
                .success(function (response) {
                    // tell the user subcategory record was updated
                    alert('Password successfully changed');
                    // close modal
                    $('#modal-logout-form').modal('close');
                })
                .error(function (response) {
                    // tell the user subcategory record was not updated
                    //console.log(response);
                    alert('Could not update Password');

                });
        }*/
    },
    mounted: function () {
        this.$nextTick(this.getcollectors);
    }
});
/*
function getCollectors() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
            function (collectors) {
                var collectorTable = $('#collectorData');
                collectorTable.empty();
                var count = 1;
                collectors.collectors.forEach(function (collectorObject)
                {
                    var editDeleteButtons = '</td><td>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCollector(' + collectorObject.id + ')"></a>' +
                        '<a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\') ? collectorAction(\'delete\', ' + collectorObject.id + ') : false;"></a>' +
                        '</td></tr>';
                    collectorTable.append('<tr><td>' + collectorObject.id + '</td><td>' + collectorObject.name + editDeleteButtons);
                    count++;
                });

            }
    });
}
*/
/* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}

/*
 $('#collectorAddForm').submit(function (e) {
 e.preventDefault();
 var data = convertFormToJSON($(this));
 alert(data);
 console.log(data);
 });
 */

/*function collectorAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var collectorData = '';
    var ajaxUrl = urlToRestApi;
    if (type == 'add') {
        requestType = 'POST';
        collectorData = convertFormToJSON($("#addForm").find('.form'));
    } else if (type == 'edit') {
        id = $('#idEdit').val();
        requestType = 'PUT';
        collectorData = convertFormToJSON($("#editForm").find('.form'));
        ajaxUrl = ajaxUrl + "/" + id;
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(collectorData),
        success: function (msg) {
            if (msg.message !== "Error") {
                console.log(msg);
                alert('Collector data has been ' + statusArr[type] + ' successfully.');
                $('.form')[0].reset();
                $('.formData').slideUp();
                vm.getcollectors();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}*/
