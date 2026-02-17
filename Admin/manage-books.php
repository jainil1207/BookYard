<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Books - BookYard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="admin.css">
    <style>
            /* color: #ffffff;

        } */



        .content-card {

            background: #ffffff;

            padding: 25px;

            border-radius: 10px;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

        }



        .search-bar {

            display: flex;

            gap: 10px;

            margin-bottom: 20px;

        }



        .search-bar input {

            flex: 1;

        }



        .action-buttons {

            display: flex;

            gap: 10px;

        }



        .book-table {

            overflow-x: auto;

        }



        .book-table table {

            width: 100%;

            border-collapse: collapse;

        }



        .book-table th {

            background-color: var(--primary-color);

            color: white;

            padding: 12px;

            text-align: left;

            font-weight: 500;

        }



        .book-table td {

            padding: 12px;

            border-bottom: 1px solid #dee2e6;

        }



        .book-table tr:hover {

            background-color: #f8f9fa;

        }



        .status-badge {

            padding: 4px 8px;

            border-radius: 20px;

            font-size: 0.8rem;

            font-weight: 500;

        }



        .status-available {

            background-color: #d4edda;

            color: #155724;

        }



        .status-issued {

            background-color: #f8d7da;

            color: #721c24;

        }



        .btn-action {

            padding: 5px 10px;

            margin: 0 2px;

            border: none;

            border-radius: 5px;

            cursor: pointer;

            transition: background-color 0.3s ease;

        }



        .btn-edit {

            background-color: #ffc107;

            color: white;

        }



        .btn-edit:hover {

            background-color: #e0a800;

        }



        .btn-delete {

            background-color: #dc3545;

            color: white;

        }



        .btn-delete:hover {

            background-color: #c82333;

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



            .action-buttons {

                flex-direction: column;

            }



            .search-bar {

                flex-direction: column;

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

            <a href="manage-books.php" class="menu-item active">

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

            <a href="reports.php" class="menu-item">

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

            <h1>Manage Books</h1>

            <div>

                <a href="add-book.php" class="btn btn-primary">

                    <i class="fas fa-plus"></i> Add New Book

                </a>

            </div>

        </div>



        <div class="content-card">

            <div class="search-bar">

                <input type="text" class="form-control" placeholder="Search books by title, author, or ISBN..." id="searchInput">

                <select class="form-select" style="max-width: 200px;" id="categoryFilter">

                    <option value="">All Categories</option>

                    <option value="fiction">Fiction</option>

                    <option value="non-fiction">Non-Fiction</option>

                    <option value="science">Science</option>

                    <option value="technology">Technology</option>

                    <option value="history">History</option>

                </select>

                <select class="form-select" style="max-width: 150px;" id="statusFilter">

                    <option value="">All Status</option>

                    <option value="available">Available</option>

                    <option value="issued">Issued</option>

                </select>

            </div>



            <div class="book-table">

                <table class="table">

                    <thead>

                        <tr>

                            <th>Book ID</th>

                            <th>Title</th>

                            <th>Author</th>

                            <th>ISBN</th>

                            <th>Category</th>

                            <th>Status</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>#001</td>

                            <td>The Great Gatsby</td>

                            <td>F. Scott Fitzgerald</td>

                            <td>978-0-7432-7356-5</td>

                            <td><span class="badge bg-secondary">Fiction</span></td>

                            <td><span class="status-badge status-available">Available</span></td>

                            <td>

                                <button class="btn-action btn-edit" onclick="editBook('001')">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn-action btn-delete" onclick="deleteBook('001')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

                            <td>#002</td>

                            <td>1984</td>

                            <td>George Orwell</td>

                            <td>978-0-452-28423-4</td>

                            <td><span class="badge bg-secondary">Fiction</span></td>

                            <td><span class="status-badge status-issued">Issued</span></td>

                            <td>

                                <button class="btn-action btn-edit" onclick="editBook('002')">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn-action btn-delete" onclick="deleteBook('002')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

                            <td>#003</td>

                            <td>To Kill a Mockingbird</td>

                            <td>Harper Lee</td>

                            <td>978-0-06-112008-4</td>

                            <td><span class="badge bg-secondary">Fiction</span></td>

                            <td><span class="status-badge status-available">Available</span></td>

                            <td>

                                <button class="btn-action btn-edit" onclick="editBook('003')">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn-action btn-delete" onclick="deleteBook('003')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

                            <td>#004</td>

                            <td>Sapiens</td>

                            <td>Yuval Noah Harari</td>

                            <td>978-0-06-231609-7</td>

                            <td><span class="badge bg-secondary">Non-Fiction</span></td>

                            <td><span class="status-badge status-available">Available</span></td>

                            <td>

                                <button class="btn-action btn-edit" onclick="editBook('004')">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn-action btn-delete" onclick="deleteBook('004')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

                            <td>#005</td>

                            <td>The Lean Startup</td>

                            <td>Eric Ries</td>

                            <td>978-0-307-88789-4</td>

                            <td><span class="badge bg-secondary">Business</span></td>

                            <td><span class="status-badge status-issued">Issued</span></td>

                            <td>

                                <button class="btn-action btn-edit" onclick="editBook('005')">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button class="btn-action btn-delete" onclick="deleteBook('005')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>



            <nav aria-label="Page navigation" class="mt-4">

                <ul class="pagination justify-content-center">

                    <li class="page-item disabled">

                        <a class="page-link" href="#" tabindex="-1">Previous</a>

                    </li>

                    <li class="page-item active">

                        <a class="page-link" href="#">1</a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">2</a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">3</a>

                    </li>

                    <li class="page-item">

                        <a class="page-link" href="#">Next</a>

                    </li>

                </ul>

            </nav>

        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById('sidebar');

            sidebar.classList.toggle('active');

        }



        function editBook(bookId) {

            window.location.href = `edit-book.php?id=${bookId}`;

        }



        function deleteBook(bookId) {

            if (confirm('Are you sure you want to delete this book?')) {

                // Add delete logic here

                alert('Book deleted successfully!');

            }

        }



        // Search functionality

        document.getElementById('searchInput').addEventListener('input', function(e) {

            const searchTerm = e.target.value.toLowerCase();

            const rows = document.querySelectorAll('tbody tr');

            

            rows.forEach(row => {

                const text = row.textContent.toLowerCase();

                row.style.display = text.includes(searchTerm) ? '' : 'none';

            });

        });



        // Filter functionality

        document.getElementById('categoryFilter').addEventListener('change', filterTable);

        document.getElementById('statusFilter').addEventListener('change', filterTable);



        function filterTable() {

            const categoryFilter = document.getElementById('categoryFilter').value.toLowerCase();

            const statusFilter = document.getElementById('statusFilter').value.toLowerCase();

            const rows = document.querySelectorAll('tbody tr');

            

            rows.forEach(row => {

                const category = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                const status = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                

                const categoryMatch = !categoryFilter || category.includes(categoryFilter);

                const statusMatch = !statusFilter || status.includes(statusFilter);

                

                row.style.display = categoryMatch && statusMatch ? '' : 'none';

            });

        }



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