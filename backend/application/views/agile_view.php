<div id="agile_app" class="pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="display: inline-block;" class="card-title"><?= $template['title'] ?> Table</h3>
                        <button style="display: inline-block; float: right;" type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#addEquipmentTypeModal"><i class="fa fa-plus"></i> Add Equipment Type</button>
                    </div>
                    <div class="card-body">
                        <v-server-table :columns="mainTable.columns" :options="mainTable.options" id="v-ref-code-table"  ref="main_table">  
                            <template slot="action" slot-scope="props">
                                <button type="button" class="btn btn-warning btn-sm" @click="updateEquipmentType(props.row)" data-toggle="modal" data-target="#updateEquipmentTypeModal"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" @click="deleteEquipmentType(props.row)" data-toggle="modal" data-target="#deleteEquipmentTypeModal"><i class="fa fa-trash"></i></button>
                            </template>
                        </v-server-table>
                    </div>
                    <div class="card-footer clearfix">
                    </div>
                </div>
            </div>
        </div>    
    </div>


    <div class="modal" id="addEquipmentTypeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form v-on:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Equipment Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Description</label>
                                <input class="form-control" v-model="form.equipment_type_description" required></input>
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="updateEquipmentTypeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form v-on:submit.prevent="update_equipment_type_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Equipment Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                        
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Description</label>
                                <input class="form-control" v-model="update_data.equipment_type_description" required></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="deleteEquipmentTypeModal" tabindex="-1" role="dialog">
        <form v-on:submit.prevent="delete_equipment_type_form">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Equipment Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="delete_data.equipment_type_id" hidden>
                        Are you sure you want to delete this Equipment Type?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Confirm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>