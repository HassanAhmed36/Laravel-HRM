<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Modules</li>
                @can('permission', 'employee_view')
                    <li class="mb-2">
                        <a href="{{ route('employee.index') }}" class=" waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-contacts">Employees</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'department_view')
                    <li class="mb-2">
                        <a href="{{ route('department.index') }}" class=" waves-effect">
                            <i class="bx bx-building"></i>
                            <span key="t-crypto">Departments</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'designation_view')
                    <li class="mb-2">
                        <a href="{{ route('designation.index') }}" class=" waves-effect">
                            <i class="bx bx-badge-check"></i>
                            <span key="t-crypto">Designations</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'attendance_view')
                    <li class="mb-2">
                        <a href="{{ route('attendance.index') }}" class="waves-effect">
                            <i class="bx bx-time-five"></i>
                            <span key="bx bx-task">Attendance</span>
                        </a>
                    </li>
                @endcan
                @can('permission', ['leave_view', 'leave_quota_view', 'holiday_view', 'deduction_setting_view'])
                    <li class="mb-2">
                        <a class="waves-effecthas-arrow">
                            <i class="bx bx-calendar"></i>
                            <span key="t-invoices">Leaves</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('permission', 'leave_view')
                                <li class="mb-2"><a href="{{ route('leave.index') }}" key="t-p-grid">Mark Leave</a></li>
                            @endcan
                            @can('permission', 'leave_quota_view')
                                <li class="mb-2"><a href="{{ route('leave.quota') }}" key="t-p-list">Leave Quota</a></li>
                            @endcan
                            @can('permission', 'holiday_view')
                                <li class="mb-2"><a href="{{ route('holiday.index') }}" key="t-p-list">Holiday</a></li>
                            @endcan
                            @can('permission', 'deduction_setting_view')
                                <li class="mb-2"><a href="{{ route('deduction.index') }}" key="t-p-overview">Deduction
                                        Settings</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('permission', 'allowance_view')
                    <li class="mb-2">
                        <a href="{{ route('allowance.index') }}" class="waves-effect">
                            <i class="bx bx-money"></i>
                            <span key="t-projects">Allowance</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'payslip_view')
                    <li class="mb-2">
                        <a href="{{ route('payslip.index') }}" class="waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-projects">PaySlip</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'candidate_view')
                    <li class="mb-2">
                        <a href="{{ route('candidate.index') }}" class="waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-contacts">Candidates</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'interview_schedule_view')
                    <li class="mb-2">
                        <a href="{{ route('interview.schedule.index') }}" class="waves-effect">
                            <i class="bx bx-calendar-check"></i>
                            <span key="t-blog">Interview Schedules</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'notice_board_view')
                    <li class="mb-2">
                        <a href="{{ route('notice.board.index') }}" class="waves-effect">
                            <i class="bx bx-notification"></i>
                            <span key="t-jobs">Notice Board</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'LeaveRequest')
                    <li class="mb-2">
                        <a href="{{ route('leave.request.index') }}" class="waves-effect">
                            <i class="bx bx-calendar-event"></i>
                            <span key="t-jobs">Leave Request</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'MyAttendance')
                    <li class="mb-2">
                        <a href="{{ route('my.attendance') }}" class="waves-effect">
                            <i class="bx bx-time-five"></i>
                            <span key="t-jobs">My Attendance</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'MyPayslip')
                    <li class="mb-2">
                        <a href="{{ route('my.payslip') }}" class="waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-jobs">My Payslip</span>
                        </a>
                    </li>
                @endcan
                @can('permission', 'setting')
                    <li class="mb-2">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-cog"></i>
                            <span key="t-projects">Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li class="mb-2"><a href="projects-grid.html" key="t-p-grid">Website Settings</a></li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
