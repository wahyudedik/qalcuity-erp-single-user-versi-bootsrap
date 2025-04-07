@extends('layouts.app')

@section('title', 'Shift Schedule')

@section('styles')
<style>
    .shift-calendar {
        overflow-x: auto;
    }
    
    .shift-calendar table {
        min-width: 1000px;
    }
    
    .shift-calendar th, .shift-calendar td {
        text-align: center;
        min-width: 40px;
    }
    
    .shift-calendar .employee-name {
        text-align: left;
        min-width: 200px;
        position: sticky;
        left: 0;
        background-color: #fff;
        z-index: 1;
    }
    
    .shift-calendar .day-header {
        font-weight: bold;
    }
    
    .shift-calendar .weekend {
        background-color: rgba(0, 0, 0, 0.05);
    }
    
    .shift-calendar .today {
        background-color: rgba(32, 107, 196, 0.1);
    }
    
    .shift-morning {
        background-color: #d1e7dd;
        color: #0a3622;
    }
    
    .shift-afternoon {
        background-color: #cfe2ff;
        color: #084298;
    }
    
    .shift-night {
        background-color: #e2e3e5;
        color: #41464b;
    }
    
    .shift-off {
        background-color: #f8f9fa;
        color: #212529;
    }
    
    .shift-holiday {
        background-color: #f8d7da;
        color: #842029;
    }
    
    .shift-legend {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    
    .shift-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .shift-legend-color {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
</style>
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Shift Schedule
                </h2>
                <div class="text-muted mt-1">Monthly shift schedule for employees</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" onclick="window.print()">
                        <i class="ti ti-printer"></i>
                        Print Schedule
                    </a>
                    <a href="{{ route('hr.shifts.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Shifts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Monthly Shift Schedule</h3>
                <div class="card-actions">
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-secondary">
                            <i class="ti ti-chevron-left"></i>
                            Previous Month
                        </a>
                        <a href="#" class="btn btn-outline-secondary">
                            Next Month
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h2>May 2023</h2>
                    </div>
                    <div class="d-flex gap-2">
                        <select class="form-select">
                            <option value="all">All Departments</option>
                            <option value="production">Production</option>
                            <option value="quality">Quality Assurance</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="logistics">Logistics</option>
                        </select>
                        <select class="form-select">
                            <option value="all">All Branches</option>
                            <option value="1" selected>Jakarta Plant</option>
                            <option value="2">Surabaya Plant</option>
                            <option value="3">Bandung Plant</option>
                        </select>
                    </div>
                </div>

                <div class="shift-legend">
                    <div class="shift-legend-item">
                        <div class="shift-legend-color shift-morning"></div>
                        <span>Morning (M)</span>
                    </div>
                    <div class="shift-legend-item">
                        <div class="shift-legend-color shift-afternoon"></div>
                        <span>Afternoon (A)</span>
                    </div>
                    <div class="shift-legend-item">
                        <div class="shift-legend-color shift-night"></div>
                        <span>Night (N)</span>
                    </div>
                    <div class="shift-legend-item">
                        <div class="shift-legend-color shift-off"></div>
                        <span>Day Off (O)</span>
                    </div>
                    <div class="shift-legend-item">
                        <div class="shift-legend-color shift-holiday"></div>
                        <span>Holiday (H)</span>
                    </div>
                </div>

                <div class="shift-calendar">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="employee-name">Employee</th>
                                                                @for ($i = 1; $i <= 31; $i++)
                                    @php
                                        $isWeekend = $i % 7 == 0 || $i % 7 == 6;
                                        $isToday = $i == 15;
                                        $classes = [];
                                        if ($isWeekend) $classes[] = 'weekend';
                                        if ($isToday) $classes[] = 'today';
                                        $classString = implode(' ', $classes);
                                    @endphp
                                    <th class="day-header {{ $classString }}">{{ $i }}</th>
                                @endfor
                            </tr>
                            <tr>
                                <th class="employee-name">Day</th>
                                @php
                                    $days = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
                                    $dayIndex = 0; // Assuming May 1, 2023 is a Monday
                                @endphp
                                @for ($i = 1; $i <= 31; $i++)
                                    @php
                                        $currentDay = $days[$dayIndex % 7];
                                        $isWeekend = $dayIndex % 7 == 5 || $dayIndex % 7 == 6;
                                        $isToday = $i == 15;
                                        $classes = [];
                                        if ($isWeekend) $classes[] = 'weekend';
                                        if ($isToday) $classes[] = 'today';
                                        $classString = implode(' ', $classes);
                                        $dayIndex++;
                                    @endphp
                                    <th class="{{ $classString }}">{{ $currentDay }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $employees = [
                                [
                                    'id' => 'EMP-001',
                                    'name' => 'Budi Santoso',
                                    'position' => 'Production Operator',
                                    'department' => 'Production',
                                ],
                                [
                                    'id' => 'EMP-002',
                                    'name' => 'Andi Wijaya',
                                    'position' => 'Production Operator',
                                    'department' => 'Production',
                                ],
                                [
                                    'id' => 'EMP-003',
                                    'name' => 'Citra Dewi',
                                    'position' => 'Quality Inspector',
                                    'department' => 'Quality Assurance',
                                ],
                                [
                                    'id' => 'EMP-004',
                                    'name' => 'Dodi Pratama',
                                    'position' => 'Maintenance Technician',
                                    'department' => 'Maintenance',
                                ],
                                [
                                    'id' => 'EMP-005',
                                    'name' => 'Dewi Lestari',
                                    'position' => 'Quality Control',
                                    'department' => 'Quality Assurance',
                                ],
                                [
                                    'id' => 'EMP-006',
                                    'name' => 'Eko Prasetyo',
                                    'position' => 'Batch Plant Operator',
                                    'department' => 'Production',
                                ],
                                [
                                    'id' => 'EMP-007',
                                    'name' => 'Fani Wijaya',
                                    'position' => 'Laboratory Technician',
                                    'department' => 'Quality Assurance',
                                ],
                                [
                                    'id' => 'EMP-008',
                                    'name' => 'Gunawan Setiadi',
                                    'position' => 'Mixer Truck Driver',
                                    'department' => 'Logistics',
                                ],
                                [
                                    'id' => 'EMP-009',
                                    'name' => 'Hadi Susanto',
                                    'position' => 'Warehouse Staff',
                                    'department' => 'Logistics',
                                ],
                                [
                                    'id' => 'EMP-010',
                                    'name' => 'Indah Permata',
                                    'position' => 'Admin Staff',
                                    'department' => 'Administration',
                                ],
                            ];

                            $shiftPatterns = [
                                'pattern1' => ['M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M'],
                                'pattern2' => ['A', 'A', 'A', 'A', 'A', 'O', 'O', 'A', 'A', 'A', 'A', 'A', 'O', 'O', 'A', 'A', 'A', 'A', 'A', 'O', 'O', 'A', 'A', 'A', 'A', 'A', 'O', 'O', 'A', 'A', 'A'],
                                'pattern3' => ['N', 'N', 'N', 'N', 'O', 'O', 'O', 'N', 'N', 'N', 'N', 'O', 'O', 'O', 'N', 'N', 'N', 'N', 'O', 'O', 'O', 'N', 'N', 'N', 'N', 'O', 'O', 'O', 'N', 'N', 'N'],
                                'pattern4' => ['M', 'M', 'M', 'M', 'M', 'O', 'O', 'A', 'A', 'A', 'A', 'A', 'O', 'O', 'N', 'N', 'N', 'N', 'O', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'A', 'A', 'A'],
                                'pattern5' => ['M', 'M', 'M', 'M', 'M', 'H', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'O', 'M', 'M', 'M', 'M', 'M', 'O', 'H', 'M', 'M', 'M'],
                            ];

                            $employeePatterns = [
                                'EMP-001' => 'pattern1',
                                'EMP-002' => 'pattern2',
                                'EMP-003' => 'pattern1',
                                'EMP-004' => 'pattern3',
                                'EMP-005' => 'pattern1',
                                'EMP-006' => 'pattern2',
                                'EMP-007' => 'pattern1',
                                'EMP-008' => 'pattern4',
                                'EMP-009' => 'pattern1',
                                'EMP-010' => 'pattern5',
                            ];
                            @endphp

                            @foreach($employees as $employee)
                            <tr>
                                <td class="employee-name">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2" style="background-image: url(https://placehold.co/128x128)"></span>
                                        <div>
                                            <div class="font-weight-medium">{{ $employee['name'] }}</div>
                                            <div class="text-muted small">{{ $employee['position'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                @php
                                    $pattern = $shiftPatterns[$employeePatterns[$employee['id']]];
                                @endphp
                                
                                @for ($i = 0; $i < 31; $i++)
                                    @php
                                        $shift = $pattern[$i];
                                        $isWeekend = ($i + 1) % 7 == 0 || ($i + 1) % 7 == 6;
                                        $isToday = ($i + 1) == 15;
                                        
                                        $classes = [];
                                        if ($shift == 'M') $classes[] = 'shift-morning';
                                        elseif ($shift == 'A') $classes[] = 'shift-afternoon';
                                        elseif ($shift == 'N') $classes[] = 'shift-night';
                                        elseif ($shift == 'H') $classes[] = 'shift-holiday';
                                        else $classes[] = 'shift-off';
                                        
                                        if ($isWeekend) $classes[] = 'weekend';
                                        if ($isToday) $classes[] = 'today';
                                        
                                        $classString = implode(' ', $classes);
                                    @endphp
                                    <td class="{{ $classString }}">{{ $shift }}</td>
                                @endfor
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="ti ti-download"></i>
                            Export Excel
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="ti ti-mail"></i>
                            Email Schedule
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary">
                            <i class="ti ti-edit"></i>
                            Edit Schedule
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
