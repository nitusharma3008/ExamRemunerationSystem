<?php
include('user_dashboard.php');


?>

<div class="container-fluid user-content">
    <div class="container p-0 ">
        <!-- <h1 class="user-title text-center">WelCome to User Dashboard</h1>
        <h1 class="user-title text-center">Features are coming soon! please wait.</h1>
        <div class="left-content"></div>
        <div class="right-content"></div> -->

        <div class="container">
            <h2 class="text-center">Faculty Remuneration Over Time</h2>
            <canvas id="remunerationChart"></canvas>
        </div>

        <!-- Include Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        // JavaScript to generate the graph
        const ctx = document.getElementById('remunerationChart').getContext('2d');

        const remunerationChart = new Chart(ctx, {
            type: 'line', // or 'bar', 'pie', etc.
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], // X-axis labels
                datasets: [{
                    label: 'Faculty Remuneration (in Repees)',
                    data: [1200, 1500, 1800, 2000, 2300, 2500, 2700], // Remuneration data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color of the line fill
                    borderColor: 'rgba(75, 192, 192, 1)', // Line color
                    borderWidth: 2, // Line thickness
                    fill: true // To fill under the line
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true, // Starts Y-axis at 0
                        title: {
                            display: true,
                            text: 'Remuneration Amount (Repees)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top' // Position of the legend
                    }
                }
            }
        });
        </script>



    </div>
</div>


<?php
include('../footer.php');
?>