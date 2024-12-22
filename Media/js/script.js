// Fetch traffic data and update the dashboard
fetch('fetch_traffic_distribution.php')
    .then(response => response.json())
    .then(data => {
        // Update total visits
        document.getElementById('traffic-total').textContent = `$${data.total_visits}`;

        // Update growth percentage
        document.getElementById('growth-percentage').textContent = `+${data.growth_percentage}%`;

        // Update traffic labels
        const organicPercentage = data.traffic_distribution.Organic;
        const referralPercentage = data.traffic_distribution.Referral;

        document.getElementById('organic-label').textContent = `Organic (${organicPercentage}%)`;
        document.getElementById('referral-label').textContent = `Referral (${referralPercentage}%)`;

        // Render traffic pie chart
        const ctx = document.getElementById('trafficChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Organic', 'Referral'],
                datasets: [{
                    data: [organicPercentage, referralPercentage],
                    backgroundColor: ['#3498db', '#e74c3c']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Traffic Distribution' }
                }
            }
        });
    });
