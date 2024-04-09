#### HRM System

This project, which is my personal endeavor, aims to offer a comprehensive Human Resource Management (HRM) system designed to optimize various HR processes. It encompasses the following features:

---

### Features:

1. **Employee Management:**
   - Create, update, and manage employee profiles.
   - Track employee information including personal details, contact information, employment history, etc.

2. **Attendance Management:**
   - Record and track employee attendance.
   - Generate attendance reports for analysis and payroll processing.

3. **Leave Management:**
   - Allow employees to apply for leaves.
   - Review and approve leave requests.
   - Track leave balances and entitlements.

4. **Leave Request:**
   - Enable employees to submit leave requests.
   - Manage leave requests efficiently through an approval workflow.

5. **Payslip Generation:**
   - Generate payslips for employees.
   - Include details such as salary, deductions, allowances, etc.

6. **Candidate Management:**
   - Manage candidate applications for job openings.
   - Track candidate details, interview progress, and hiring status.

7. **Interview Schedule:**
   - Schedule interviews for candidates.
   - Manage interview dates, times, and interviewers.

8. **Department Management:**
   - Create and manage organizational departments.
   - Assign employees to departments for better organization and management.

9. **Designation Management:**
   - Define and manage employee designations.
   - Assign designations to employees based on roles and responsibilities.

10. **Role-Based Access Control:**
    - Implement role-based access control (RBAC) to restrict access to certain features based on user roles.
    - Assign different permissions to users based on their roles in the organization.

11. **Notification Board:**
    - Provide a centralized notification system for broadcasting important announcements, updates, and reminders.
    - Notify users about system events, such as leave approvals, interview schedules, etc.

### Future Integration Features

#### 12. Real-time Notifications with WebSockets:
   - Employ WebSocket technology to facilitate real-time notifications.
   - Ensure swift delivery of notifications to users, ensuring timely updates regarding all HR-related activities.

#### 13. Chat System Integration:
   - Seamlessly integrate a chat system to foster internal communication among employees.
   - Empower employees to securely collaborate and coordinate within the HRM system, enhancing team cohesion and productivity.

### Tech Stack:

- Database: MySQL
- Backend Framework: Laravel
- Frontend Technologies: jQuery, Bootstrap


---

### Cloning and Setup Instructions:

1. **Clone the Project:**
   ```bash
   git clone <repository_url>
   ```

2. **Navigate to the Project Directory:**
   ```bash
   cd <project_directory>
   ```

3. **Install Composer Dependencies:**
   ```bash
   composer install
   ```

4. **Create a copy of the `.env.example` file and rename it to `.env`:**
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Set up your MySQL database in the `.env` file:**
   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. **Run Database Migrations and Seeders:**
   ```bash
   php artisan migrate --seed
   ```

8. **Admin Credentials:**
   - Username: `EMP-1`
   - Password: `password`

---

By following these steps, you'll be able to clone the project, set it up with the required dependencies, and run the seeder to populate the database with admin credentials.
