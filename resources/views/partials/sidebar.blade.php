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
                <li class="mb-2">
                    <a href="{{ route('employee.index') }}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-contacts">Employees</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('department.index') }}" class=" waves-effect">
                        <i class="bx bx-building"></i>
                        <span key="t-crypto">Departments</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('designation.index') }}" class=" waves-effect">
                        <i class="bx bx-badge-check"></i>
                        <span key="t-crypto">Designations</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('attendance.index') }}" class="waves-effect">
                        <i class="bx bx-time-five"></i>
                        <span key="bx bx-task">Attendance</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a  class="waves-effect has-arrow">
                        <i class="bx bx-calendar"></i>
                        <span key="t-invoices">Leaves</span>
                    </a>    
                      <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('leave.index') }}" key="t-p-grid">Mark Leave</a></li>
                        <li><a href="{{ route('leave.quota') }}" key="t-p-list">Leave Quota</a></li>
                    </ul>
                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-projects">Payroll</span>
                    </a>

                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-briefcase"></i>
                        <span key="t-tasks">Jobs</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-contacts">Candidates</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-calendar-check"></i>
                        <span key="t-blog">Interview Schedules</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="waves-effect ">
                        <i class="bx bx-notification"></i>
                        <span key="t-jobs">Notice Board</span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-projects">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid.html" key="t-p-grid">Website Settings</a></li>
                        <li><a href="projects-list.html" key="t-p-list">Allowance Settings</a></li>
                        <li><a href="projects-overview.html" key="t-p-overview">Deduction Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
