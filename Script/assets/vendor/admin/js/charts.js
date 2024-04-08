(function($) {
    "use strict";
    const ctxUsers = $('#vironeer-users-charts'),
        ctxUploads = $('#vironeer-uploads-charts');
    const charts = {
        initUsers: function() { this.usersChartsData() },
        initUploads: function() { this.uploadsChartsData() },
        usersChartsData: function() {
            const dataUrl = BASE_URL + '/dashboard/charts/users';
            const request = $.ajax({
                method: 'GET',
                url: dataUrl
            });
            request.done(function(response) {
                charts.createUsersCharts(response);
            });
        },
        uploadsChartsData: function() {
            const dataUrl = BASE_URL + '/dashboard/charts/uploads';
            const request = $.ajax({
                method: 'GET',
                url: dataUrl
            });
            request.done(function(response) {
                charts.createUploadsCharts(response);
            });
        },
        createUsersCharts: function(response) {
            const max = response.suggestedMax;
            const labels = response.usersChartLabels;
            const data = response.usersChartData;
            window.Chart && (new Chart(ctxUsers, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Users',
                        data: data,
                        fill: true,
                        tension: 0.3,
                        backgroundColor: SECONDARY_COLOR,
                        borderColor: PRIMARY_COLOR,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            suggestedMax: max,
                        }
                    }
                }
            })).render();
        },
        createUploadsCharts: function(response) {
            const max = response.suggestedMax;
            const labels = response.uploadsChartLabels;
            const data = response.uploadsChartData;
            window.Chart && (new Chart(ctxUploads, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Uploads',
                        data: data,
                        fill: true,
                        tension: 0.3,
                        backgroundColor: PRIMARY_COLOR,
                        borderColor: PRIMARY_COLOR,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            suggestedMax: max,
                        }
                    }
                }
            })).render();
        },
    }
    charts.initUsers();
    charts.initUploads();
})(jQuery);