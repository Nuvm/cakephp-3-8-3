<?php
$urlToRestApi = $this->Url->build('/api/collectors', true);
?>
<script><?php echo 'var urlToRestApi = "' . $urlToRestApi . '";' ?></script>
<div class="container">
    <div class="row">
        <div class="panel panel-default collectors-content" id="vuecollector">
            <div class="panel-heading">Collectors <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle()">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Collector</h2>
                <form class="form" id="collectorAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="vm.collectorAction('add')">Add Collector</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Collector" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Collector</h2>
                <form class="form" id="collectorEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="nameEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="vm.collectorAction('edit')">Update Collector</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Collector" -->
                </form>
            </div>
            <tablecomponent v-bind:tablecomponentprop="vcollectors"></tablecomponent>
        </div>
    </div>
</div>
<?php echo $this->Html->script('Collectors/index'); ?>

