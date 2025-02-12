fetch('/api/saw')
    .then(response => response.json())
    .then(apiData => {
        // console.log(apiData);
        const labels = Object.keys(apiData.data); // Nama mobil
        const values = Object.values(apiData.data); // Nilai normalisasi

        const ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line', // Jenis chart (bar, line, pie, dll.)
            data: {
                labels: labels, // Label untuk tiap bar
                datasets: [{
                    label: 'SAW Result',
                    data: values, // Nilai untuk tiap bar
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error:', error));
