<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - BookYard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #000000;
            --secondary-color: #333333;
            --accent-color: #ffffff;
            --text-light: #ffffff;
            --bg-light: #000000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: #ffffff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            z-index: 1000;
            transition: transform 0.3s ease;
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: block;
            padding: 12px 20px;
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-left-color: var(--accent-color);
            padding-left: 25px;
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.25);
            border-left-color: var(--accent-color);
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
            background-color: var(--bg-light);
            color: #ffffff;
        }

        .top-bar {
            background: #000000;
            border: 1px solid #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ffffff;
        }

        .content-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .report-filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .report-filters .form-control, .report-filters .form-select {
            min-width: 200px;
        }

        .chart-container {
            position: relative;
            height: 400px;
            margin-bottom: 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 15px;
        }

        .stat-icon.books {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .stat-icon.users {
            background-color: #f3e5f5;
            color: #9c27b0;
        }

        .stat-icon.revenue {
            background-color: #e8f5e8;
            color: #4caf50;
        }

        .stat-icon.fines {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .table-container {
            overflow-x: auto;
        }

        .mobile-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .report-filters {
                flex-direction: column;
            }

            .report-filters .form-control, .report-filters .form-select {
                min-width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-book"></i> BookYard</h3>
            <p>Admin Panel</p>
        </div>
        <nav class="sidebar-menu">
            <a href="dashboard.php" class="menu-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="manage-books.php" class="menu-item">
                <i class="fas fa-book"></i> Manage Books
            </a>
            <a href="add-book.php" class="menu-item">
                <i class="fas fa-plus-circle"></i> Add Book
            </a>
            <a href="manage-categories.php" class="menu-item">
                <i class="fas fa-tags"></i> Categories
            </a>
            <a href="manage-users.php" class="menu-item">
                <i class="fas fa-users"></i> Manage Users
            </a>
            <a href="add-user.php" class="menu-item">
                <i class="fas fa-user-plus"></i> Add User
            </a>
            <a href="issue-books.php" class="menu-item">
                <i class="fas fa-hand-holding"></i> Issue Books
            </a>
            <a href="return-books.php" class="menu-item">
                <i class="fas fa-undo"></i> Return Books
            </a>
            <a href="reports.php" class="menu-item active">
                <i class="fas fa-chart-bar"></i> Reports
            </a>
            <a href="profile.php" class="menu-item">
                <i class="fas fa-user"></i> Profile
            </a>
            <a href="change-password.php" class="menu-item">
                <i class="fas fa-key"></i> Change Password
            </a>
            <a href="logout.php" class="menu-item">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h1>Reports & Analytics</h1>
            <div>
                <button class="btn btn-primary" onclick="exportReport()">
                    <i class="fas fa-download"></i> Export Report
                </button>
            </div>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon books">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-value">1,234</div>
                <div class="stat-label">Total Books</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon users">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value">567</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon revenue">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-value">$2,450</div>
                <div class="stat-label">Monthly Revenue</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon fines">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-value">$125</div>
                <div class="stat-label">Total Fines</div>
            </div>
        </div>

        <!-- Report Filters -->
        <div class="content-card">
            <h5 class="mb-3"><i class="fas fa-filter"></i> Report Filters</h5>
            <div class="report-filters">
                <select class="form-select" id="reportType" onchange="updateReport()">
                    <option value="overview">Overview</option>
                    <option value="circulation">Circulation Report</option>
                    <option value="popular">Popular Books</option>
                    <option value="overdue">Overdue Books</option>
                    <option value="fines">Fine Collection</option>
                    <option value="users">User Activity</option>
                </select>
                <input type="date" class="form-control" id="startDate" onchange="updateReport()">
                <input type="date" class="form-control" id="endDate" onchange="updateReport()">
                <select class="form-select" id="category" onchange="updateReport()">
                    <option value="">All Categories</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="science">Science</option>
                    <option value="technology">Technology</option>
                </select>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="content-card">
            <h5 class="mb-3"><i class="fas fa-chart-line"></i> <span id="chartTitle">Overview</span></h5>
            <div class="chart-container">
                <canvas id="reportChart"></canvas>
            </div>
        </div>

        <!-- Detailed Table -->
        <div class="content-card">
            <h5 class="mb-3"><i class="fas fa-table"></i> <span id="tableTitle">Recent Activity</span></h5>
            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Book</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="reportTableBody">
                        <tr>
                            <td>2024-01-25</td>
                            <td><span class="badge bg-success">Issue</span></td>
                            <td>Book issued to John Doe</td>
                            <td>John Doe</td>
                            <td>The Great Gatsby</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2024-01-24</td>
                            <td><span class="badge bg-info">Return</span></td>
                            <td>Book returned by Jane Smith</td>
                            <td>Jane Smith</td>
                            <td>1984</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2024-01-23</td>
                            <td><span class="badge bg-warning">Fine</span></td>
                            <td>Late return fine for Robert Johnson</td>
                            <td>Robert Johnson</td>
                            <td>To Kill a Mockingbird</td>
                            <td>$2.50</td>
                        </tr>
                        <tr>
                            <td>2024-01-22</td>
                            <td><span class="badge bg-success">Issue</span></td>
                            <td>Book issued to Emily Davis</td>
                            <td>Emily Davis</td>
                            <td>Sapiens</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2024-01-21</td>
                            <td><span class="badge bg-primary">New User</span></td>
                            <td>New user registration</td>
                            <td>Michael Wilson</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2024-01-20</td>
                            <td><span class="badge bg-success">Issue</span></td>
                            <td>Book issued to Sarah Brown</td>
                            <td>Sarah Brown</td>
                            <td>The Lean Startup</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentChart = null;

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function updateReport() {
            const reportType = document.getElementById('reportType').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const category = document.getElementById('category').value;

            updateChart(reportType);
            updateTable(reportType);
            updateTitles(reportType);
        }

        function updateTitles(reportType) {
            const chartTitle = document.getElementById('chartTitle');
            const tableTitle = document.getElementById('tableTitle');

            const titles = {
                'overview': { chart: 'Monthly Overview', table: 'Recent Activity' },
                'circulation': { chart: 'Circulation Statistics', table: 'Circulation Report' },
                'popular': { chart: 'Most Popular Books', table: 'Popular Books Report' },
                'overdue': { chart: 'Overdue Books Trend', table: 'Overdue Books' },
                'fines': { chart: 'Fine Collection', table: 'Fine Collection Report' },
                'users': { chart: 'User Activity', table: 'User Activity Report' }
            };

            if (titles[reportType]) {
                chartTitle.textContent = titles[reportType].chart;
                tableTitle.textContent = titles[reportType].table;
            }
        }

        function updateChart(reportType) {
            const ctx = document.getElementById('reportChart').getContext('2d');
            
            // Destroy existing chart if it exists
            if (currentChart) {
                currentChart.destroy();
            }

            const chartConfigs = {
                'overview': {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Books Issued',
                            data: [45, 52, 48, 58, 62, 55],
                            borderColor: '#3498db',
                            backgroundColor: 'rgba(52, 152, 219, 0.1)',
                            tension: 0.4
                        }, {
                            label: 'Books Returned',
                            data: [40, 48, 45, 52, 55, 50],
                            borderColor: '#28a745',
                            backgroundColor: 'rgba(40, 167, 69, 0.1)',
                            tension: 0.4
                        }]
                    }
                },
                'circulation': {
                    type: 'bar',
                    data: {
                        labels: ['Fiction', 'Non-Fiction', 'Science', 'Technology', 'History', 'Business'],
                        datasets: [{
                            label: 'Books Issued',
                            data: [234, 189, 134, 156, 98, 112],
                            backgroundColor: '#3498db'
                        }]
                    }
                },
                'popular': {
                    type: 'doughnut',
                    data: {
                        labels: ['The Great Gatsby', '1984', 'To Kill a Mockingbird', 'Sapiens', 'The Lean Startup'],
                        datasets: [{
                            data: [45, 38, 32, 28, 25],
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56',
                                '#4BC0C0',
                                '#9966FF'
                            ]
                        }]
                    }
                },
                'overdue': {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Overdue Books',
                            data: [12, 18, 15, 22, 28, 25],
                            borderColor: '#dc3545',
                            backgroundColor: 'rgba(220, 53, 69, 0.1)',
                            tension: 0.4
                        }]
                    }
                },
                'fines': {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Fine Amount ($)',
                            data: [45, 62, 38, 75, 85, 95],
                            backgroundColor: '#ffc107'
                        }]
                    }
                },
                'users': {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'New Users',
                            data: [12, 15, 18, 22, 25, 20],
                            borderColor: '#28a745',
                            backgroundColor: 'rgba(40, 167, 69, 0.1)',
                            tension: 0.4
                        }, {
                            label: 'Active Users',
                            data: [45, 48, 52, 55, 58, 62],
                            borderColor: '#17a2b8',
                            backgroundColor: 'rgba(23, 162, 184, 0.1)',
                            tension: 0.4
                        }]
                    }
                }
            };

            const config = chartConfigs[reportType] || chartConfigs['overview'];
            currentChart = new Chart(ctx, config);
        }

        function updateTable(reportType) {
            const tableBody = document.getElementById('reportTableBody');
            
            const tableData = {
                'overview': [
                    { date: '2024-01-25', type: 'Issue', description: 'Book issued to John Doe', user: 'John Doe', book: 'The Great Gatsby', amount: '-' },
                    { date: '2024-01-24', type: 'Return', description: 'Book returned by Jane Smith', user: 'Jane Smith', book: '1984', amount: '-' },
                    { date: '2024-01-23', type: 'Fine', description: 'Late return fine for Robert Johnson', user: 'Robert Johnson', book: 'To Kill a Mockingbird', amount: '$2.50' },
                    { date: '2024-01-22', type: 'Issue', description: 'Book issued to Emily Davis', user: 'Emily Davis', book: 'Sapiens', amount: '-' },
                    { date: '2024-01-21', type: 'New User', description: 'New user registration', user: 'Michael Wilson', book: '-', amount: '-' },
                    { date: '2024-01-20', type: 'Issue', description: 'Book issued to Sarah Brown', user: 'Sarah Brown', book: 'The Lean Startup', amount: '-' }
                ],
                'circulation': [
                    { date: '2024-01-25', type: 'Issue', description: 'Fiction book issued', user: 'John Doe', book: 'The Great Gatsby', amount: '-' },
                    { date: '2024-01-24', type: 'Return', description: 'Non-fiction book returned', user: 'Jane Smith', book: 'Sapiens', amount: '-' },
                    { date: '2024-01-23', type: 'Issue', description: 'Science book issued', user: 'Robert Johnson', book: 'A Brief History of Time', amount: '-' },
                    { date: '2024-01-22', type: 'Return', description: 'Technology book returned', user: 'Emily Davis', book: 'Clean Code', amount: '-' },
                    { date: '2024-01-21', type: 'Issue', description: 'Business book issued', user: 'Michael Wilson', book: 'The Lean Startup', amount: '-' },
                    { date: '2024-01-20', type: 'Issue', description: 'History book issued', user: 'Sarah Brown', book: 'The Guns of August', amount: '-' }
                ],
                'popular': [
                    { date: '2024-01-25', type: 'Issue', description: 'Most popular book', user: 'John Doe', book: 'The Great Gatsby', amount: '-' },
                    { date: '2024-01-24', type: 'Issue', description: 'Second most popular', user: 'Jane Smith', book: '1984', amount: '-' },
                    { date: '2024-01-23', type: 'Issue', description: 'Third most popular', user: 'Robert Johnson', book: 'To Kill a Mockingbird', amount: '-' },
                    { date: '2024-01-22', type: 'Issue', description: 'Fourth most popular', user: 'Emily Davis', book: 'Sapiens', amount: '-' },
                    { date: '2024-01-21', type: 'Issue', description: 'Fifth most popular', user: 'Michael Wilson', book: 'The Lean Startup', amount: '-' }
                ],
                'overdue': [
                    { date: '2024-01-25', type: 'Overdue', description: 'Book overdue 5 days', user: 'John Doe', book: 'The Great Gatsby', amount: '$2.50' },
                    { date: '2024-01-24', type: 'Overdue', description: 'Book overdue 3 days', user: 'Jane Smith', book: '1984', amount: '$1.50' },
                    { date: '2024-01-23', type: 'Overdue', description: 'Book overdue 7 days', user: 'Robert Johnson', book: 'To Kill a Mockingbird', amount: '$3.50' },
                    { date: '2024-01-22', type: 'Overdue', description: 'Book overdue 2 days', user: 'Emily Davis', book: 'Sapiens', amount: '$1.00' },
                    { date: '2024-01-21', type: 'Overdue', description: 'Book overdue 1 day', user: 'Michael Wilson', book: 'The Lean Startup', amount: '$0.50' }
                ],
                'fines': [
                    { date: '2024-01-25', type: 'Fine Paid', description: 'Late return fine paid', user: 'John Doe', book: 'The Great Gatsby', amount: '$2.50' },
                    { date: '2024-01-24', type: 'Fine Paid', description: 'Late return fine paid', user: 'Jane Smith', book: '1984', amount: '$1.50' },
                    { date: '2024-01-23', type: 'Fine Paid', description: 'Late return fine paid', user: 'Robert Johnson', book: 'To Kill a Mockingbird', amount: '$3.50' },
                    { date: '2024-01-22', type: 'Fine Paid', description: 'Late return fine paid', user: 'Emily Davis', book: 'Sapiens', amount: '$1.00' },
                    { date: '2024-01-21', type: 'Fine Paid', description: 'Late return fine paid', user: 'Michael Wilson', book: 'The Lean Startup', amount: '$0.50' }
                ],
                'users': [
                    { date: '2024-01-25', type: 'Registration', description: 'New user registered', user: 'John Doe', book: '-', amount: '-' },
                    { date: '2024-01-24', type: 'Registration', description: 'New user registered', user: 'Jane Smith', book: '-', amount: '-' },
                    { date: '2024-01-23', type: 'Registration', description: 'New user registered', user: 'Robert Johnson', book: '-', amount: '-' },
                    { date: '2024-01-22', type: 'Registration', description: 'New user registered', user: 'Emily Davis', book: '-', amount: '-' },
                    { date: '2024-01-21', type: 'Registration', description: 'New user registered', user: 'Michael Wilson', book: '-', amount: '-' }
                ]
            };

            const data = tableData[reportType] || tableData['overview'];
            
            const badgeColors = {
                'Issue': 'bg-success',
                'Return': 'bg-info',
                'Fine': 'bg-warning',
                'Fine Paid': 'bg-warning',
                'Overdue': 'bg-danger',
                'Registration': 'bg-primary'
            };

            tableBody.innerHTML = data.map(row => `
                <tr>
                    <td>${row.date}</td>
                    <td><span class="badge ${badgeColors[row.type] || 'bg-secondary'}">${row.type}</span></td>
                    <td>${row.description}</td>
                    <td>${row.user}</td>
                    <td>${row.book}</td>
                    <td>${row.amount}</td>
                </tr>
            `).join('');
        }

        function exportReport() {
            const reportType = document.getElementById('reportType').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            
            alert(`Exporting ${reportType} report from ${startDate} to ${endDate}...`);
            // Here you would typically generate and download the report
        }

        // Initialize with default dates
        window.onload = function() {
            const today = new Date();
            const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
            
            document.getElementById('startDate').value = lastMonth.toISOString().split('T')[0];
            document.getElementById('endDate').value = today.toISOString().split('T')[0];
            
            updateReport();
        };

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>