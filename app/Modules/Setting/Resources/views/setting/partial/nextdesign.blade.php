{{--<style>--}}
{{--    .ps-nav i {--}}
{{--        font-size: 24px;--}}
{{--    }--}}

{{--    .ps-nav span {--}}
{{--        font-size: 14px;--}}
{{--    }--}}
{{--    .ps-nav-tabs {--}}
{{--        position: relative;--}}
{{--        border-bottom: 1px solid #eee;--}}
{{--    }--}}

{{--    .ps-nav-tabs li.nav-item a.nav-link.active {--}}
{{--        border-radius: 0;--}}
{{--    }--}}

{{--    .ps-nav-tabs li.nav-item a.nav-link.active:after {--}}
{{--        content: '';--}}
{{--        position: absolute;--}}
{{--        right: -27px;--}}
{{--        top: 0;--}}
{{--        width: 0;--}}
{{--        height: 0;--}}
{{--        border-style: solid;--}}
{{--        border-width: 43.5px 0 43.5px 27px;--}}
{{--        border-color: transparent transparent transparent #2196f3;--}}
{{--    }--}}

{{--    .ps-nav-tabs li.nav-item a.nav-link:after {--}}
{{--        content: url("../../images/bg-angle-right.png");--}}
{{--        position: absolute;--}}
{{--        right: -27px;--}}
{{--        top: 0;--}}
{{--        z-index: 1;--}}
{{--    }--}}
{{--    --}}
{{--</style>--}}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card bd-card">
                    <ul class="nav nav-pills ps-nav-tabs">
                        <li class="nav-item">
                            <a href="#top-icon-tab1" class="nav-link active show" data-toggle="tab">
                                <div class="ps-nav">
                                    <i class="icon-users4 d-block mb-1 mt-1"></i>
                                    <span>Employee</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#top-icon-tab2" class="nav-link" data-toggle="tab">
                                <div class="ps-nav">
                                    <i class="icon-hammer-wrench d-block mb-1 mt-1"></i>
                                    <span>Equipments</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#top-icon-tab3" class="nav-link" data-toggle="tab">
                                <div class="ps-nav">
                                    <i class="icon-bus d-block mb-1 mt-1"></i>
                                    <span>Vehicles</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#top-icon-tab4" class="nav-link" data-toggle="tab">
                                <div class="ps-nav">
                                    <i class="icon-hammer-wrench d-block mb-1 mt-1"></i>
                                    <span>Raw Materials</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pl-4 pr-4 pb-4">
                        <div class="tab-pane fade active show" id="top-icon-tab1">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-4">
                                    <div class="ps-employee">
                                        <h5>Assigned Employee:</h5>
                                        <div class="form-group">
                                            <label class="pb-1">Employee Name:</label>
                                            <input list="project-assigned-employees" name="assign_new_employee" placeholder="Choose Employee" class="form-control">
                                            <datalist id="project-assigned-employees">
                                                <option>1-Test Test</option>
                                                <option>02-Test Data</option>
                                                <option>20-Prakash Jha</option>
                                                <option>1-Tender Bid Management</option>
                                                <option>2-Operation Officer</option>
                                                <option>3-Finance Procurement Officer</option>
                                                <option>4-Inventory Officer</option>
                                                <option>5-Project Manager</option>
                                                <option>6-Site Incharge</option>
                                                <option>7-Admin Top Level user</option>
                                                <option>33-Test Data</option>
                                                <option>123-sagar kc</option>
                                                <option>22-gnc gnc</option>
                                                <option>44-Innovative Engineering Pvt.Ltd.</option>
                                            </datalist>
                                            <button type="button" class="btn bg-blue mt-3" id="assign-employee-to-project" link="http://devconstruction.bidheegroup.com/admin/projectdashboard/AssignEmployee/store/11" data-project="11">
                                                <i class="icon-plus2"></i> Add Employee
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-7 offset-xl-1">
                                    <div class="ps-employee">
                                        <h5>Employee Listing:</h5>
                                        <div class="card mb-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped-blue">
                                                    <thead>
                                                    <tr class="bg-blue">
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th>Phn Number</th>
                                                        <th>Mobile No.</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="assigned-employee-table-body">
                                                    <tr>
                                                        <td>20</td>
                                                        <td>Prakash Jha</td>
                                                        <td>Godawari -14,Lalitpur</td>
                                                        <td>5574152</td>
                                                        <td>9801023231</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Site Incharge</td>
                                                        <td>mid baneshwor</td>
                                                        <td></td>
                                                        <td>9874563210</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Test Test</td>
                                                        <td>new baneshwor</td>
                                                        <td>4141111</td>
                                                        <td>98888888</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Admin Top Level user</td>
                                                        <td>kalanki</td>
                                                        <td></td>
                                                        <td>9851123000</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        <div class="tab-pane fade" id="top-icon-tab2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ps-employee">
                                        <h5>Assigned Equipments:</h5>
                                        <div class="form-group m-0">
                                            <label class="pb-1">Equipment Name:</label>
                                            <input list="project-assigned-equipments" name="assign_new_equipment" placeholder="Choose Equipment" class="form-control">
                                            <datalist id="project-assigned-equipments">
                                                <option data-id="1">equipment type1::White Cement</option>
                                                <option data-id="2">equipment type1::Marbles</option>
                                                <option data-id="3">equipment type1::stones 1</option>
                                                <option data-id="4">equipment type1::Marbles 2</option>
                                            </datalist>
                                            <button type="button" class="btn bg-blue mt-3" id="assign-equipment-to-project" link="http://devconstruction.bidheegroup.com/admin/projectdashboard/AssignEquipment/store/11" data-project="11">
                                                <i class="icon-plus2"></i> Add Equipment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1">
                                    <div class="ps-employee">
                                        <h5>Equipment Listing:</h5>
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped-blue">
                                                    <thead>
                                                    <tr class="bg-blue">
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Registration No.</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="assigned-equipment-table-body">
                                                    <tr>
                                                        <td>White Cement</td>
                                                        <td>equipment type1</td>
                                                        <td></td>
                                                        <td>1200000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marbles</td>
                                                        <td>equipment type1</td>
                                                        <td></td>
                                                        <td>1200000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>stones 1</td>
                                                        <td>equipment type1</td>
                                                        <td></td>
                                                        <td>125000</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        <div class="tab-pane fade" id="top-icon-tab4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ps-employee">
                                        <h5>Raw Material:</h5>
                                        <form method="POST" action="http://devconstruction.bidheegroup.com/admin/ProjectDashboard/projectboq/rawmaterial" accept-charset="UTF-8" id="rawmaterial_submit" class="form-horizontal" role="form" novalidate="novalidate"><input name="_token" type="hidden" value="XUNzF9Hykf9LdgmjsvTGscESuVcAJgSAoRTuYP5v">

                                            <script src="http://devconstruction.bidheegroup.com/admin/validation/rawmaterial.js"></script>
                                            <fieldset class="mb-3">
                                                <input name="project_id" type="hidden" value="11">
                                                <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-3">Project Boq:<span class="text-danger">*</span></label>
                                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                        <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-pencil5"></i></span>
                    </span>
                                                            <select name="project_boq_id" class="form-control">
                                                                <optgroup label="BOQ Description">
                                                                    <option value="">--Select BOQ Description--</option>
                                                                    <option value="527" rate="" unit="">
                                                                        1 :: Earthwork
                                                                    </option>
                                                                    <option value="528" rate="750" unit="Cum">
                                                                        1.1 :: Earthwork in excavation
                                                                    </option>
                                                                    <option value="529" rate="650" unit="Cum">
                                                                        1.2 :: Earth Back Filling
                                                                    </option>
                                                                    <option value="530" rate="" unit="">
                                                                        2 :: Concrete Works
                                                                    </option>
                                                                    <option value="531" rate="" unit="">
                                                                        2.1 :: PCC
                                                                    </option>
                                                                    <option value="532" rate="16500" unit="Cum">
                                                                        2.1.1 :: PCC 1:3:6 works
                                                                    </option>
                                                                    <option value="533" rate="18500" unit="Cum">
                                                                        2.1.2 :: PCC 1:2:4 works
                                                                    </option>
                                                                    <option value="534" rate="" unit="">
                                                                        2.2 :: Pcc For RCC works
                                                                    </option>
                                                                    <option value="535" rate="19500" unit="Cum">
                                                                        :: M20 1:1;4:3
                                                                    </option>
                                                                    <option value="536" rate="125" unit="Kg">
                                                                        2.3 :: Steel Renforcement
                                                                    </option>
                                                                    <option value="537" rate="850" unit="Sqm">
                                                                        2.4 :: Formwork
                                                                    </option>
                                                                    <option value="538" rate="" unit="">
                                                                        3 :: Brick Masonry Work
                                                                    </option>
                                                                    <option value="539" rate="19500" unit="Cum">
                                                                        3.1 :: 1:6 Brick Masonry works
                                                                    </option>
                                                                    <option value="540" rate="12000" unit="Spm">
                                                                        4 :: Door and windows Works
                                                                    </option>
                                                                    <option value="541" rate="" unit="">
                                                                        5 :: Flooring works
                                                                    </option>
                                                                    <option value="542" rate="1200" unit="Spm">
                                                                        5.1 :: Cement Concret Floor  40mm IPS 1:2:3
                                                                    </option>
                                                                    <option value="543" rate="" unit="">
                                                                        6 :: Plastering/Wall Finishing Works
                                                                    </option>
                                                                    <option value="544" rate="" unit="">
                                                                        6.1 :: Cement Plaster Work
                                                                    </option>
                                                                    <option value="545" rate="750" unit="Spm">
                                                                        6.1.1 :: 12.5mm on celling 1:4
                                                                    </option>
                                                                    <option value="546" rate="750" unit="Spm">
                                                                        6.1.2 :: 12.5mm on cwalls 1:4
                                                                    </option>
                                                                    <option value="547" rate="" unit="">
                                                                        7 :: Painting Works
                                                                    </option>
                                                                    <option value="548" rate="250" unit="Spm">
                                                                        7.1 :: Plastic Emulsion Paint
                                                                    </option>
                                                                    <option value="549" rate="280" unit="Spm">
                                                                        7.2 :: Exterior Weather coat Paint
                                                                    </option>
                                                                    <option value="550" rate="350" unit="Spm">
                                                                        7.3 :: Enamel Paint
                                                                    </option>
                                                                    <option value="551" rate="" unit="">
                                                                        8 :: Miscellaneous works
                                                                    </option>
                                                                    <option value="552" rate="165" unit="Kg">
                                                                        8.1 :: Railing Works
                                                                    </option>
                                                                    <option value="553" rate="15000" unit="Cum">
                                                                        1 :: Dry brick flat soiling
                                                                    </option>
                                                                    <option value="554" rate="8000" unit="Cum">
                                                                        2.1.1 :: Collapsible gate
                                                                    </option>
                                                                    <option value="555" rate="" unit="">
                                                                        3 :: Apron and Drain
                                                                    </option>
                                                                    <option value="556" rate="750" unit="Cum">
                                                                        3.1 :: Exacvation
                                                                    </option>
                                                                    <option value="557" rate="8500" unit="Cum">
                                                                        3.2 :: Dry Rubber stone Soiling
                                                                    </option>
                                                                    <option value="558" rate="18500" unit="Cum">
                                                                        3.3 :: PPC 1:2:4
                                                                    </option>
                                                                    <option value="559" rate="19500" unit="Cum">
                                                                        3.4 :: 1:6 brickwork
                                                                    </option>
                                                                    <option value="560" rate="1200" unit="Spm">
                                                                        6.5 :: 40mm IPS floor finish 1:2:4
                                                                    </option>
                                                                    <option value="561" rate="12500" unit="Cum">
                                                                        1 :: 1:6 Brick Masonry works
                                                                    </option>
                                                                    <option value="562" rate="165" unit="Kg">
                                                                        2 :: Railing Works
                                                                    </option>
                                                                    <option value="563" rate="2800" unit="Spm">
                                                                        :: Hire Excavoter
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-3">Material Name:<span class="text-danger">*</span></label>
                                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                        <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                                                            <input placeholder="Enter Material Name" class="form-control" name="material_name" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-3">Unit:</label>
                                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                        <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-plus2"></i></span>
                </span>
                                                            <input placeholder="Enter Unit" class="form-control" name="unit" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-3">Rate:</label>
                                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                        <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-coin-dollar"></i></span>
                </span>
                                                            <input placeholder="Enter Rate" class="form-control numeric" name="rate" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>


                                            <div class="text-right">
                                                <button type="submit" class="btn bg-teal-400">Save <i class="icon-database-insert"></i></button>
                                            </div>

                                            <script type="text/javascript">
                                                $(document).ready( function () {
                                                    $('select[name=project_boq_id]').change( function () {
                                                        var rate = $('option:selected', this).attr('rate');
                                                        var unit = $('option:selected', this).attr('unit');
                                                        $('input[name=unit]').val(unit);
                                                        $('input[name=rate]').val(rate);
                                                    });
                                                });
                                            </script>



                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1">
                                    <div class="ps-employee">
                                        <h5>
                                            <form method="GET" action="http://devconstruction.bidheegroup.com/admin/ProjectDashboard/projectboq/rawmaterial" accept-charset="UTF-8" id="search-raw-material-by-projectboq">
                                                <div class="form-group row">
                                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                        <div class="input-group">
                                                            <select name="project_boq_id" class="form-control" id="raw-material-select-search">
                                                                <optgroup label="BOQ Description">
                                                                    <option value="">--Select BOQ Description--</option>
                                                                    <option value="527">1 :: Earthwork</option>
                                                                    <option value="528">1.1 :: Earthwork in excavation</option>
                                                                    <option value="529">1.2 :: Earth Back Filling</option>
                                                                    <option value="530">2 :: Concrete Works</option>
                                                                    <option value="531">2.1 :: PCC</option>
                                                                    <option value="532">2.1.1 :: PCC 1:3:6 works</option>
                                                                    <option value="533">2.1.2 :: PCC 1:2:4 works</option>
                                                                    <option value="534">2.2 :: Pcc For RCC works</option>
                                                                    <option value="535"> :: M20 1:1;4:3</option>
                                                                    <option value="536">2.3 :: Steel Renforcement</option>
                                                                    <option value="537">2.4 :: Formwork</option>
                                                                    <option value="538">3 :: Brick Masonry Work</option>
                                                                    <option value="539">3.1 :: 1:6 Brick Masonry works</option>
                                                                    <option value="540">4 :: Door and windows Works</option>
                                                                    <option value="541">5 :: Flooring works</option>
                                                                    <option value="542">5.1 :: Cement Concret Floor  40mm IPS 1:2:3</option>
                                                                    <option value="543">6 :: Plastering/Wall Finishing Works</option>
                                                                    <option value="544">6.1 :: Cement Plaster Work</option>
                                                                    <option value="545">6.1.1 :: 12.5mm on celling 1:4</option>
                                                                    <option value="546">6.1.2 :: 12.5mm on cwalls 1:4</option>
                                                                    <option value="547">7 :: Painting Works</option>
                                                                    <option value="548">7.1 :: Plastic Emulsion Paint</option>
                                                                    <option value="549">7.2 :: Exterior Weather coat Paint</option>
                                                                    <option value="550">7.3 :: Enamel Paint</option>
                                                                    <option value="551">8 :: Miscellaneous works</option>
                                                                    <option value="552">8.1 :: Railing Works</option>
                                                                    <option value="553">1 :: Dry brick flat soiling</option>
                                                                    <option value="554">2.1.1 :: Collapsible gate</option>
                                                                    <option value="555">3 :: Apron and Drain</option>
                                                                    <option value="556">3.1 :: Exacvation</option>
                                                                    <option value="557">3.2 :: Dry Rubber stone Soiling</option>
                                                                    <option value="558">3.3 :: PPC 1:2:4</option>
                                                                    <option value="559">3.4 :: 1:6 brickwork</option>
                                                                    <option value="560">6.5 :: 40mm IPS floor finish 1:2:4</option>
                                                                    <option value="561">1 :: 1:6 Brick Masonry works</option>
                                                                    <option value="562">2 :: Railing Works</option>
                                                                    <option value="563"> :: Hire Excavoter</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input name="bid_id" type="hidden" value="11">
                                                </div>
                                            </form>
                                            Raw Material Listing:
                                        </h5>
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped-blue">
                                                    <thead>
                                                    <tr class="bg-blue">
                                                        <th>SN</th>
                                                        <th>Name</th>
                                                        <th>Unit</th>
                                                        <th>Rate</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="assigned-raw-material-table-body">
                                                    <tr>
                                                        <td colspan="4">Please Select BOQ description and Search!!!</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        <div class="tab-pane fade" id="top-icon-tab3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ps-employee">
                                        <h5>Assigned vehicles:</h5>
                                        <div class="form-group m-0">
                                            <label class="pb-1">Vehicle Name:</label>
                                            <input list="project-assigned-vehicles" name="assign_new_vehicle" placeholder="Choose Vehicle" class="form-control">
                                            <datalist id="project-assigned-vehicles">
                                                <option data-id="1">vehicle type 1::Trucks</option>
                                                <option data-id="2">vehicle type 1::Biig trucks</option>
                                                <option data-id="3">vehicle type 1::Mini truck</option>
                                            </datalist>
                                            <button type="button" class="btn bg-blue mt-3" id="assign-vehicle-to-project" link="http://devconstruction.bidheegroup.com/admin/projectdashboard/assignVehicle/store/11" data-project="11">
                                                <i class="icon-plus2"></i> Add Vehicle
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 offset-md-1">
                                    <div class="ps-employee">
                                        <h5>Vehicle Listing:</h5>
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped-blue">
                                                    <thead>
                                                    <tr class="bg-blue">
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Registration No.</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="assigned-vehicle-table-body">
                                                    <tr>
                                                        <td>Trucks</td>
                                                        <td>vehicle type 1</td>
                                                        <td>1aaa</td>
                                                        <td>12000000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mini truck</td>
                                                        <td>vehicle type 1</td>
                                                        <td>122200</td>
                                                        <td>150000</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
