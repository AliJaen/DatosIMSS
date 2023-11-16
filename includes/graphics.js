document.addEventListener("DOMContentLoaded", function () {

    const chart_seeks = document.getElementById('chart_1');
    const chart_seeks2 = document.getElementById('chart_2');
    const chart_seeks3 = document.getElementById('chart_3');
    const chart_seeks4 = document.getElementById('chart_4');

    new Chart(chart_seeks, {
        type: 'bar',
        data: {
            labels: ['SIDA', 'CANCER', 'HIPERTENSIÓN', 'ANEMIA'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [1263, 9345, 2575, 2565]
                },
                {
                    label: 'Edo. México',
                    data: [8963, 3404, 1027, 2105]
                },
                {
                    label: 'Guanajuato',
                    data: [3663, 2458, 345, 2365]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Enfermedades por estado'
                }
            }
        }
    });
    new Chart(chart_seeks2, {
        type: 'line',
        data: {
            labels: ['SIDA', 'CANCER', 'HIPERTENSIÓN', 'ANEMIA'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [1263, 9345, 2575, 2565]
                },
                {
                    label: 'Edo. México',
                    data: [8963, 3404, 1027, 2105]
                },
                {
                    label: 'Guanajuato',
                    data: [3663, 2458, 345, 2365]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Enfermedades por estado'
                }
            }
        }
    });

    new Chart(chart_seeks3, {
        type: 'doughnut',
        data: {
            labels: ['SIDA', 'CANCER', 'HIPERTENSIÓN', 'ANEMIA'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [1263, 9345, 2575, 2565]
                },
                {
                    label: 'Edo. México',
                    data: [8963, 3404, 1027, 2105]
                },
                {
                    label: 'Guanajuato',
                    data: [3663, 2458, 345, 2365]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Enfermedades por estado'
                }
            }
        }
    });

    new Chart(chart_seeks4, {
        type: 'radar',
        data: {
            labels: ['SIDA', 'CANCER', 'HIPERTENSIÓN', 'ANEMIA'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [1263, 9345, 2575, 2565]
                },
                {
                    label: 'Edo. México',
                    data: [8963, 3404, 1027, 2105]
                },
                {
                    label: 'Guanajuato',
                    data: [3663, 2458, 345, 2365]
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Enfermedades por estado'
                }
            }
        }
    });
});