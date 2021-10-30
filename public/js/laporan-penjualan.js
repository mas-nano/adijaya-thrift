var ctx = document.getElementById('chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1', '2', '3', '4', '5'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 7],
            backgroundColor: [
                'rgba(202, 227, 233, 1)'
            ],
            borderColor: [
                'rgba(202, 227, 233, 1)'
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