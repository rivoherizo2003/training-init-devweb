// Sales & Purchase Bar Chart
new Chart(document.getElementById('salesChart'), {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        datasets: [
            {
                label: 'Purchase',
                data: [45000, 55000, 48000, 42000, 35000, 28000, 50000, 47000],
                backgroundColor: '#1366d9',
                borderRadius: 4
            },
            {
                label: 'Sales',
                data: [42000, 48000, 55000, 38000, 45000, 52000, 48000, 45000],
                backgroundColor: '#10b981',
                borderRadius: 4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } },
        scales: {
            y: { beginAtZero: true, ticks: { callback: v => v.toLocaleString() } }
        }
    }
});

// Order Summary Line Chart
new Chart(document.getElementById('orderChart'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [
            {
                label: 'Ordered',
                data: [1200, 2100, 800, 3200, 2800],
                borderColor: '#f59e0b',
                tension: 0.4,
                fill: false
            },
            {
                label: 'Delivered',
                data: [800, 3000, 2000, 2800, 3200],
                borderColor: '#93c5fd',
                tension: 0.4,
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } },
        scales: { y: { beginAtZero: true } }
    }
});
