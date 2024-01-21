document.addEventListener("DOMContentLoaded", function () {
    
    const chart_seeks = document.getElementById('chart_1');
    const chart_seeks2 = document.getElementById('chart_2');
    const chart_seeks3 = document.getElementById('chart_3');
    const chart_seeks4 = document.getElementById('chart_4');

    function getCantidadTotal(enfermedad, estado) {
        const entry = totalEnfermedades.find(item => item.ENFERMEDAD === enfermedad && item.Estado === estado);
        return entry ? parseInt(entry.CantidadTotal) : 0;
    }    



    new Chart(chart_seeks, {
        type: 'bar',
        data: {
            labels: ['SIDA', 'HIPERTENCIÓN', 'CIRROSIS', 'DIABETES', 'GASTRITIS'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [getCantidadTotal("sida","016"), getCantidadTotal("hipertension","016"), 
                            getCantidadTotal("cirrosis","016"), getCantidadTotal("diabetes","016"), 
                            getCantidadTotal("gastritis","016")]
                },
                {
                    label: 'Edo. México',
                    data: [getCantidadTotal("Sida","015"), getCantidadTotal("Hipertension","015"), 
                            getCantidadTotal("Cirrosis","015"), getCantidadTotal("Diabetes","015"), 
                            getCantidadTotal("gastritis","015")]
                },
                {
                    label: 'Guanajuato',
                    data: [getCantidadTotal("Sida","06"), getCantidadTotal("Hipertensión","06"), 
                            getCantidadTotal("Cirrosis","06"), getCantidadTotal("Diabetes","06"), 
                            getCantidadTotal("gastritis","06")]
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
            labels: ['SIDA', 'HIPERTENCIÓN', 'CIRROSIS', 'DIABETES', 'GASTRITIS'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [getCantidadTotal("sida","016"), getCantidadTotal("hipertension","016"), 
                            getCantidadTotal("cirrosis","016"), getCantidadTotal("diabetes","016"), 
                            getCantidadTotal("gastritis","016")]
                },
                {
                    label: 'Edo. México',
                    data: [getCantidadTotal("Sida","015"), getCantidadTotal("Hipertension","015"), 
                            getCantidadTotal("Cirrosis","015"), getCantidadTotal("Diabetes","015"), 
                            getCantidadTotal("gastritis","015")]
                },
                {
                    label: 'Guanajuato',
                    data: [getCantidadTotal("Sida","06"), getCantidadTotal("Hipertensión","06"), 
                            getCantidadTotal("Cirrosis","06"), getCantidadTotal("Diabetes","06"), 
                            getCantidadTotal("gastritis","06")]
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
            labels: ['SIDA', 'HIPERTENCIÓN', 'CIRROSIS', 'DIABETES', 'GASTRITIS'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [getCantidadTotal("sida","016"), getCantidadTotal("hipertension","016"), 
                            getCantidadTotal("cirrosis","016"), getCantidadTotal("diabetes","016"), 
                            getCantidadTotal("gastritis","016")]
                },
                {
                    label: 'Edo. México',
                    data: [getCantidadTotal("Sida","015"), getCantidadTotal("Hipertension","015"), 
                            getCantidadTotal("Cirrosis","015"), getCantidadTotal("Diabetes","015"), 
                            getCantidadTotal("gastritis","015")]
                },
                {
                    label: 'Guanajuato',
                    data: [getCantidadTotal("Sida","06"), getCantidadTotal("Hipertensión","06"), 
                            getCantidadTotal("Cirrosis","06"), getCantidadTotal("Diabetes","06"), 
                            getCantidadTotal("gastritis","06")]
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
            labels: ['SIDA', 'HIPERTENCIÓN', 'CIRROSIS', 'DIABETES', 'GASTRITIS'],
            datasets: [
                {
                    label: 'Michoacán',
                    data: [getCantidadTotal("sida","016"), getCantidadTotal("hipertension","016"), 
                            getCantidadTotal("cirrosis","016"), getCantidadTotal("diabetes","016"), 
                            getCantidadTotal("gastritis","016")]
                },
                {
                    label: 'Edo. México',
                    data: [getCantidadTotal("Sida","015"), getCantidadTotal("Hipertension","015"), 
                            getCantidadTotal("Cirrosis","015"), getCantidadTotal("Diabetes","015"), 
                            getCantidadTotal("gastritis","015")]
                },
                {
                    label: 'Guanajuato',
                    data: [getCantidadTotal("Sida","06"), getCantidadTotal("Hipertensión","06"), 
                            getCantidadTotal("Cirrosis","06"), getCantidadTotal("Diabetes","06"), 
                            getCantidadTotal("gastritis","06")]
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