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

function collectorAction(type, id) {
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
                getCollectors();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}

/*** à déboguer ... ***/
function editCollector(id) {
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
}
