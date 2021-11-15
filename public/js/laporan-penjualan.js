var ctx = document.getElementById('chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'per minggu',
            data: data,
            backgroundColor: [
                'rgba(202, 227, 233, 1)'
            ],
            borderColor: [
                'rgba(202, 227, 233, 1)'
            ],
            borderWidth: 1,
            barThickness: 40
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