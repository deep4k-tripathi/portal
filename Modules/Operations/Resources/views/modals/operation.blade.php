@section('popup', 'Add new centre')

<div class="float-right">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCentreModal">
        <a><i class="fa fa-plus"></i> &nbsp; @yield('popup')</a>
    </button>
</div>

<div id="add_centre_details_form">
    <div class="modal fade" id="addCentreModal" tabindex="-1" role="dialog" aria-labelledby="addCentreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg mx-auto" role="document">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Add new centre</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="centerName" class="field-required">Centre Name</label>
                                <input type="text" class="form-control" name="center_name" id="centerName" placeholder="Center Name" required="required" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="centreHead" class="field-required">Centre Head</label>
                                <select v-model="location" name="centre_head" id="centreHead" class="form-control" required>
                                    <option value="">Select centre head</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="capacity" class="field-required">Capacity</label>
                                <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Enter Capacity" required="required" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="currentPeopleCount" class="field-required">Current People Count</label>
                                <input type="number" class="form-control" name="current_people_count" id="currentPeopleCount" placeholder="Enter current people" required="required" value="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="save-btn-action">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
