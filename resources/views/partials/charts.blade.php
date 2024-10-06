<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
@include('partials.dashboard')
    <div style="width: 60%; margin: auto;">
        <!-- Company Bar Chart -->
        <h2>Recently Created Companies</h2>
        <canvas id="recentCompaniesChart"></canvas>

        <!-- Employee Line Chart -->
        <h2>Recently Created Employees</h2>
        <canvas id="recentEmployeesChart"></canvas>
    </div>

    <script>
        const companyData = @json($companyData);
        const companyLabels = [];
        const companyCounts = [];

        companyData.forEach(function (data) {
            companyLabels.push(data.day);
            companyCounts.push(data.count);
        });

        const companyCtx = document.getElementById('recentCompaniesChart').getContext('2d');
        new Chart(companyCtx, {
            type: 'bar',
            data: {
                labels: companyLabels,
                datasets: [{
                    label: 'Companies Created',
                    data: companyCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Employee Data for Line Chart
        const employeeData = @json($employeeData);
        const employeeLabels = [];
        const employeeCounts = [];

        employeeData.forEach(function (data) {
            employeeLabels.push(data.day);
            employeeCounts.push(data.count);
        });

        const employeeCtx = document.getElementById('recentEmployeesChart').getContext('2d');
        new Chart(employeeCtx, {
            type: 'line',
            data: {
                labels: employeeLabels,
                datasets: [{
                    label: 'Employees Created',
                    data: employeeCounts,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
