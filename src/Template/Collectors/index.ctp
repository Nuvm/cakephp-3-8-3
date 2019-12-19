<?php
$urlToRestApi = $this->Url->build('/api/collectors', true);
//echo $this->Html->script('var urlToRestApi = "' . $urlToRestApi . '";');
//echo $this->Html->script('Collectors/index');
?>
<script><?php echo 'var urlToRestApi = "' . $urlToRestApi . '";' ?></script>
<div class="container">
    <div class="row">
        <div class="panel panel-default collectors-content">
            <div class="panel-heading">Collectors <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle()">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Collector</h2>
                <form class="form" id="collectorAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="collectorAction('add')">Add Collector</a>
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
                    <a href="javascript:void(0);" class="btn btn-success" onclick="collectorAction('edit')">Update Collector</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Collector" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="collectorData">
                <?php
                $count = 0;
                foreach ($collectors as $collector): $count++;
                    ?>
                    <tr>
                        <td>#<?php echo $collector['id']; ?></td>
                        <td><?php echo $collector['name']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editCollector('<?php echo $collector['id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? collectorAction('delete', '<?php echo $collector['id']; ?>') : false;"></a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                <?php if($count==0): ?>
                    <tr><td colspan="5">No collector(s) found......</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo $this->Html->script('Collectors/index'); ?>

