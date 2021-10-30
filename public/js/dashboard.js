var ctx = document.getElementById('chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: '# of Votes',
            data: [100000, 160000, 90000, 100000, 200000, 30000, 176000, 120000, 210000, 90000, 100000, 20000],
            backgroundColor: [
                'rgba(255, 141, 68, 1)'
            ],
            borderColor: [
                'rgba(255, 141, 68, 1)'
            ],
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