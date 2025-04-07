@extends('layouts.app')

@section('title', 'Strength Testing Standards')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Strength Testing Standards
                </h2>
                <div class="text-muted mt-1">Reference standards and procedures for concrete strength testing</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.strength-testing') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Tests
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Standard Categories</div>
                    <div class="list-group list-group-transparent mb-3">
                        <a href="#sampling" class="list-group-item list-group-item-action d-flex align-items-center active">Sampling Procedures</a>
                        <a href="#specimen" class="list-group-item list-group-item-action d-flex align-items-center">Specimen Preparation</a>
                        <a href="#curing" class="list-group-item list-group-item-action d-flex align-items-center">Curing Methods</a>
                        <a href="#testing" class="list-group-item list-group-item-action d-flex align-items-center">Testing Procedures</a>
                        <a href="#calculation" class="list-group-item list-group-item-action d-flex align-items-center">Calculation Methods</a>
                        <a href="#reporting" class="list-group-item list-group-item-action d-flex align-items-center">Reporting Requirements</a>
                        <a href="#compliance" class="list-group-item list-group-item-action d-flex align-items-center">Compliance Criteria</a>
                        <a href="#equipment" class="list-group-item list-group-item-action d-flex align-items-center">Equipment Calibration</a>
                    </div>
                    <div class="subheader">Reference Standards</div>
                    <div class="list-group list-group-transparent">
                        <a href="#sni" class="list-group-item list-group-item-action d-flex align-items-center">SNI Standards</a>
                        <a href="#astm" class="list-group-item list-group-item-action d-flex align-items-center">ASTM Standards</a>
                        <a href="#iso" class="list-group-item list-group-item-action d-flex align-items-center">ISO Standards</a>
                        <a href="#internal" class="list-group-item list-group-item-action d-flex align-items-center">Internal Procedures</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card" id="sampling">
                <div class="card-header">
                    <h3 class="card-title">Sampling Procedures</h3>
                </div>
                <div class="card-body">
                    <h4>Standard Method for Sampling Fresh Concrete</h4>
                    <p>This procedure covers the methods for obtaining representative samples of fresh concrete from which tests are made to determine compliance with quality requirements of the specifications under which the concrete is furnished.</p>
                    
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-title">Reference Standards</h4>
                        <ul class="mb-0">
                            <li>SNI 1972:2008 - Method of sampling fresh concrete</li>
                            <li>ASTM C172 / C172M - Standard Practice for Sampling Freshly Mixed Concrete</li>
                        </ul>
                    </div>
                    
                    <h5>Key Requirements:</h5>
                    <ol>
                        <li>The elapsed time shall not exceed 15 minutes between obtaining the first and final portions of the composite sample.</li>
                        <li>Transport the samples to the place where fresh concrete tests are to be performed or where test specimens are to be molded.</li>
                        <li>Start tests for slump, temperature, and air content within 5 minutes after obtaining the final portion of the composite sample.</li>
                        <li>Start molding specimens for strength tests within 15 minutes after fabricating the composite sample.</li>
                        <li>Protect the sample from the sun, wind, and other sources of rapid evaporation, and from contamination.</li>
                    </ol>
                    
                    <h5>Sampling Locations:</h5>
                    <ul>
                        <li><strong>From Stationary Mixers:</strong> Sample the concrete by collecting two or more portions taken at regularly spaced intervals during discharge.</li>
                        <li><strong>From Revolving Drum Truck Mixers or Agitators:</strong> Sample the concrete by collecting two or more portions taken at regularly spaced intervals during discharge from the middle portion of the batch.</li>
                        <li><strong>From Paving Mixers:</strong> Sample the concrete after the contents of the paving mixer have been discharged.</li>
                        <li><strong>From Pump or Conveyor Placement Systems:</strong> Sample the concrete at the discharge end.</li>
                    </ul>
                </div>
            </div>
            
            <div class="card mt-3" id="specimen">
                <div class="card-header">
                    <h3 class="card-title">Specimen Preparation</h3>
                </div>
                <div class="card-body">
                    <h4>Making and Curing Concrete Test Specimens in the Field</h4>
                    <p>This procedure covers the requirements for making, curing, protecting, and transporting concrete test specimens under field conditions.</p>
                    
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-title">Reference Standards</h4>
                        <ul class="mb-0">
                            <li>SNI 2493:2011 - Method of making and curing concrete test specimens in the field</li>
                            <li>ASTM C31 / C31M - Standard Practice for Making and Curing Concrete Test Specimens in the Field</li>
                        </ul>
                    </div>
                    
                    <h5>Specimen Types and Dimensions:</h5>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>Specimen Type</th>
                                    <th>Dimensions</th>
                                    <th>Application</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cylinder</td>
                                    <td>150 mm × 300 mm</td>
                                    <td>Standard specimen for compressive strength testing</td>
                                </tr>
                                <tr>
                                    <td>Cylinder</td>
                                    <td>100 mm × 200 mm</td>
                                    <td>Alternative when specified (requires correlation)</td>
                                </tr>
                                <tr>
                                    <td>Cube</td>
                                    <td>150 mm × 150 mm × 150 mm</td>
                                    <td>Alternative method (common in some regions)</td>
                                </tr>
                                <tr>
                                    <td>Beam</td>
                                    <td>150 mm × 150 mm × 500 mm</td>
                                    <td>Flexural strength testing</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h5>Molding Specimens:</h5>
                    <ol>
                        <li>Place the concrete in the mold using a scoop, blunted trowel, or shovel.</li>
                        <li>Move the scoop around the perimeter of the mold opening to ensure an even distribution of concrete with minimal segregation.</li>
                        <li>Rod each layer with the rounded end of the rod using the number of strokes specified based on specimen size.</li>
                        <li>After rodding each layer, tap the outside of the mold lightly to close holes left by rodding.</li>
                        <li>Strike off the top surface with a screeding motion of the tamping rod, wood float, or trowel.</li>
                    </ol>
                </div>
            </div>
            
            <div class="card mt-3" id="curing">
                <div class="card-header">
                    <h3 class="card-title">Curing Methods</h3>
                </div>
                <div class="card-body">
                    <h4>Standard Curing Procedures for Concrete Test Specimens</h4>
                    <p>This section covers the standard methods for curing concrete test specimens to ensure accurate and representative strength results.</p>
                    
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-title">Reference Standards</h4>
                        <ul class="mb-0">
                            <li>SNI 2493:2011 - Method of making and curing concrete test specimens in the field</li>
                            <li>ASTM C31 / C31M - Standard Practice for Making and Curing Concrete Test Specimens in the Field</li>
                            <li>ASTM C511 - Standard Specification for Mixing Rooms, Moist Cabinets, Moist Rooms, and Water Storage Tanks Used in the Testing of Hydraulic Cements and Concretes</li>
                        </ul>
                    </div>
                    
                    <h5>Initial Curing:</h5>
                    <p>After completion of molding and finishing, the specimens shall be stored for a period up to 48 hours in an environment that maintains the temperature between 16 and 27°C and prevents loss of moisture.</p>
                    
                    <h5>Standard Curing Methods:</h5>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>Curing Method</th>
                                    <th>Description</th>
                                    <th>Requirements</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Water Storage</td>
                                    <td>Immersion in water saturated with calcium hydroxide</td>
                                    <td>Temperature: 23 ± 2°C</td>
                                </tr>
                                <tr>
                                    <td>Moist Room</td>
                                    <td>Storage in a room with controlled humidity</td>
                                    <td>Relative humidity: ≥ 95%, Temperature: 23 ± 2°C</td>
                                </tr>
                                <tr>
                                    <td>Field Curing</td>
                                    <td>Curing under the same conditions as the structure</td>
                                    <td>Used to estimate in-place strength or determine when formwork can be removed</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h5>Curing Period:</h5>
                    <p>Standard curing period for concrete specimens is typically 28 days, but testing may also be conducted at other ages such as 3, 7, 14, 56, or 90 days depending on project requirements.</p>
                </div>
            </div>
            
            <!-- Additional sections would continue here -->
        </div>
    </div>
</div>
@endsection
