<?php include '../nave.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Planner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        

        .planner-card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

       
        .completed {
            text-decoration: line-through;
            color: gray;
            background-color: #f8f9fa !important;
        }

        .btn-custom {
            border-radius: 25px;
        }

        h1 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5" style="height: 530px;">

    <div class="text-center text-dark mb-4 mt-5" >
        <h1 >📚 Study Planner</h1>
        <p>Organize your books, PDFs, and exam schedule efficiently</p>
    </div>

    <div class="card planner-card p-4 bg-white">

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="studyTable">
                <thead>
                    <tr>
                        <th>Book / PDF</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Exam Date</th>
                        <th>Completed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <hr class="my-4">

        <!-- Add Task Form -->
        <h4 class="mb-3">➕ Add New Task</h4>

        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" id="bookName" class="form-control" placeholder="Book / PDF Name">
            </div>
            <div class="col-md-2">
                <input type="date" id="startDate" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="date" id="endDate" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="date" id="examDate" class="form-control">
            </div>
            <div class="col-md-3 d-grid">
                <button class="btn btn-dark btn-custom" onclick="addTask()">Add Task</button>
            </div>
        </div>

    </div>
</div>

<script>
    function addTask() {
        const bookName = document.getElementById('bookName').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const examDate = document.getElementById('examDate').value;

        if (!bookName || !startDate || !endDate) {
            alert('Please fill in Book Name, Start Date, and End Date.');
            return;
        }

        const table = document.getElementById('studyTable').getElementsByTagName('tbody')[0];
        const row = table.insertRow();

        row.insertCell(0).innerText = bookName;
        row.insertCell(1).innerText = startDate;
        row.insertCell(2).innerText = endDate;
        row.insertCell(3).innerText = examDate || '-';
        row.insertCell(4).innerHTML = `<input type="checkbox" onchange="toggleComplete(this)">`;
        row.insertCell(5).innerHTML = `<button class="btn btn-danger btn-sm btn-custom" onclick="deleteRow(this)">Delete</button>`;

        document.getElementById('bookName').value = '';
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        document.getElementById('examDate').value = '';
    }

    function toggleComplete(checkbox) {
        const row = checkbox.closest("tr");
        row.classList.toggle("completed", checkbox.checked);
    }

    function deleteRow(button) {
        const row = button.closest("tr");
        row.remove();
    }
</script>

</body>
</html>
<?php include '../footer.php'; ?>

